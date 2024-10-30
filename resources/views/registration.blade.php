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
        <img src="{{ asset('/assets/images/Hosea2-1.png') }}" alt="">
    </div>
    <div class="form-wrapper">
        <img src="{{ asset('/assets/images/Hoseaicon.png') }}" alt="">
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

        <form action="{{ route('register') }}" method="POST" class="row g-3 needs-validation" novalidate>
            @csrf
            <div class="col-12 col-md-6 mt-3">
                <div class="input-container">
                    <label for="full-name" class="form-label">Full name</label>
                    <input type="text" class="form-control" name="full_name" id="full-name" value="{{ old('full_name') }}" required pattern="[A-Za-z\s]+" title="Please enter only letters">
                    <div class="invalid-feedback">Please enter a valid name (letters only).</div>
                </div>
            </div>
            <div class="col-12 col-md-6 mt-3">
                <div class="input-container">
                    <label for="phone" class="form-label">Phone number</label>
                    <input type="text" class="form-control" name="phone" id="phone" value="{{ old('phone') }}" required pattern="\d{10}" title="Please enter a valid 10-digit phone number">
                    <div class="invalid-feedback">Please enter a valid phone number (10 digits only).</div>
                </div>
            </div>


            <div class="col-12 col-md-6">
                <div class="input-container">
                    <label for="email" class="form-label">Email</label>
                    <input type="email" class="form-control" name="email" id="email" value="{{ old('email') }}" required>
                    <div class="valid-feedback">Looks good!</div>
                    <div class="invalid-feedback">Please enter a valid email address.</div>
                </div>
            </div>

            <div class="input-container">
                <label for="role">Lecturer or Student</label>
                <select name="role" id="role" required>
                    <option value="">--- Select an option here ---</option>
                    <option value="lecturer" {{ old('role') === 'lecturer' ? 'selected' : '' }}>Lecturer</option>
                    <option value="student" {{ old('role') === 'student' ? 'selected' : '' }}>Student</option>
                </select>
            </div>

            <div class="col-12 col-md-6 mt-3">
                <div class="input-container">
                    <label for="password" class="form-label">Password</label>
                    <input type="password" class="form-control" name="password" id="password" required minlength="6">
                    <div class="invalid-feedback">Please enter a password with at least 6 characters.</div>
                </div>
            </div>

            <div class="col-12 col-md-6 mt-3">
                <div class="input-container">
                    <label for="confirm-password" class="form-label">Confirm password</label>
                    <input type="password" class="form-control" name="password_confirmation" id="confirm-password" required minlength="6">
                    <div class="invalid-feedback">Please confirm your password.</div>
                </div>
            </div>
            <p class="mt-3" style="margin-left: 19px">Already have an account? <a href="{{ route('login') }}">Log in</a></p>
            <div class="col-12">
                <button class="btn btn-primary" type="submit">Create account</button>
            </div>
        </form>

    </div>
</div>

<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>

<script>

    // JavaScript for enabling Bootstrap validation
    (function () {
        'use strict';
        window.addEventListener('load', function () {
            var forms = document.querySelectorAll('.needs-validation');
            Array.prototype.slice.call(forms).forEach(function (form) {
                form.addEventListener('submit', function (event) {
                    if (!form.checkValidity()) {
                        event.preventDefault();
                        event.stopPropagation();
                    }
                    form.classList.add('was-validated');
                }, false);
            });
        }, false);
    })();
    document.addEventListener('DOMContentLoaded', function () {
        const password = document.getElementById('password');
        const confirmPassword = document.getElementById('confirm-password');

        password.addEventListener('input', function () {
            // Check password length
            if (password.value.length < 6) {
                password.setCustomValidity("Password must be at least 6 characters long");
                password.classList.add('is-invalid');
            } else {
                password.setCustomValidity("");
                password.classList.remove('is-invalid');
            }

            // Check for confirmation
            if (password.value !== confirmPassword.value) {
                confirmPassword.setCustomValidity("Passwords do not match");
                confirmPassword.classList.add('is-invalid');
            } else {
                confirmPassword.setCustomValidity("");
                confirmPassword.classList.remove('is-invalid');
            }
        });

        confirmPassword.addEventListener('input', function () {
            // Check for confirmation
            if (password.value !== confirmPassword.value) {
                confirmPassword.setCustomValidity("Passwords do not match");
                confirmPassword.classList.add('is-invalid');
            } else {
                confirmPassword.setCustomValidity("");
                confirmPassword.classList.remove('is-invalid');
            }
        });
    });
</script>

</html>
