@extends('admin.layouts.app')

@section('title', 'Events')

@section('content')
    <div class="container mt-5">
        <h1>Event Calendar</h1>

        <!-- Button to trigger the modal -->
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
                                <label for="eventTitle">Event Title</label>
                                <input type="text" class="form-control" id="eventTitle" required>
                            </div>
                            <div class="form-group">
                                <label for="eventStartDate">Start Date</label>
                                <input type="date" class="form-control" id="eventStartDate" required>
                                <label for="eventStartTime">Start Time (HH:MM)</label>
                                <input type="text" class="form-control" id="eventStartTime" placeholder="e.g. 14:30" required>
                            </div>
                            <div class="form-group">
                                <label for="eventEndDate">End Date</label>
                                <input type="date" class="form-control" id="eventEndDate" required>
                                <label for="eventEndTime">End Time (HH:MM)</label>
                                <input type="text" class="form-control" id="eventEndTime" placeholder="e.g. 16:00" required>
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
            let currentEvent; // Variable to hold the currently selected event

            $(document).ready(function() {
                // Initialize the calendar
                var calendar = $('#calendar').fullCalendar({
                    header: {
                        left: 'prev,next today',
                        center: 'title',
                        right: 'month,agendaWeek,agendaDay'
                    },
                    events: JSON.parse(localStorage.getItem('events')) || [],
                    editable: true,
                    eventLimit: true, // allow "more" link when too many events
                    eventRender: function(event, element) {
                        var startTime = moment(event.start).format('HH:mm');
                        var endTime = moment(event.end).format('HH:mm');
                        element.find('.fc-title').append('<br/>' + startTime + ' - ' + endTime);
                    },
                    eventClick: function(event) {
                        // Populate the modal with event data for editing
                        currentEvent = event;
                        $('#eventTitle').val(event.title);
                        $('#eventStartDate').val(moment(event.start).format('YYYY-MM-DD'));
                        $('#eventStartTime').val(moment(event.start).format('HH:mm'));
                        $('#eventEndDate').val(moment(event.end).format('YYYY-MM-DD'));
                        $('#eventEndTime').val(moment(event.end).format('HH:mm'));

                        $('#eventModalLabel').text('Edit Event');
                        $('#deleteEventBtn').show(); // Show delete button
                        $('#saveEventBtn').text('Update Event'); // Change button text
                        $('#eventModal').modal('show');
                    }
                });

                // Add event button click
                $('#addEventBtn').click(function() {
                    // Reset the form for a new event
                    currentEvent = null;
                    $('#eventForm')[0].reset(); // Reset the form
                    $('#deleteEventBtn').hide(); // Hide delete button
                    $('#eventModalLabel').text('Add Event');
                    $('#saveEventBtn').text('Add Event');
                });

                // Save or update event button click
                $('#saveEventBtn').click(function() {
                    var title = $('#eventTitle').val();
                    var startDate = $('#eventStartDate').val();
                    var startTime = $('#eventStartTime').val();
                    var endDate = $('#eventEndDate').val();
                    var endTime = $('#eventEndTime').val();

                    // Validate time format (HH:MM)
                    var timeFormat = /^([01]\d|2[0-3]):([0-5]\d)$/;
                    if (title && startDate && startTime.match(timeFormat) && endDate && endTime.match(timeFormat)) {
                        var start = moment(startDate + ' ' + startTime, 'YYYY-MM-DD HH:mm');
                        var end = moment(endDate + ' ' + endTime, 'YYYY-MM-DD HH:mm');

                        if (currentEvent) {
                            // Update existing event
                            currentEvent.title = title;
                            currentEvent.start = start;
                            currentEvent.end = end;

                            calendar.fullCalendar('updateEvent', currentEvent);
                        } else {
                            // Create new event
                            var event = {
                                title: title,
                                start: start,
                                end: end
                            };

                            // Render the event on the calendar
                            calendar.fullCalendar('renderEvent', event, true);
                        }

                        // Save the events to localStorage
                        var events = calendar.fullCalendar('clientEvents');
                        localStorage.setItem('events', JSON.stringify(events));

                        $('#eventModal').modal('hide'); // Hide the modal
                    } else {
                        alert('Please fill in all fields correctly (HH:MM format for time).');
                    }
                });

                // Delete event button click
                $('#deleteEventBtn').click(function() {
                    if (currentEvent) {
                        calendar.fullCalendar('removeEvent', currentEvent._id); // Remove event from calendar

                        // Save the events to localStorage
                        var events = calendar.fullCalendar('clientEvents');
                        localStorage.setItem('events', JSON.stringify(events));

                        $('#eventModal').modal('hide'); // Hide the modal
                    }
                });
            });
        </script>
    @endpush
@endsection
