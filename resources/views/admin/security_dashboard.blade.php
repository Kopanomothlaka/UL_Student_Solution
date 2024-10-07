@extends('admin.layouts.app')

@section('title', 'News & Events Admin Dashboard')

@section('content')

    @if(Auth::user()->role === 'general_admin')
        <div class="container mx-auto p-4">
            <div class="d-flex justify-content-between align-items-center mb-4">
                <h1 class="h3">Dashboard</h1>
                <a href="#" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#addNewsModal">Add News</a>

            </div>

            <div class="row g-4 mb-4">
                <div class="col-md-3">
                    <div class="bg-primary text-white p-4 rounded-lg">
                        <h2 class="h5">Total Articles</h2>
                        <p class="h2 font-weight-bold">{{ $articles->count() }}</p>                    </div>
                </div>
                <div class="col-md-3">
                    <div class="bg-success text-white p-4 rounded-lg">
                        <h2 class="h5">Total Events</h2>
                        <p class="h2 font-weight-bold">30</p>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="bg-warning text-white p-4 rounded-lg">
                        <h2 class="h5">Total Users</h2>
                        <p class="h2 font-weight-bold">8,425</p>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="bg-danger text-white p-4 rounded-lg">
                        <h2 class="h5">Total Views</h2>
                        <p class="h2 font-weight-bold">1,024</p>
                    </div>
                </div>
            </div>
            @if(session('success'))
                <div class="alert alert-success">
                    {{ session('success') }}
                </div>
            @endif


            <div class="bg-white p-4 rounded-lg shadow">
                <h2 class="h5 font-weight-bold mb-4">Latest Articles</h2>
                <table class="table table-bordered">
                    <thead class="table-light">
                    <tr>
                        <th class="text-center">No</th>
                        <th>Article Title</th>
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
                            <td class="text-center"><img src="{{ Storage::url($article->image) }}" alt="Image" width="150"></td>
                            <td class="text-center">{{ ucfirst($article->status) }}</td>
                            <td class="text-center">{{ $article->created_at->format('Y-m-d') }}</td>
                            <td class="text-center">N/A</td>
                        </tr>
                    @endforeach


                    </tbody>
                </table>
            </div>
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

    @endif

























    @if(Auth::user()->role === 'security_admin')
        <div class="container mx-auto p-4">
            <div class="d-flex justify-content-between align-items-center mb-4">
                <h1 class="h3">Dashboard</h1>
                <a href="#" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#addPassoutModal">Add Passout Record</a>
            </div>

            <div class="row g-4 mb-4">
                <div class="col-md-3">
                    <div class="bg-primary text-white p-4 rounded-lg">
                        <h2 class="h5">Total Passouts</h2>
                        <p class="h2 font-weight-bold">125</p>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="bg-success text-white p-4 rounded-lg">
                        <h2 class="h5">Total Stolen Devices</h2>
                        <p class="h2 font-weight-bold">15</p>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="bg-warning text-white p-4 rounded-lg">
                        <h2 class="h5">Total Lost Items</h2>
                        <p class="h2 font-weight-bold">50</p>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="bg-danger text-white p-4 rounded-lg">
                        <h2 class="h5">Total Reports</h2>
                        <p class="h2 font-weight-bold">190</p>
                    </div>
                </div>
            </div>

            <div class="bg-white p-4 rounded-lg shadow">
                <h2 class="h5 font-weight-bold mb-4">Latest Reports</h2>
                <table class="table table-bordered">
                    <thead class="table-light">
                    <tr>
                        <th class="text-center">No</th>
                        <th>Item Description</th>
                        <th class="text-center">Status</th>
                        <th class="text-center">Reported On</th>
                        <th class="text-center">Location</th>
                    </tr>
                    </thead>
                    <tbody>
                    <tr>
                        <td class="text-center">1</td>
                        <td>Black Laptop - Dell XPS 13</td>
                        <td class="text-center">Stolen</td>
                        <td class="text-center">2024-10-02</td>
                        <td class="text-center">Library</td>
                    </tr>
                    <tr>
                        <td class="text-center">2</td>
                        <td>Blue Backpack</td>
                        <td class="text-center">Lost</td>
                        <td class="text-center">2024-09-29</td>
                        <td class="text-center">Campus Entrance</td>
                    </tr>
                    <tr>
                        <td class="text-center">3</td>
                        <td>Graduation Certificate</td>
                        <td class="text-center">Found</td>
                        <td class="text-center">2024-09-27</td>
                        <td class="text-center">Administration Office</td>
                    </tr>
                    <tr>
                        <td class="text-center">4</td>
                        <td>Smartphone - iPhone 12</td>
                        <td class="text-center">Stolen</td>
                        <td class="text-center">2024-09-25</td>
                        <td class="text-center">Cafeteria</td>
                    </tr>
                    </tbody>
                </table>
            </div>
        </div>
    @endif


@endsection
