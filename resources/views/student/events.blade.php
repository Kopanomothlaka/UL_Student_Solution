@extends('layouts.app')

@section('title', 'Labs')

@section('content')

    <!DOCTYPE html>
<html lang='en'>
<head>
    <meta charset='utf-8' />
    <link href='https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/6.1.15/main.min.css' rel='stylesheet' />
    <script src='https://cdn.jsdelivr.net/npm/fullcalendar@6.1.15/index.global.min.js'></script>
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            var calendarEl = document.getElementById('calendar');
            var calendar = new FullCalendar.Calendar(calendarEl, {
                initialView: 'dayGridMonth',
                events: '{{ route('student.events.data') }}', // Route to fetch events
                eventDidMount: function(info) {
                    // Optional: Customize how the event is displayed
                    var startTime = info.event.start.toLocaleTimeString([], { hour: '2-digit', minute: '2-digit' });
                    var endTime = info.event.end ? info.event.end.toLocaleTimeString([], { hour: '2-digit', minute: '2-digit' }) : '';
                    info.el.innerHTML += '<br/>' + startTime + ' - ' + endTime; // Show time range
                }
            });
            calendar.render();
        });
    </script>
</head>
<body>
<div id='calendar'></div>
</body>
</html>

@endsection
