<!-- resources/views/home.blade.php -->
@extends('layouts.app')

@section('title', 'Student Solution')

@section('content')

    <div class="container rounded bg-white mt-5 mb-5 mx-auto" style="max-width: 800px;" >
        <div class="row">
            <div class="col-md-3 ">
                <div class="d-flex flex-column align-items-center text-center p-3 py-5"><img class="rounded-circle mt-5" width="150px" src="https://st3.depositphotos.com/15648834/17930/v/600/depositphotos_179308454-stock-illustration-unknown-person-silhouette-glasses-profile.jpg"><span class="font-weight-bold">Edogaru</span><span class="text-black-50">edogaru@mail.com.my</span><span> </span></div>
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


                    <form action="{{ route('profile.update') }}" method="POST">
                        @csrf
                        @method('PUT') <!-- For updating -->

                        <div class="row mt-3">
                            <div class="col-md-12">
                                <label class="labels">Full names</label>
                                <input type="text" class="form-control" name="name" value="{{ auth()->user()->name }}">
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

                        <div class="mt-5 text-center">
                            <button class="btn profile-button" type="submit" style="background: #b89c3e; color: white">Save Profile</button>
                        </div>
                    </form>
                </div>
            </div>


        </div>
    </div>



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
