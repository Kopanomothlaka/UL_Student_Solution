@extends('layouts.app')

@section('title', 'Labs')

@section('content')

    <!DOCTYPE html>
<html lang='en'>

    <link href='https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/6.1.15/main.min.css' rel='stylesheet' />
    <script src='https://cdn.jsdelivr.net/npm/fullcalendar@6.1.15/index.global.min.js'></script>
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            var calendarEl = document.getElementById('calendar');
            var calendar = new FullCalendar.Calendar(calendarEl, {
                initialView: 'dayGridMonth',
                events: '{{ route('student.events.data') }}', // Route to fetch events
                eventDidMount: function(info) {
                    // Format start and end times
                    var startTime = info.event.start.toLocaleTimeString([], { hour: '2-digit', minute: '2-digit' });
                    var endTime = info.event.end ? info.event.end.toLocaleTimeString([], { hour: '2-digit', minute: '2-digit' }) : '';

                    // Create a custom HTML structure
                    var eventElement = document.createElement('div');
                    eventElement.innerHTML = `<strong>${info.event.title}</strong><br/>`;
                    eventElement.innerHTML += `<button class="btn btn-info btn-sm">${startTime} to ${endTime}</button>`;

                    info.el.innerHTML = ''; // Clear default content
                    info.el.appendChild(eventElement); // Append custom content
                }
            });
            calendar.render();
        });
    </script>

<div id='calendar' style="margin: 50px"></div>

</html>

@endsection
