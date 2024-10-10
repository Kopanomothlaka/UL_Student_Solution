{{-- resources/views/admin/lost_and_found.blade.php --}}
@extends('admin.layouts.app')

@section('content')
    <div class="container">
        <h1>Lost and Found Items</h1>

        @if(session('message'))
            <div class="alert alert-success">{{ session('message') }}</div>
        @endif

        <table class="table">
            <thead>
            <tr>
                <th>ID</th>
                <th>Item Name</th>
                <th>Description</th>
                <th>Location</th>
                <th>Contact Number</th>
                <th>Item Type</th>
                <th>Image</th>
                <th>User Name</th>
                <th>Action</th> <!-- New Action Column -->
            </tr>
            </thead>
            <tbody>
            @foreach($lostItems as $item)
                <tr>
                    <td>{{ $item->id }}</td>
                    <td>{{ $item->item_name }}</td>
                    <td>{{ $item->item_description }}</td>
                    <td>{{ $item->location }}</td>
                    <td>{{ $item->contact_number }}</td>
                    <td>{{ $item->item_type }}</td>
                    <td>
                        @if($item->image)
                            <img src="{{ asset('storage/' . $item->image) }}" alt="{{ $item->item_name }}" style="width: 100px;">
                        @endif
                    </td>
                    <td>{{ $item->user->name ?? 'N/A' }}</td>
                    <td>
                        <form action="{{ route('devices.notifyLocation', $item->id) }}" method="POST">
                            @csrf
                            <div class="input-group mb-3">
                                <input type="text" name="location" class="form-control" placeholder="Enter location" required>
                                <button type="submit" class="btn btn-primary">Notify</button>
                            </div>
                        </form>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>
@endsection
