<!-- resources/views/home.blade.php -->
@extends('layouts.app')

@section('title', 'Student Solution')

@section('content')
    <style>
        /* The Modal (background) */
        .modal {
            display: none; /* Hidden by default */
            position: fixed;
            z-index: 1;
            left: 0;
            top: 0;
            width: 100%;
            height: 100%;
            overflow: auto;
            background-color: rgba(0, 0, 0, 0.4); /* Black w/ opacity */
        }

        /* Modal Content */
        .modal-content {
            background-color: #fefefe;
            margin: 5% auto; /* Adjusted for better centering */
            padding: 20px;
            border: 1px solid #888;
            border-radius: 15px;
            width: 90%; /* Full width for small screens */
            max-width: 500px; /* Max width for larger screens */
        }

        /* Close button (x) */
        .close {
            color: #aaa;
            float: right;
            font-size: 28px;
            font-weight: bold;
        }

        .close:hover,
        .close:focus {
            color: black;
            text-decoration: none;
            cursor: pointer;
        }

        /* Modal trigger styles */
        .modal-trigger {
            cursor: pointer;
            display: inline-flex;
            align-items: center;
        }

        .modal-trigger p {
            margin: 0;
            margin-right: 10px;
        }

        /* Custom button style */
        .btn-custom {
            background-color: #C8AB4D; /* Button background color */
            border-color: #C8AB4D;     /* Button border color */
            color: #fff;               /* Text color */
        }

        .btn-custom:hover {
            background-color: #b89c3e; /* Darker shade for hover effect */
            border-color: #b89c3e;
        }

        /* News Card Container */
        .news-card-container {
            display: flex;
            flex-wrap: wrap;
            gap: 20px; /* Space between cards */
            justify-content: center;
            margin-top: 20px;
        }

        .dropdown-toggle::after {
            content: none !important; /* Remove the default down arrow */
            display: none !important;
        }
        .dropdown-toggle {
            border: none; /* Optional: Remove border if you want a cleaner look */
            background: none; /* Optional: Remove background color */
            padding: 0; /* Optional: Adjust padding as needed */
        }

        .dropdown-toggle i {
            font-size: 29px;
            color: #b89c3e;

            /* Increase the size of the icon */
        }
        .icon-color {
            color: #b89c3e; /* Change this to your desired color */
        }

        /* Optional: Change color on hover */
        .dropdown-item:hover .icon-color {
            color: #212529; /* Change to a darker shade on hover */
        }



    </style>

    <section class="news-update-section">
        <div class="container">
            <div class="row align-items-center mb-3">
                <div class="col-12 col-md-6">
                    <h1 class="mb-0">Pass-Out Lists</h1>
                </div>
                <div class="col-12 col-md-6 text-md-right">
                    <div class="modal-trigger">
                        <p>Add Pass-Out</p>
                        <i class="fa-solid fa-plus fa-3x" style="color: #C8AB4D;"></i>
                    </div>
                </div>
            </div>

            <hr style="border: 1px solid #C8AB4D; margin-top: 20px;">
            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            @if (session('success'))
                <div class="alert alert-success">
                    {{ session('success') }}
                </div>
            @endif

            <!-- Modal structure -->
            <div id="deviceModal" class="modal">
                <div class="modal-content">
                    <span class="close">&times;</span>
                    <h2 class="text-center">Add Device</h2>
                    <div class="container">
                        <div class="row justify-content-center">
                            <div class="col-md-10">
                                <div class="card shadow-sm">
                                    <div class="card-body">
                                        @if ($errors->any())
                                            <div class="alert alert-danger">
                                                <ul>
                                                    @foreach ($errors->all() as $error)
                                                        <li>{{ $error }}</li>
                                                    @endforeach
                                                </ul>
                                            </div>
                                        @endif

                                        @if (session('success'))
                                            <div class="alert alert-success">
                                                {{ session('success') }}
                                            </div>
                                        @endif
                                            <form action="{{ route('devices.store') }}" method="POST" enctype="multipart/form-data" class="needs-validation" novalidate>
                                                @csrf

                                                <div class="form-group">
                                                    <label for="deviceName">Device Name</label>
                                                    <input type="text" class="form-control" id="deviceName" name="deviceName" pattern="[A-Za-z ]+" placeholder="Enter device name" required>
                                                    <div class="invalid-feedback">
                                                        Please provide a device name and numbers are not allowed
                                                    </div>
                                                </div>

                                                <div class="form-group">
                                                    <label for="deviceSerial">Serial Number</label>
                                                    <input type="text" class="form-control" id="deviceSerial" name="deviceSerial" placeholder="Enter serial number" required>
                                                    <div class="invalid-feedback">
                                                        Please provide a serial number.
                                                    </div>
                                                </div>

                                                <div class="form-group">
                                                    <label for="deviceType">Device Type</label>
                                                    <input type="text" class="form-control" id="deviceType" name="deviceType" pattern="[A-Za-z ]+" placeholder="Enter device type" required>
                                                    <div class="invalid-feedback">
                                                        Please provide a device type and numbers are not allowed .
                                                    </div>
                                                </div>

                                                <div class="form-group">
                                                    <label for="deviceImage">Device Image</label>
                                                    <input type="file" class="form-control-file" id="deviceImage" name="deviceImage" accept="image/*">
                                                    <div class="invalid-feedback">
                                                        Please upload an image.
                                                    </div>
                                                </div>

                                                <button type="submit" class="btn btn-primary btn-block" style="background-color: #C8AB4D; border-color: #C8AB4D;">Add Device</button>
                                            </form>

                                            <script>
                                                // Enable Bootstrap validation
                                                (function () {
                                                    'use strict';
                                                    var forms = document.querySelectorAll('.needs-validation');
                                                    Array.prototype.slice.call(forms).forEach(function (form) {
                                                        form.addEventListener('submit', function (event) {
                                                            if (!form.checkValidity()) {
                                                                event.preventDefault();
                                                                event.stopPropagation();
                                                            }
                                                            form.classList.add('was-validated');
                                                        }, false);
                                                    });
                                                })();
                                            </script>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Device Display Section -->
            <div class="news-card-container">
                @foreach($devices as $device)
                    <div class="news-card">

                        <div class="dropdown p-2">
                            @if(Auth::check()) <!-- Check if the user is authenticated -->
                            <a class="dropdown-toggle" href="#" role="button" id="dropdownMenuLink" data-bs-toggle="dropdown" aria-expanded="false">
                                <i class="fa fa-ellipsis-h" aria-hidden="true"></i>
                            </a>
                            <ul class="dropdown-menu" aria-labelledby="dropdownMenuLink">
                                <li>
                                    <form action="{{ route('devices.report', $device->id) }}" method="POST" style="display: inline;">
                                        @csrf <!-- This adds the CSRF token -->
                                        <button type="submit" class="dropdown-item" >
                                            <i class="fa fa-exclamation-triangle icon-color" aria-hidden="true"></i> Stolen
                                        </button>
                                    </form>
                                </li>




                                <li>
                                    <a class="dropdown-item" href="#" onclick="event.preventDefault(); document.getElementById('delete-form-{{ $device->id }}').submit();">
                                        <i class="fa fa-trash icon-color" aria-hidden="true"></i> Delete
                                    </a>
                                    <form id="delete-form-{{ $device->id }}" action="{{ route('devices.delete', $device->id) }}" method="POST" style="display: none;">
                                        @csrf
                                        @method('DELETE')
                                    </form>

                                </li>
                            </ul>
                            @endif
                        </div>

                        <div class="news-card-img">
                            <img src="{{ asset('/device_images/' . $device->image) }}" alt="">
                        </div>
                        <div class="news-card-img">
                            <img src="/assets/images/laptop_image.png" alt="Graduation Event">
                        </div>
                        <div class="news-card-content">
                            <a href="#">{{ $device->name }}</a>
                            <h4>Serial Number: {{ $device->serial_number }}</h4>
                            <h4>Device Type: {{ $device->type }}</h4>
                            <p style="color: {{ $device->status === 'active' ? 'green' : ($device->status === 'stolen' ? 'red' : 'black') }}">
                                {{ $device->status }}
                            </p>

                        </div>
                    </div>
                @endforeach
            </div>



        </div>
    </section>
    <script>
        // Example starter JavaScript for disabling form submissions if there are invalid fields
        (function () {
            'use strict';

            // Fetch all the forms we want to apply Bootstrap validation styles to
            var forms = document.querySelectorAll('.needs-validation');

            // Loop over them and prevent submission
            Array.prototype.slice.call(forms).forEach(function (form) {
                form.addEventListener('submit', function (event) {
                    if (!form.checkValidity()) {
                        event.preventDefault();
                        event.stopPropagation();
                    }
                    form.classList.add('was-validated');
                }, false);
            });
        })();
    </script>


    <!-- Bootstrap and jQuery Scripts -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>


    <script>
        // Get the modal
        const modal = document.getElementById("deviceModal");

        // Get the button that opens the modal
        const btn = document.querySelector(".modal-trigger");

        // Get the <span> element that closes the modal
        const span = document.querySelector(".close");

        // When the user clicks the button, open the modal
        btn.onclick = function() {
            modal.style.display = "block";
        }

        // When the user clicks on <span> (x), close the modal
        span.onclick = function() {
            modal.style.display = "none";
        }

        // When the user clicks anywhere outside of the modal, close it
        window.onclick = function(event) {
            if (event.target === modal) {
                modal.style.display = "none";
            }
        }
    </script>
@endsection
