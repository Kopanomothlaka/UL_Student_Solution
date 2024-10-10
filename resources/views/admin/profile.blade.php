{{-- resources/views/admin/profile.blade.php --}}
@extends('admin.layouts.app') <!-- Adjust this according to your layout -->

@section('content')
    <div class="container mb-3">
        <h1 class="mb-4 text-center">Admin Profile <i class="fas fa-user-circle"></i></h1>

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
            <div class="card-header">
                <i class="fas fa-info-circle"></i> Profile Details
            </div>
            <div class="card-body">
                <p><strong><i class="fas fa-user"></i> Name:</strong> {{ $admin->name }}</p>
                <p><strong><i class="fas fa-envelope"></i> Email:</strong> {{ $admin->email }}</p>
                <p><strong><i class="fas fa-calendar-alt"></i> Created At:</strong> {{ $admin->created_at->format('Y-m-d') }}</p>
                <p><strong><i class="fas fa-calendar-check"></i> Updated At:</strong> {{ $admin->updated_at->format('Y-m-d') }}</p>
            </div>
        </div>

        <div class="card">
            <div class="card-header">
                <i class="fas fa-lock"></i> Change Password
            </div>
            <div class="card-body">
                <form action="{{ route('admin.changePassword') }}" method="POST">
                    @csrf
                    <div class="mb-3">
                        <label for="current_password" class="form-label"><i class="fas fa-key"></i> Current Password</label>
                        <input type="password" class="form-control" id="current_password" name="current_password" required>
                    </div>
                    <div class="mb-3">
                        <label for="new_password" class="form-label"><i class="fas fa-key"></i> New Password</label>
                        <input type="password" class="form-control" id="new_password" name="new_password" required>
                    </div>
                    <div class="mb-3">
                        <label for="new_password_confirmation" class="form-label"><i class="fas fa-key"></i> Confirm New Password</label>
                        <input type="password" class="form-control" id="new_password_confirmation" name="new_password_confirmation" required>
                    </div>
                    <button type="submit" class="btn btn-primary"><i class="fas fa-save"></i> Update Password</button>
                </form>
            </div>
        </div>
    </div>


    <style>
        .container {
            max-width: 800px;
            margin: auto;
        }

        .card {
            border: 1px solid #e0e0e0;
            border-radius: 8px;
        }

        .card-header {
            background-color: #f8f9fa;
            font-weight: bold;
        }

        .alert {
            margin-bottom: 20px;
        }
    </style>
@endsection
