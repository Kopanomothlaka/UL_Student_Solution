<!-- resources/views/articles/show_article.blade.php -->
@extends('layouts.app')

@section('title', $article->title)

@section('content')
    <div class="container my-5">
        <div class="row">
            <div class="col-md-8 offset-md-2">
                <h1 class="text-center mb-4">{{ $article->title }}</h1>
                <div class="article-img mb-4">
                    <img src="{{ Storage::url($article->image) }}" alt="{{ $article->title }}" class="img-fluid rounded shadow" style="width: 100%; height: 400px; object-fit: cover;">
                </div>
                <div class="article-content">
                    <p class="lead">{{ $article->content }}</p> <!-- Main content of the article -->
                    <p class="text-muted"><strong>Published on:</strong> {{ $article->created_at->format('Y-m-d') }}</p>
                </div>
                <div class="text-center mt-4">
                    <a href="{{ url()->previous() }}" class="btn btn-secondary">Back to Updates</a> <!-- Optional back button -->
                </div>
            </div>
        </div>
    </div>
    <style>
        /* Custom styles for all images in articles */
        .article-img img {
            width: 100%;
            height: 400px; /* Default height */
            object-fit: cover; /* Maintain aspect ratio */
            border-radius: 0.25rem; /* Matches the Bootstrap rounded class */
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1); /* Optional shadow effect */
        }

    </style>
@endsection
