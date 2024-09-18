<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="{{ asset('styles/registration.css') }}">
    <title>Student Solution | Reset Password</title>
</head>

<body>
<div class="form-outer-container">
    <div class="illustrator-container">
        <img src="{{ asset('assets/images/Mobile login-amico.png') }}" alt="Mobile login illustration">
    </div>
    <div class="form-wrapper">
        <img src="{{ asset('assets/images/ul_logo.png') }}" alt="Logo">
        <h1>Reset Password</h1>

        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form action="{{ route('forgotPassword.post') }}" method="POST">
            @csrf

            <div class="input-container">
                <label for="email">Email</label>
                <input type="email" id="email" name="email" required>
            </div>

            <p>Remembered your password? <a href="{{ route('login') }}">Login</a></p>
            <button type="submit">RESET</button>
        </form>
    </div>
</div>

<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>

</html>
