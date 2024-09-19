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

        /* News Card */
        .news-card {
            background-color: #ffffff;
            border: 1px solid #dddddd;
            border-radius: 10px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            overflow: hidden;
            width: 100%; /* Full width for small screens */
            max-width: 300px; /* Max width for larger screens */
            transition: transform 0.3s ease, box-shadow 0.3s ease;
        }

        .news-card:hover {
            transform: scale(1.05);
            box-shadow: 0 8px 16px rgba(0, 0, 0, 0.2);
        }

        .news-card-img img {
            width: 100%;
            height: auto;
            display: block;
        }

        .news-card-content {
            padding: 15px;
        }

        .news-card-content a {
            display: block;
            font-size: 18px;
            font-weight: bold;
            color: #333;
            text-decoration: none;
            margin-bottom: 10px;
        }

        .news-card-content a:hover {
            color: #C8AB4D;
        }

        .news-card-content h4 {
            margin: 5px 0;
            font-size: 16px;
            color: #666;
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
                                        <form action="" method="" enctype="multipart/form-data">
                                            @csrf
                                            <div class="form-group">
                                                <label for="deviceName">Device Name</label>
                                                <input type="text" class="form-control" id="deviceName" name="deviceName" placeholder="Enter device name" required>
                                            </div>

                                            <div class="form-group">
                                                <label for="deviceSerial">Serial Number</label>
                                                <input type="text" class="form-control" id="deviceSerial" name="deviceSerial" placeholder="Enter serial number" required>
                                            </div>

                                            <div class="form-group">
                                                <label for="deviceType">Device Type</label>
                                                <input type="text" class="form-control" id="deviceType" name="deviceType" placeholder="Enter device type" required>
                                            </div>

                                            <div class="form-group">
                                                <label for="deviceImage">Device Image</label>
                                                <input type="file" class="form-control-file" id="deviceImage" name="deviceImage" accept="image/*">
                                            </div>

                                            <button type="submit" class="btn btn-primary btn-block" style="background-color: #C8AB4D; border-color: #C8AB4D;">Add Device</button>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="news-card-container">
                <div class="news-card">
                    <div class="news-card-img">
                        <img src="/assets/images/graduation_event_image.jpeg" alt="Graduation Event">
                    </div>
                    <div class="news-card-content">
                        <a href="#">WHITE LENOVO</a>
                        <h4>Serial Number: CN1855569552</h4>
                        <h4>Student Number: 202065806</h4>
                        <h4>Device Type: Laptop</h4>
                    </div>
                </div>
                <div class="news-card">
                    <div class="news-card-img">
                        <img src="/assets/images/graduation_event_image.jpeg" alt="Graduation Event">
                    </div>
                    <div class="news-card-content">
                        <a href="#">WHITE LENOVO</a>
                        <h4>Serial Number: CN1855569552</h4>
                        <h4>Student Number: 202065806</h4>
                        <h4>Device Type: Laptop</h4>
                    </div>
                </div>
                <div class="news-card">
                    <div class="news-card-img">
                        <img src="/assets/images/graduation_event_image.jpeg" alt="Graduation Event">
                    </div>
                    <div class="news-card-content">
                        <a href="#">WHITE LENOVO</a>
                        <h4>Serial Number: CN1855569552</h4>
                        <h4>Student Number: 202065806</h4>
                        <h4>Device Type: Laptop</h4>
                    </div>
                </div>
                <div class="news-card">
                    <div class="news-card-img">
                        <img src="/assets/images/graduation_event_image.jpeg" alt="Graduation Event">
                    </div>
                    <div class="news-card-content">
                        <a href="#">WHITE LENOVO</a>
                        <h4>Serial Number: CN1855569552</h4>
                        <h4>Student Number: 202065806</h4>
                        <h4>Device Type: Laptop</h4>
                    </div>
                </div>
            </div>
        </div>
    </section>

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
