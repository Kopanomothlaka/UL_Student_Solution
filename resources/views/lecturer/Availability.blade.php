@extends('layouts.app')

@section('title', 'Lecturers List')

@section('content')
    <section class="lecturers-section">
        <div class="header">
            <h1>My Availability</h1>
            <form action="" class="search-form">
                <input type="text" placeholder="Search here..." class="search-input">
                <button type="button" class="search-button active">
                    <i class="fa-solid fa-magnifying-glass"></i>
                </button>
                <button type="button" class="cancel-button">
                    <i class="fa-solid fa-xmark"></i>
                </button>
            </form>
        </div>

        <!-- Current Lecturer's Info -->
        <div class="lecturer">
            <div class="lecturer-info">
                <h1>{{ $currentLecturer->name }}</h1> <!-- Display current lecturer's name -->
                <p>Faculty of Science and Agriculture</p>
                <p>School of Mathematics</p>
                <h1 class="availability" style="color: {{ $currentLecturer->status === 'available' ? 'green' : 'red' }};">
                    {{ ucfirst($currentLecturer->status) }} <!-- Display current availability status -->
                </h1>

                <!-- Form for updating status -->
                <form action="{{ route('lecturer.updateAvailability') }}" method="POST">
                    @csrf
                    <select name="status" required>
                        <option value="available" {{ $currentLecturer->status === 'available' ? 'selected' : '' }}>Available</option>
                        <option value="unavailable" {{ $currentLecturer->status === 'unavailable' ? 'selected' : '' }}>Unavailable</option>
                    </select>
                    <button type="submit" class="btn btn-primary">Update Status</button>
                </form>

                @if(session('success'))
                    <p class="success-message">{{ session('success') }}</p>
                @endif
            </div>
        </div>

        <div class="header">
            <h1>Other Lecturers</h1>
        </div>
        <div class="lecturers-container">
            @if($lecturers->isEmpty())
                <p>No lecturers available.</p>
            @else
                @foreach($lecturers as $lecturer)
                    <div class="lecturer">
                        <div class="lecturer-info">
                            <h1>{{ $lecturer->name }}</h1>
                            <p>Faculty of Science and Agriculture</p>
                            <p>School of Mathematics</p>
                            <h1 class="availability" style="color: {{ $lecturer->status === 'available' ? 'white' : 'red' }};">
                                {{ ucfirst($lecturer->status) }}
                            </h1>
                        </div>
                    </div>
                @endforeach
            @endif
        </div>
    </section>
@endsection
