{{-- resources/views/admin/profile.blade.php --}}
@extends('admin.layouts.app') <!-- Adjust this according to your layout -->

@section('content')
    <div class="container">
        <h1 class="mb-4">Admin Profile</h1>

        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        @if (session('message'))
            <div class="alert alert-success">{{ session('message') }}</div>
        @endif

        <div class="card mb-4">
            <div class="card-header">Profile Details</div>
            <div class="card-body">
                <p><strong>Name:</strong> {{ $admin->name }}</p>
                <p><strong>Email:</strong> {{ $admin->email }}</p>
                <p><strong>Created At:</strong> {{ $admin->created_at->format('Y-m-d') }}</p>
                <p><strong>Updated At:</strong> {{ $admin->updated_at->format('Y-m-d') }}</p>
            </div>
        </div>

        <div class="card">
            <div class="card-header">Change Password</div>
            <div class="card-body">
                <form action="{{ route('admin.changePassword') }}" method="POST">
                    @csrf
                    <div class="mb-3">
                        <label for="current_password" class="form-label">Current Password</label>
                        <input type="password" class="form-control" id="current_password" name="current_password" required>
                    </div>
                    <div class="mb-3">
                        <label for="new_password" class="form-label">New Password</label>
                        <input type="password" class="form-control" id="new_password" name="new_password" required>
                    </div>
                    <div class="mb-3">
                        <label for="new_password_confirmation" class="form-label">Confirm New Password</label>
                        <input type="password" class="form-control" id="new_password_confirmation" name="new_password_confirmation" required>
                    </div>
                    <button type="submit" class="btn btn-primary">Update Password</button>
                </form>
            </div>
        </div>
    </div>
@endsection
