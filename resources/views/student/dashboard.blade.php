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
                @foreach($articles as $article)
                    <div class="col-md-4 mb-4">
                        <div class="news-card shadow-lg bg-white rounded h-100"> <!-- Ensure card height is 100% -->
                            <div class="news-card-img">
                                <img src="{{ Storage::url($article->image) }}" alt="{{ $article->title }}" class="img-fluid rounded-top">
                            </div>
                            <div class="news-card-content p-3"> <!-- Add some padding -->
                                <h4 class="h6">{{ $article->title }}</h4>
                                <p>{{ $article->description }}</p> <!-- Assuming there's a description field -->
                                <a href="{{ route('articles.show', $article->id) }}" class="btn ">READ MORE</a>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </section>

    <style>

        .news-card-img img {
            width: 100%; /* Ensures the image takes the full width of the card */
            height: 200px; /* Set a default height for the images */
            object-fit: cover; /* This ensures that the image covers the area without distortion */
        }
        .news-card {
            height: 100%; /* Ensures all cards have the same height */
        }

        .news-update-section {
            padding: 2rem 4.5rem;
            width: 100%;
        }

        .news-update-section h1 {
            color: #5db21e;
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
            color: #5db21e;
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
