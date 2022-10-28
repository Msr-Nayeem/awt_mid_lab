
</nav>

<nav class="navbar navbar-expand-lg navbar-light bg-light">
  <div class="container-md">
  <a class="btn btn-outline-success me-2" type="button" href="{{route('studentHome')}}">Home</a>
        <a class="btn btn-outline-success me-2" type="button" href="{{route('profile')}}">Profile</a>
        <a class="btn btn-outline-success me-2" type="button" href="{{route('studentList')}}">Student List</a>
        <a class="btn btn-outline-success me-2" type="button" href="{{route('createStudent')}}">Add student</a>
        <input type="text"  >
        <a class="btn btn-outline-success me-2" type="button" href="">Search</a>
        @if(session()->missing('id'))
        <a class="btn btn-outline-success me-2" type="button" href="{{route('studentLogin')}}">Login</a>
        @endif
        @if(session()->has('id'))
        <a class="btn btn-outline-success me-2" type="button" href="{{route('studentLogout')}}">Log Out</a>
        @endif
   
    <input type="text"  >
  </div>
</nav>