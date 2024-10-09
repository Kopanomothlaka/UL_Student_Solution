@extends('admin.layouts.app')

@section('title', 'Events')

@section('content')
    <div class="container mt-5">
        <h1>Event Calendar</h1>
        <div id="calendar"></div>
    </div>

    @push('scripts')
        <link href='https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/3.10.2/fullcalendar.min.css' rel='stylesheet' />
        <script src='https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js'></script>
        <script src='https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.29.1/moment.min.js'></script>
        <script src='https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/3.10.2/fullcalendar.min.js'></script>

        <script>
            $(document).ready(function() {
                $('#calendar').fullCalendar({
                    header: {
                        left: 'prev,next today',
                        center: 'title',
                        right: 'month,agendaWeek,agendaDay'
                    },
                    events: [
                        // Example event data with time
                        {
                            title: 'Bash',
                            start: '2024-10-10T10:00:00', // Start time
                            end: '2024-10-10T12:00:00'    // End time
                        },
                        {
                            title: 'Event 2',
                            start: '2024-10-12T14:00:00', // Start time
                            end: '2024-10-13T16:00:00'    // End time
                        }
                    ],
                    editable: true,
                    eventLimit: true // allow "more" link when too many events
                });
            });
        </script>
    @endpush
@endsection
