<nav class="navbar sticky-top navbar-expand-lg navbar-light bg-white top-navbar">
    <a href="" class="navbar-brand logo">
        <img src="{{ asset('/assets/images/ul_logo.png') }}" alt="Logo" class="img-fluid">
    </a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarTogglerDemo03" aria-controls="navbarTogglerDemo03" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse " id="navbarNav">
        <ul class="navbar-nav mx-auto ">
            <li class="nav-item"><a href="{{ route('student.dashboard') }}" class="nav-link ">Home</a></li>
            <li class="nav-item"><a href="{{ route('student.passOur') }}" class="nav-link">PassOut</a></li>
            <li class="nav-item"><a href="{{ route('student.map') }}" class="nav-link">Map</a></li>
            @if(Auth::user()->role === 'student')
                <li class="nav-item"><a href="{{ route('student.lecturers') }}" class="nav-link">Lecturers</a></li>
            @endif
            @if(Auth::user()->role === 'lecturer')
                <li class="nav-item"><a href="{{ route('lecturer.availability') }}" class="nav-link">Availability</a></li>


            @endif
            <li class="nav-item"><a href="{{ route('all.labs') }}" class="nav-link">Labs</a></li>
            <li class="nav-item"><a href="{{ route('student.updates') }}" class="nav-link">Updates</a></li>
            <li class="nav-item"><a href="" class="nav-link">Lost Items</a></li>

        </ul>
        <a href="{{ route('student.profile.StudentProfile') }}" class="btn btn-outline-primary profile-link ml-lg-3 border border-white" >Profile</a>
    </div>
</nav>

