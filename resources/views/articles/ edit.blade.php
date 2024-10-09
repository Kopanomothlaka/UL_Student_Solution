<!-- resources/views/articles/edit.blade.php -->
@extends('layouts.app') <!-- Change this if your layout is named differently -->

@section('title', 'Edit Article')

@section('content')
    <div class="container">
        <h1>Edit Article</h1>
        <form action="{{ route('articles.update', $article->id) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')

            <div class="form-group">
                <label for="title">Title</label>
                <input type="text" class="form-control" id="title" name="title" value="{{ $article->title }}" required>
            </div>

            <div class="form-group">
                <label for="image">Image</label>
                <input type="file" class="form-control" id="image" name="image">
            </div>

            <div class="form-group">
                <label for="status">Status</label>
                <select class="form-control" id="status" name="status" required>
                    <option value="draft" {{ $article->status == 'draft' ? 'selected' : '' }}>Draft</option>
                    <option value="published" {{ $article->status == 'published' ? 'selected' : '' }}>Published</option>
                </select>
            </div>

            <button type="submit" class="btn btn-primary">Update Article</button>
        </form>
    </div>
@endsection
