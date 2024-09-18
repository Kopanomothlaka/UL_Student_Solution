<!-- resources/views/partials/navbar.blade.php -->
<nav class="top-navbar">
    <a href="" class="logo">
        <img src="{{ asset('/assets/images/ul_logo.png') }}" alt="">
    </a>
    <ul class="mid-links">
        <li class="nav-item"><a href="{{route('student.dashboard')}}" class="nav-link">Home</a></li>
        <li class="nav-item"><a href="{{route('student.passOur')}}" class="nav-link">PassOut</a></li>
        <li class="nav-item"><a href="{{route('student.map')}}" class="nav-link">Map</a></li>
        <li class="nav-item"><a href="{{ url('/lecturers') }}" class="nav-link">Lecturers</a></li>
        <li class="nav-item"><a href="{{ url('/labs') }}" class="nav-link">Labs</a></li>
        <li class="nav-item"><a href="{{ url('/updates') }}" class="nav-link">Updates</a></li>
        <li class="nav-item"><a href="{{ url('/lost-items') }}" class="nav-link">Lost Items</a></li>
    </ul>
    <a href="{{ url('/profile') }}" class="profile-link">Profile</a>
</nav>
