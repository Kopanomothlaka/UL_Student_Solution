<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">

    <link rel="stylesheet" href="{{ asset('/styles/registration.css') }}">
    <title>Student Solution | Login</title>
</head>

<body>
<div class="form-outer-container">
    <div class="illustrator-container">
        <img src="{{ asset('/assets/images/Login-amico.png') }}" alt="">
    </div>
    <div class="form-wrapper">
        <img src="{{ asset('/assets/images/ul_logo.png') }}" alt="">
        <h1>Login</h1>

        <!-- Display validation errors -->
        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
        <form action="{{ route('login') }}" method="POST">
            @csrf
            <div class="input-container">
                <label for="email">Email</label>
                <input type="email" name="email" id="email" required>
            </div>
            <div class="input-container">
                <label for="password">Password</label>
                <input type="password" name="password" id="password" required>
            </div>
            <p>Forgot password? <a href="{{ asset('resetPassword') }}">Reset</a></p>
            <button type="submit">LOGIN</button>
            <p>You don't have an account? <a href="/registration">Create account</a></p>
        </form>
    </div>
</div>

<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>

</html>
