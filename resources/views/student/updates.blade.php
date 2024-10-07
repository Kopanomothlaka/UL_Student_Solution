@extends('layouts.app')

@section('title', 'Updates')

@section('content')
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
    </style>
@endsection
