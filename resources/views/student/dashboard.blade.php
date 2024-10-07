@extends('layouts.app')

@section('title', 'Student Solution | Home')

@section('content')
    <section class="hero-section text-center">
        <div class="text-container">
            <div class="text-content">
                <h1>Student <span>Solution</span></h1>
                <p>
                    Empower your academic journey and tackle campus challenges with smart,
                    efficient tools designed just for you.
                </p>
                <a href="" class="btn btn-outline-primary profile-link ml-lg-3 border border-white">Access </a>
            </div>
        </div>
    </section>

    <section class="news-update-section">
        <h1 class="text-center">News and Updates</h1>
        <div class="container">
            <div class="row">
                <div class="col-md-4 mb-4">
                    <div class="news-card shadow-lg bg-white rounded shadow">
                        <div class="news-card-img">
                            <img src="/assets/images/graduation_event_image.jpeg" alt="" class="img-fluid rounded-top">
                        </div>
                        <div class="news-card-content">
                            <h4>Graduation Event at Tiro Hall</h4>
                            <p>For a landing page focused on solving campus problems with...</p>
                            <a href="">READ MORE</a>
                        </div>
                    </div>
                </div>
                <div class="col-md-4 mb-4">
                    <div class="news-card shadow-lg bg-white rounded shadow">
                        <div class="news-card-img">
                            <img src="/assets/images/bash.jpeg" alt="" class="img-fluid rounded-top">
                        </div>
                        <div class="news-card-content">
                            <h4>Bash Event at Pond</h4>
                            <p>For a landing page focused on solving campus problems with...</p>
                            <a href="">READ MORE</a>
                        </div>
                    </div>
                </div>
                <div class="col-md-4 mb-4">
                    <div class="news-card shadow-lg bg-white rounded shadow">
                        <div class="news-card-img">
                            <img src="/assets/images/internet_issues.jpeg" alt="" class="img-fluid rounded-top">
                        </div>
                        <div class="news-card-content">
                            <h4>Internet issues</h4>
                            <p>For a landing page focused on solving campus problems with...</p>
                            <a href="">READ MORE</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <style>
        .news-update-section {
            padding: 2rem 4.5rem;
            width: 100%;
        }

        .news-update-section h1 {
            color: #C8AB4D;
        }

        .news-card {
            border-radius: 25px;
        }

        .news-card-content {
            padding: 0 1rem;
            padding-bottom: 1rem;
        }

        .news-card-content h4 {
            padding: 0;
            margin: 0;
        }

        .news-card-content p {
            margin: 0;
            font-size: small;
        }

        .news-card-content a {
            color: #C8AB4D;
            text-decoration: none;
            font-size: 1.5rem;
            font-weight: 700;
            margin-top: 0.5rem;
            display: inline-block;
        }

        .news-card-content a:hover {
            text-decoration: underline;
        }




    </style>

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
@endsection
