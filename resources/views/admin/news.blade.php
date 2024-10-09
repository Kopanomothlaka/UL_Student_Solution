@extends('admin.layouts.app')

@section('title', 'News ')

@section('content')

    <div class="bg-white p-4 rounded-lg shadow">
        <div class="d-flex justify-content-between align-items-center mb-4">
            <h1 class="h3">Latest Articles</h1>
            <a href="#" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#addNewsModal">Add News</a>

        </div>
        <table class="table table-bordered">
            <thead class="table-light">
            <tr>
                <th class="text-center">No</th>
                <th>Article Title</th>
                <th>Content</th>

                <th class="text-center">Picture</th>
                <th class="text-center">Status</th>
                <th class="text-center">Published On</th>
                <th class="text-center">Views</th>
            </tr>
            </thead>
            <tbody>
            @foreach($articles as $article)
                <tr>
                    <td class="text-center">{{ $loop->iteration }}</td>
                    <td>{{ $article->title }}</td>
                    <td>{{ $article->content }}</td>

                    <td class="text-center"><img src="{{ Storage::url($article->image) }}" alt="Image" width="150"></td>
                    <td class="text-center">{{ ucfirst($article->status) }}</td>
                    <td class="text-center">{{ $article->created_at->format('Y-m-d') }}</td>
                    <td class="text-center">N/A</td>
                    <td class="text-center">
                        <button class="btn btn-warning btn-sm m-2" data-bs-toggle="modal" data-bs-target="#editNewsModal" onclick="editArticle({{ $article->id }}, '{{ $article->title }}', '{{ $article->content }}')">Edit</button>
                        <form action="{{ route('articles.destroy', $article->id) }}" method="POST" style="display:inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Are you sure you want to delete this article?');">Delete</button>
                        </form>
                    </td>
                </tr>
            @endforeach
            </tbody>
            <!-- Modal for Editing News -->
            <div class="modal fade" id="editNewsModal" tabindex="-1" aria-labelledby="editNewsModalLabel" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="editNewsModalLabel">Edit Article</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <form id="editArticleForm" action="" method="POST" enctype="multipart/form-data">
                                @csrf
                                @method('PUT')
                                <input type="hidden" name="id" id="editArticleId">
                                <div class="mb-3">
                                    <label for="editNewsTitle" class="form-label">Article Title</label>
                                    <input type="text" class="form-control" id="editNewsTitle" name="title" required>
                                </div>
                                <div class="mb-3">
                                    <label for="editNewsContent" class="form-label">Content</label>
                                    <textarea class="form-control" id="editNewsContent" name="content" rows="4" required></textarea>
                                </div>
                                <div class="mb-3">
                                    <label for="editNewsImage" class="form-label">Upload Image</label>
                                    <input type="file" class="form-control" id="editNewsImage" name="image" accept="image/*">
                                </div>
                                <button type="submit" class="btn btn-primary">Update</button>
                            </form>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        </div>
                    </div>
                </div>
            </div>
        </table>

    </div>

    <!-- Modal for Adding News -->
    <div class="modal fade" id="addNewsModal" tabindex="-1" aria-labelledby="addNewsModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="addNewsModalLabel">Add News Article</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form action="{{ route('articles.store') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="mb-3">
                            <label for="newsTitle" class="form-label">Article Title</label>
                            <input type="text" class="form-control" id="newsTitle" name="title" required>
                        </div>
                        <div class="mb-3">
                            <label for="newsContent" class="form-label">Content</label>
                            <textarea class="form-control" id="newsContent" name="content" rows="4" required></textarea>
                        </div>
                        <div class="mb-3">
                            <label for="newsImage" class="form-label">Upload Image</label>
                            <input type="file" class="form-control" id="newsImage" name="image" accept="image/*" required>
                        </div>
                        <button type="submit" class="btn btn-primary">Publish</button>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>







    <script>
        function editArticle(id, title, content) {
            document.getElementById('editArticleId').value = id;
            document.getElementById('editNewsTitle').value = title;
            document.getElementById('editNewsContent').value = content;

            // Update the form action to point to the correct URL
            document.getElementById('editArticleForm').action = '/articles/' + id;
        }
    </script>
@endsection
