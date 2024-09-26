@extends('layouts.app')

@section('title', 'Lost and Found')

@section('content')

    <div class="container mx-auto p-6">
        <header class="d-flex justify-content-between align-items-center mb-4">
            <h1 class="h2 font-weight-bold" style="color: #b89c3e">Lost and Found</h1>
            <button class="btn btn-secondary" data-toggle="modal" data-target="#addDeviceModal">+ Add Device</button>
        </header>

        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

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
                        <form action="{{ route('lostItems.store') }}" method="POST" enctype="multipart/form-data" class="row g-3 needs-validation" novalidate>
                            @csrf
                            <div class="col-md-6">
                                <label for="itemName" class="form-label">Item Name</label>
                                <input type="text" class="form-control" id="itemName" name="item_name" required>
                                <div class="invalid-feedback">
                                    Please provide a valid item name.
                                </div>
                            </div>

                            <div class="col-md-6">
                                <label for="itemDescription" class="form-label">Description</label>
                                <textarea class="form-control" id="itemDescription" name="item_description" rows="3" required></textarea>
                                <div class="invalid-feedback">
                                    Please provide a valid description.
                                </div>
                            </div>

                            <div class="col-md-6">
                                <label for="location" class="form-label">Location</label>
                                <input type="text" class="form-control" id="location" name="location" required>
                                <div class="invalid-feedback">
                                    Please provide a valid location.
                                </div>
                            </div>

                            <div class="col-md-6">
                                <label for="contactNumber" class="form-label">Contact Number</label>
                                <input type="text" class="form-control" id="contactNumber" name="contact_number" required>
                                <div class="invalid-feedback">
                                    Please provide a valid contact number.
                                </div>
                            </div>

                            <div class="col-md-6">
                                <label for="image" class="form-label">Upload Image</label>
                                <input type="file" class="form-control" id="image" name="image" required>
                                <div class="invalid-feedback">
                                    Please attach the image
                                </div>
                            </div>

                            <div class="col-md-6">
                                <label for="itemType" class="form-label">Type</label>
                                <select class="form-control" id="itemType" name="item_type" required>
                                    <option value="" disabled selected>Choose...</option>
                                    <option value="lost">Lost</option>
                                    <option value="found">Found</option>
                                </select>
                                <div class="invalid-feedback">
                                    Please select a valid type.
                                </div>
                            </div>

                            <div class="col-12">
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" id="invalidCheck" required>
                                    <label class="form-check-label" for="invalidCheck">
                                        Agree to terms and conditions
                                    </label>
                                    <div class="invalid-feedback">
                                        You must agree before submitting.
                                    </div>
                                </div>
                            </div>

                            <div class="col-12">
                                <button class="btn mt-3" type="submit" style="background-color: #b89c3e; color: white">Submit</button>
                            </div>
                        </form>

                        <!-- Add the following script for Bootstrap validation -->
                        <script>
                            // Example starter JavaScript for disabling form submissions if there are invalid fields
                            (function () {
                                'use strict'
                                var forms = document.querySelectorAll('.needs-validation')
                                Array.prototype.slice.call(forms)
                                    .forEach(function (form) {
                                        form.addEventListener('submit', function (event) {
                                            if (!form.checkValidity()) {
                                                event.preventDefault()
                                                event.stopPropagation()
                                            }
                                            form.classList.add('was-validated')
                                        }, false)
                                    })
                            })()
                        </script>

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


                            <div class="d-flex align-items-center">
                                <button class="btn btn-{{ $item->item_type == 'lost' ? 'danger' : 'primary' }} mt-2 me-2">
                                    {{ strtoupper($item->item_type) }}
                                </button>
                                <button class="btn btn-secondary mt-2 me-2">
                                    <i class="fas fa-phone"></i>
                                </button>
                                <button class="btn btn-secondary mt-2 me-2">
                                    <i class="fas fa-envelope"></i>
                                </button>

                                <!-- Other item details -->
                                @if ($item->user_id === Auth::id())
                                    <form action="{{ route('lostItems.destroy', $item->id) }}" method="POST" onsubmit="return confirm('Are you sure you want to delete this item?');">
                                        @csrf
                                        @method('DELETE')
                                        <button class="btn btn-secondary mt-2">
                                            <i class="fas fa-trash-alt"></i>
                                        </button>
                                    </form>
                                @endif
                            </div>




                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>

@endsection
