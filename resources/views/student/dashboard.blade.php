<!-- resources/views/home.blade.php -->
@extends('layouts.app')

@section('title', 'Student Solution | Home')

@section('content')
    <section class="hero-section">
        <div class="text-container">
            <div class="text-content">
                <h1>Student <span>Solution</span></h1>
                <p>
                    Empower your academic journey and tackle campus challenges with smart,
                    efficient tools designed just for you.
                </p>
                <a href="">Access ></a>
            </div>
        </div>
    </section>
    <section class="news-update-section">
        <h1>News and Updates</h1>
        <div class="news-card-container">
            <div class="news-card">
                <div class="news-card-img">
                    <img src="/assets/images/graduation_event_image.jpeg" alt="">
                </div>
                <div class="news-card-content">
                    <h4>Graduation Event at Tiro Hall</h4>
                    <p>For a landing page focused on solving campus problems with... </p>
                    <a href="">READ MORE</a>
                </div>
            </div>
            <div class="news-card">
                <div class="news-card-img">
                    <img src="/assets/images/bash.jpeg" alt="">
                </div>
                <div class="news-card-content">
                    <h4>Bash Event at Pond</h4>
                    <p>For a landing page focused on solving campus problems with... </p>
                    <a href="">READ MORE</a>
                </div>
            </div>
            <div class="news-card">
                <div class="news-card-img">
                    <img src="/assets/images/internet_issues.jpeg" alt="">
                </div>
                <div class="news-card-content">
                    <h4>Internet issues</h4>
                    <p>For a landing page focused on solving campus problems with... </p>
                    <a href="">READ MORE</a>
                </div>
            </div>
        </div>
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
        <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    </section>
@endsection
