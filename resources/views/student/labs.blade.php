@extends('layouts.app')

@section('title', 'Labs')

@section('content')
    <style>
        /* Custom styles for card colors */
        .bg-card {
            background-color: #f8f9fa;
        }
        .text-primary {
            color: #c6aa4c;
        }
        .text-muted-foreground {
            color: #6c757d;
        }
        .bg-success {
            background-color: #28a745;
        }
        .text-success-foreground {
            color: #fff;
        }
        .bg-destructive {
            background-color: #dc3545;
        }
        .text-destructive-foreground {
            color: white;
        }
        .modal-trigger {
            cursor: pointer;
            display: inline-flex;
            align-items: center;
            gap: 8px;
        }
        .modal-trigger p {
            margin: 0;
            display: inline;
        }
    </style>

    <div class="container mx-auto p-4">
        <!-- Row for Labs header and Booking button -->
        <div class="row align-items-center mb-3">
            <div class="col-12 col-md-6">
                <h1 class="mb-0" style="color: #b89c3e">Labs</h1>
            </div>

            @if(Auth::user()->role === 'lecturer')

                <div class="col-12 col-md-6 text-md-end">
                    <!-- Modal Trigger for Booking -->
                    <div class="modal-trigger" data-bs-toggle="modal" data-bs-target="#bookingModal">
                        <p>Book slot</p>
                        <i class="fas fa-plus fa-3x" style="color: #C8AB4D;"></i>
                    </div>

                </div>


            @endif



            @if(session('success'))
                <div class="alert alert-success">
                    {{ session('success') }}
                </div>
            @endif
            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif


        </div>

        <hr class="mb-4" />

        <div class="d-grid gap-3">
            @if ($bookings->isEmpty())
                <div class="bg-card p-4 rounded-lg shadow text-center">
                    <p>No booked labs found.</p>
                </div>
            @else
                @foreach($bookings as $booking)
                    <div class="bg-card p-4 rounded-lg shadow d-flex justify-content-between align-items-center">
                        <div>
                            <h2 class="fs-4 fw-semibold" style="color: #b89c3e">{{ $booking->lab_name }}</h2>
                            <p class="text-muted-foreground">{{ $booking->lab_location }}</p>
                            <p class="text-muted-foreground">{{ $booking->booking_date }}</p>

                        </div>
                        <span class="bg-destructive text-white px-3 py-2 rounded text-center">
                            Booked<br>{{ $booking->booking_time }}
                        </span>

                        @if(Auth::user()->role === 'lecturer')
                            @php
                                $currentDateTime = now(); // Get the current date and time
                                // Assume the booking_time is formatted as "HH:mm to HH:mm"
                                [$startTime, $endTime] = explode(' to ', $booking->booking_time);
                                $bookingEndTime = \Carbon\Carbon::parse($booking->booking_date . ' ' . $endTime); // Get the end time of the booking
                            @endphp

                            @if ($currentDateTime->greaterThan($bookingEndTime))
                                <form action="{{ route('labs.unbook', $booking->id) }}" method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger btn-sm">Unbook</button>
                                </form>
                            @endif


                        @endif

                    </div>
                @endforeach
            @endif
        </div>

    </div>

    <!-- Modal for Booking Slot -->
    <div class="modal fade" id="bookingModal" tabindex="-1" aria-labelledby="bookingModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="bookingModalLabel">Book a Lab Slot</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">

                    <form action="{{ route('book.slot') }}" method="POST">
                        @csrf
                        <div class="mb-3">
                            <label for="lab-name" class="form-label">Lab Name</label>
                            <select class="form-control" id="lab-name" name="lab_name" required>
                                <option value="" disabled selected>Select a Lab</option>
                                @for ($i = 1; $i <= 10; $i++)
                                    <option value="Lab {{ $i }}">Lab {{ $i }}</option>
                                @endfor
                            </select>
                        </div>

                        <div class="mb-3">
                            <label for="lab-location" class="form-label">Lab Location</label>
                            <input type="text" class="form-control" id="lab-location" name="lab_location" placeholder="Enter Lab Location" required>
                        </div>

                        <div class="mb-3">
                            <label for="booking-date" class="form-label">Booking Date</label>
                            <input type="date" class="form-control" id="booking-date" name="booking_date" required>
                        </div>

                        <div class="mb-3">
                            <label for="booking-time" class="form-label">Time Slot</label>
                            <select class="form-control" id="booking-time" name="booking_time" required>
                                <option value="" disabled selected>Select a Time Slot</option>
                                <option value="7:30 to 9:10">7:30 to 9:10</option>
                                <option value="9:10 to 10:40">9:20 to 11:00</option>
                                <option value="10:40 to 12:10">11:10 to 12:50</option>
                                <option value="12:10 to 1:40">13:00 to 14:00</option>
                                <option value="1:40 to 3:10">14:50 to 15:30</option>
                                <option value="3:10 to 4:40">15:40 to 16:20</option>
                                <option value="4:40 to 6:00">16:30 to 18:00</option>
                            </select>
                        </div>






                        <div class="text-center">
                            <button type="submit" class="btn btn-primary btn-block" style="background-color: #C8AB4D; border-color: #C8AB4D;">
                                Book Now
                            </button>
                        </div>
                    </form>


                </div>
            </div>
        </div>
    </div>
@endsection
