<!-- resources/views/home.blade.php -->
@extends('layouts.app')

@section('title', 'Updates ')

@section('content')
    <section class="news-update-section">
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
        </div>
    </section>
@endsection
