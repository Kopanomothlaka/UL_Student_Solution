<!-- resources/views/layouts/app.blade.php -->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="stylesheet" href="{{ asset('styles/index.css') }}">
    <link rel="stylesheet" href="{{ asset('styles/navbar.css') }}">

    <title>@yield('title')</title>
</head>
<body>
@include('partials.navbar') <!-- Including the navbar partial -->

<div class="content">
    @yield('content') <!-- Main content of the page -->
</div>
</body>
</html>
