@extends('admin.layouts.app')

@section('title', 'Events')

@section('content')
    <div class="container mt-5">
        <h1>Event Calendar</h1>

        <button type="button" class="btn btn-primary mb-3" data-toggle="modal" data-target="#eventModal" id="addEventBtn">
            Add Event
        </button>

        <!-- Modal for adding/editing events -->
        <div class="modal fade" id="eventModal" tabindex="-1" role="dialog" aria-labelledby="eventModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="eventModalLabel">Add Event</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <form id="eventForm">
                            <div class="form-group">
                                <label for="eventTitle">Event Name and Location</label>
                                <input type="text" class="form-control" id="eventTitle" required>
                            </div>
                            <div class="form-group">
                                <label for="eventStart">Start Date</label>
                                <input type="datetime-local" class="form-control" id="eventStart" required>
                            </div>
                            <div class="form-group">
                                <label for="eventEnd">End Date</label>
                                <input type="datetime-local" class="form-control" id="eventEnd" required>
                            </div>
                        </form>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="button" class="btn btn-danger" id="deleteEventBtn" style="display: none;">Delete Event</button>
                        <button type="button" class="btn btn-primary" id="saveEventBtn">Save Event</button>
                    </div>
                </div>
            </div>
        </div>

        <div id="calendar"></div>
    </div>

    @push('scripts')
        <link href='https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/3.10.2/fullcalendar.min.css' rel='stylesheet' />
        <script src='https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js'></script>
        <script src='https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.29.1/moment.min.js'></script>
        <script src='https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/3.10.2/fullcalendar.min.js'></script>
        <script src='https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.bundle.min.js'></script>

        <script>
            let currentEvent;

            $(document).ready(function() {
                var calendar = $('#calendar').fullCalendar({
                    header: {
                        left: 'prev,next today',
                        center: 'title',
                        right: 'month,agendaWeek,agendaDay'
                    },
                    events: '{{ route('events.data') }}',
                    editable: true,
                    eventRender: function(event, element) {
                        var startTime = moment(event.start).format('HH:mm'); // Format to show only time
                        var endTime = moment(event.end).format('HH:mm'); // Format to show only time
                        element.find('.fc-title').append('<br/>' + startTime + ' - ' + endTime); // Display time range
                    },
                    eventClick: function(event) {
                        currentEvent = event;
                        $('#eventTitle').val(event.title);
                        $('#eventStart').val(moment(event.start).format('YYYY-MM-DDTHH:mm'));
                        $('#eventEnd').val(moment(event.end).format('YYYY-MM-DDTHH:mm'));
                        $('#eventModalLabel').text('Edit Event');
                        $('#deleteEventBtn').show();
                        $('#saveEventBtn').text('Update Event');
                        $('#eventModal').modal('show');
                    }
                });

                $('#addEventBtn').click(function() {
                    currentEvent = null;
                    $('#eventForm')[0].reset();
                    $('#deleteEventBtn').hide();
                    $('#eventModalLabel').text('Add Event');
                    $('#saveEventBtn').text('Add Event');
                });

                $('#saveEventBtn').click(function() {
                    var title = $('#eventTitle').val();
                    var start = $('#eventStart').val();
                    var end = $('#eventEnd').val();

                    if (title && start && end) {
                        if (currentEvent) {
                            // Update existing event
                            $.ajax({
                                url: '/events/' + currentEvent.id,
                                method: 'PUT',
                                data: {
                                    title: title,
                                    start: start,
                                    end: end,
                                    _token: '{{ csrf_token() }}'
                                },
                                success: function() {
                                    currentEvent.title = title;
                                    currentEvent.start = start;
                                    currentEvent.end = end;
                                    calendar.fullCalendar('updateEvent', currentEvent);
                                    $('#eventModal').modal('hide');
                                }
                            });
                        } else {
                            // Create new event
                            $.ajax({
                                url: '/events',
                                method: 'POST',
                                data: {
                                    title: title,
                                    start: start,
                                    end: end,
                                    _token: '{{ csrf_token() }}'
                                },
                                success: function(event) {
                                    calendar.fullCalendar('renderEvent', event, true);
                                    $('#eventModal').modal('hide');
                                }
                            });
                        }
                    } else {
                        alert('Please fill in all fields.');
                    }
                });

                $('#deleteEventBtn').click(function() {
                    if (currentEvent) {
                        $.ajax({
                            url: '/events/' + currentEvent.id,
                            method: 'DELETE',
                            data: {
                                _token: '{{ csrf_token() }}'
                            },
                            success: function() {
                                calendar.fullCalendar('removeEvents', currentEvent.id);
                                $('#eventModal').modal('hide');
                            }
                        });
                    }
                });
            });
        </script>
    @endpush
@endsection
