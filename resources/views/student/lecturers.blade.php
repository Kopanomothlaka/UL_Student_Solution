@extends('layouts.app')

@section('title', 'Lecturers')

@section('content')
    <section class="lecturers-section">
        <div class="header">
            <h1>Lecturers</h1>
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
    <style>

    </style>

    <script>
        const searchButton = document.querySelector(".search-button");
        const cancelButton = document.querySelector(".cancel-button");
        const searchInput = document.querySelector(".search-input");

        searchButton.addEventListener('click', () => {
            searchButton.classList.remove('active');
            cancelButton.classList.add('active');
            searchInput.classList.add('active');
        })

        cancelButton.addEventListener('click', () => {
            searchButton.classList.add('active');
            cancelButton.classList.remove('active');
            searchInput.classList.remove('active');
        })
    </script>
@endsection
