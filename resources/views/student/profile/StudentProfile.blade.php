<!-- resources/views/home.blade.php -->
@extends('layouts.app')

@section('title', 'Student Solution')

@section('content')

    <div class="container rounded bg-white mt-5 mb-5 mx-auto" style="max-width: 800px;" >
        <div class="row">
            <div class="col-md-3 ">
                <div class="d-flex flex-column align-items-center text-center p-3 py-5">

                    <img class="rounded-circle mt-5" width="150px" src="https://st3.depositphotos.com/15648834/17930/v/600/depositphotos_179308454-stock-illustration-unknown-person-silhouette-glasses-profile.jpg">

                    <!-- Display the user's name and email dynamically -->
                    <span class="font-weight-bold">{{ auth()->user()->name }}</span>
                    <span class="text-black-50">{{ auth()->user()->email }}</span>
                    <span> </span>

                    <!-- Logout button -->
                    <div class="d-flex justify-content-between align-items-center mb-">

                        @if (auth()->user()->role === 'lecturer')
                            <!-- Availability Toggle Button -->
                            <form action="{{ route('lecturer.toggleAvailability') }}" method="POST" class="mb-0 ml-3">
                                @csrf
                                <div class="form-group mb-0">
                                    <button type="submit" class="btn"
                                            style="background-color: {{ auth()->user()->status === 'available' ? 'green' : 'red' }}; color: white; min-width: 150px;">
                                        {{ auth()->user()->status === 'available' ? 'Available' : 'Unavailable' }}
                                    </button>
                                </div>
                            </form>

                        @endif
                    </div>
                    <form action="{{ route('logout') }}" method="POST" class="mb-0" onsubmit="return confirmLogout();">
                        @csrf
                        <button type="submit" class="btn btn-link text-danger " style="min-width: 85px;">
                            <i class="fas fa-sign-out-alt"></i> <!-- Log Out Icon -->
                            Log Out
                        </button>
                    </form>

                </div>
            </div>

            <div class="col-md-5 ">
                <div class="p-3 py-8">
                    <div class="d-flex justify-content-between align-items-center mb-3">
                        <h4 class="text-right">Profile Settings</h4>



                    </div>
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


                    <form action="{{ route('profile.update') }}" method="POST" class="custom-width">
                        @csrf
                        @method('PUT') <!-- For updating -->

                        <div class="row mt-3">
                            <div class="col-md-12">
                                <label class="labels">Full names</label>
                                <input type="text" class="form-control" name="name" value="{{ auth()->user()->name }}" >
                            </div>
                            <div class="col-md-12">
                                <label class="labels">Phone number</label>
                                <input type="text" class="form-control" name="phone" value="{{ auth()->user()->phone }}">
                            </div>
                            <div class="col-md-12">
                                <label class="labels">Email address</label>
                                <input type="email" class="form-control" name="email" value="{{ auth()->user()->email }}">
                            </div>
                            <div class="col-md-12">
                                <label class="labels">Role</label>
                                <input type="text" class="form-control" name="role" value="{{ auth()->user()->role }}" readonly>
                            </div>
                        </div>

                        <!-- Add password change fields -->
                        <div class="row mt-3">
                            <div class="col-md-12">
                                <label class="labels">Current Password</label>
                                <input type="password" class="form-control" name="current_password" placeholder="Enter current password">
                            </div>
                            <div class="col-md-12">
                                <label class="labels">New Password</label>
                                <input type="password" class="form-control" name="new_password" placeholder="Enter new password">
                            </div>
                            <div class="col-md-12">
                                <label class="labels">Confirm New Password</label>
                                <input type="password" class="form-control" name="new_password_confirmation" placeholder="Confirm new password">
                            </div>
                        </div>

                        <div class="mt-5 text-center">
                            <button class="btn profile-button" type="submit" style="background: #b89c3e; color: white">Update Profile</button>
                        </div>
                    </form>







                </div>
            </div>



        </div>
    </div>
    <style>
        .custom-width {
            width: 400px; /* Set the desired width */
        }

    </style>



    <!-- Bootstrap and jQuery Scripts -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

    <script>
        function confirmLogout() {
            return confirm("Are you sure you want to log out?");
        }
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
