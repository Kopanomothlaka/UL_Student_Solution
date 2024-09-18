<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="{{ asset('/styles/registration.css') }}">
    <title>Student Solution | Register</title>
</head>

<body>
<div class="form-outer-container">
    <div class="illustrator-container">
        <img src="{{ asset('/assets/images/Image Filing system-pana.png') }}" alt="">
    </div>
    <div class="form-wrapper">
        <img src="{{ asset('/assets/images/ul_logo.png') }}" alt="">
        <h1>Registration</h1>

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

        <form action="{{ route('register') }}" method="POST">
            @csrf
            <div class="input-container">
                <label for="full-name">Full name</label>
                <input type="text" name="full_name" id="full-name" value="{{ old('full_name') }}" required>
            </div>
            <div class="input-container">
                <label for="phone">Phone number</label>
                <input type="text" name="phone" id="phone" value="{{ old('phone') }}" required>
            </div>
            <div class="input-container">
                <label for="email">Email</label>
                <input type="email" name="email" id="email" value="{{ old('email') }}" required>
            </div>
            <div class="input-container">
                <label for="role">Lecturer or Student</label>
                <select name="role" id="role" required>
                    <option value="">--- Select an option here ---</option>
                    <option value="lecturer" {{ old('role') === 'lecturer' ? 'selected' : '' }}>Lecturer</option>
                    <option value="student" {{ old('role') === 'student' ? 'selected' : '' }}>Student</option>
                </select>
            </div>
            <div class="input-container">
                <label for="password">Password</label>
                <input type="password" name="password" id="password" required>
            </div>
            <div class="input-container">
                <label for="confirm-password">Confirm password</label>
                <input type="password" name="password_confirmation" id="confirm-password" required>
            </div>
            <p>Already have an account? <a href="{{ route('login') }}">Log in</a></p>
            <button type="submit">Create account</button>
        </form>
    </div>
</div>

<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>

</html>
