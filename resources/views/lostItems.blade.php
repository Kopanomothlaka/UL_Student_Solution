@extends('layouts.app')

@section('title', 'Lost and Found')

@section('content')

    <div class="container mx-auto p-6">
        <header class="d-flex justify-content-between align-items-center mb-4">
            <h1 class="h2 font-weight-bold" style="color: #b89c3e">Lost and Found</h1>
            <button class="btn btn-secondary" data-toggle="modal" data-target="#addDeviceModal">+ Add Device</button>
        </header>

        <!-- Add Device Modal -->
        <div class="modal fade" id="addDeviceModal" tabindex="-1" role="dialog" aria-labelledby="addDeviceModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="addDeviceModalLabel">Add Lost or Found Item</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <form action="{{ route('lostItems.store') }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="form-group">
                                <label for="itemName">Item Name</label>
                                <input type="text" class="form-control" id="itemName" name="item_name" required>
                            </div>
                            <div class="form-group">
                                <label for="itemDescription">Description</label>
                                <textarea class="form-control" id="itemDescription" name="item_description" rows="3" required></textarea>
                            </div>
                            <div class="form-group">
                                <label for="location">Location</label>
                                <input type="text" class="form-control" id="location" name="location" required>
                            </div>
                            <div class="form-group">
                                <label for="contactNumber">Contact Number</label>
                                <input type="text" class="form-control" id="contactNumber" name="contact_number" required>
                            </div>
                            <div class="form-group mt-3">
                                <label for="image">Upload Image : </label>
                                <input type="file" class="form-control-file" id="image" name="image">
                            </div>
                            <div class="form-group">
                                <label for="itemType">Type</label>
                                <select class="form-control mt-2" id="itemType" name="item_type" required>
                                    <option value="lost">Lost</option>
                                    <option value="found">Found</option>
                                </select>
                            </div>
                            <div class="d-flex justify-content-center">
                                <button type="submit" class="btn  mt-3" style="background-color: #b89c3e;color: white">Submit</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>

        <div class="row">
            <!-- Display Lost and Found Items -->
            @foreach ($items as $item)
                <div class="col-12 col-sm-6 col-lg-4 mb-4">
                    <div class="card shadow" style="height: 399px">


                        <img src="{{ $item->image ? asset('storage/' . $item->image) : 'https://placehold.co/300x200' }}"
                             alt="{{ $item->item_name }}"
                             class="card-img-top img-fluid"
                             style="width: 100%; height: 200px; object-fit: cover;" />


                        <div class="card-body">
                            <h5 class="card-title">{{ $item->item_name }}</h5>
                            <p class="card-text">{{ Str::limit($item->item_description, 100) }}</p>
                            <div class="d-flex justify-content-between align-items-center">
                                <span class="text-muted"><i class="fas fa-map-marker-alt p-2"></i>{{ $item->location }}</span>
                                <span class="text-muted">{{ $item->created_at->diffForHumans() }}</span>
                            </div>
                            <button class="btn btn-{{ $item->item_type == 'lost' ? 'danger' : 'primary' }} mt-2">{{ strtoupper($item->item_type) }}</button>
                            <button class="btn btn-secondary mt-2">
                                <i class="fas fa-phone"></i>
                            </button>
                            <button class="btn btn-secondary mt-2">
                                <i class="fas fa-envelope"></i>
                            </button>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>

@endsection
