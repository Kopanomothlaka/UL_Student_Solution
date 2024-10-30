{{-- resources/views/admin/search_results.blade.php --}}
@extends('admin.layouts.app')

@section('content')
    <div class="container">
        <h1 class="mb-4">Search Results for: "{{ $query }}"</h1>

        @if($results->isEmpty())
            <div class="alert alert-warning">No results found for your search.</div>
        @else
            <table class="table">
                <thead>
                <tr>
                    <th>ID</th>
                    <th>Device Name</th>
                    <th>Serial Number</th>
                    <th>Type</th>
                    <th>User Name</th>
                    <th>Status</th>
                </tr>
                </thead>
                <tbody>
                @foreach($results as $device)
                    <tr>
                        <td>{{ $device->id }}</td>
                        <td>{{ $device->name }}</td>
                        <td>{{ $device->serial_number }}</td>
                        <td>{{ $device->type }}</td>
                        <td>{{ $device->user->name ?? 'N/A' }}</td>
                        <td>{{ ucfirst($device->status) }}</td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        @endif
    </div>
@endsection
