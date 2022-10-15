<nav class="navbar bg-light">
        <div class="container-fluid justify-content-start">
            <a class="btn btn-outline-success me-2" type="button" href="{{route('studentHome')}}">Home</a>
            <a class="btn btn-outline-success me-2" type="button" href="{{route('profile')}}">Profile</a>
            <a class="btn btn-outline-success me-2" type="button" href="{{route('studentList')}}">Student List</a>
            <a class="btn btn-outline-success me-2" type="button" href="{{route('createStudent')}}">Add student</a>
            @if(session()->missing('user'))
            <a class="btn btn-outline-success me-2" type="button" href="{{route('studentLogin')}}">Login</a>
            @endif
            @if(session()->has('user'))
            <a class="btn btn-outline-success me-2" type="button" href="{{route('studentLogout')}}">Log Out</a>
            @endif
            
            
        </div>
</nav>