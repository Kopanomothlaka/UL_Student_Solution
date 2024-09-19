<!-- resources/views/home.blade.php -->
@extends('layouts.app')

@section('title', 'Student Solution ')

@section('content')
    <section class="lecturers-section">
        <div class="header">
            <h1>News and Updates</h1>
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
            <div class="lecturer">
                <div class="lecturer-info">
                    <h1>Dr Andrew Tate</h1>
                    <p>Faculty of Science and Agriculture</p>
                    <p>School of mathematics</p>
                    <p><i class="fas fa-map-marker-alt"></i> Maths Building Office 10096</p>
                    <h1 class="availability">Available</h1>
                </div>
            </div>
            <div class="lecturer">
                <div class="lecturer-info">
                    <h1>Dr Andrew Tate</h1>
                    <p>Faculty of Science and Agriculture</p>
                    <p>School of mathematics</p>
                    <p><i class="fas fa-map-marker-alt"></i> Maths Building Office 10096</p>
                    <h1 class="availability">Available</h1>
                </div>
            </div>
            <div class="lecturer">
                <div class="lecturer-info">
                    <h1>Dr Andrew Tate</h1>
                    <p>Faculty of Science and Agriculture</p>
                    <p>School of mathematics</p>
                    <p><i class="fas fa-map-marker-alt"></i> Maths Building Office 10096</p>
                    <h1 class="availability">Not Available</h1>
                </div>
            </div>
        </div>
    </section>

@endsection
