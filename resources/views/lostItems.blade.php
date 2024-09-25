@extends('layouts.app')

@section('title', 'Found and Lost')

@section('content')

    <div class="container mx-auto p-6">
        <header class="d-flex justify-content-between align-items-center mb-4">
            <h1 class="h2 font-weight-bold " style="color: #b89c3e">Lost and Found</h1>
            <button class="btn btn-secondary">+ Add Device</button>
        </header>
        <div class="row">
            <div class="col-12 col-sm-6 col-lg-4 mb-4">
                <div class="card shadow"> <!-- Changed to shadow -->
                    <img src="https://placehold.co/300x200" alt="Found keys at MK" class="card-img-top" />
                    <div class="card-body">
                        <h5 class="card-title">Found keys at MK</h5>
                        <p class="card-text">In incremental development, requirements monitoring is essential to ensure ......</p>
                        <div class="d-flex justify-content-between align-items-center">
                            <span class="text-muted"><i class="fas fa-map-marker-alt p-2"></i>Maths Building, Lab1</span>
                            <span class="text-muted">2 minutes ago</span>
                        </div>
                        <button class="btn btn-danger mt-2">LOST</button>
                        <button class="btn btn-secondary mt-2">
                            <i class="fas fa-phone"></i>
                        </button>
                        <button class="btn btn-secondary mt-2">
                            <i class="fas fa-envelope"></i>
                        </button>
                    </div>
                </div>
            </div>
            <div class="col-12 col-sm-6 col-lg-4 mb-4">
                <div class="card shadow"> <!-- Changed to shadow -->
                    <img src="https://placehold.co/300x200" alt="Bank Card" class="card-img-top" />
                    <div class="card-body">
                        <h5 class="card-title">Bank Card</h5>
                        <p class="card-text">In incremental development, requirements monitoring is essential to ensure ......</p>
                        <div class="d-flex justify-content-between align-items-center">
                            <span class="text-muted"><i class="fas fa-map-marker-alt p-2"></i>Maths Building, Lab1</span>
                            <span class="text-muted">2 minutes ago</span>
                        </div>
                        <button class="btn btn-primary mt-2">FOUND</button>
                            <button class="btn btn-secondary mt-2">
                                <i class="fas fa-phone"></i>
                            </button>
                            <button class="btn btn-secondary mt-2">
                                <i class="fas fa-envelope"></i>
                            </button>

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
