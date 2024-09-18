<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="{{asset('/styles/registration.css')}}">
    <title>Student Solution | Login</title>
</head>

<body>
<div class="form-outer-container">
    <div class="illustrator-container">
        <img src="{{asset('/assets/images/Mobile login-amico.png')}}" alt="">
    </div>
    <div class="form-wrapper">


        <img src="{{asset('/assets/images/ul_logo.png')}}" alt="">
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
        <form action="{{route('forgotPassword.post')}}">
            @csrf

            <div class="input-container">
                <label for="email">Email</label>
                <input type="email" id="email">
            </div>

            <p>Remembered your password? <a href="{{asset('login')}}">Login</a></p>
            <button type="submit">RESET</button>
        </form>

    </div>
</div>
</body>

</html>
