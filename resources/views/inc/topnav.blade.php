
<!-- Modal -->
<div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="staticBackdropLabel">Confirmation</h5>
      </div>
      <div class="modal-body">
        <h6>Do You want to logout?</h6>
      </div>
      <div class="modal-footer">
        <a type="button" class="btn btn-secondary btn-sm" data-bs-dismiss="modal">Cancel</a>
        <a class="btn btn-danger btn-sm" type="button" href="{{route('studentLogout')}}"">Logout</a>
      </div>
    </div>
  </div>
</div>
<nav class="navbar bg-dark">
        <div class="container-fluid justify-content-start">
            <a class="btn btn-outline-success me-2" type="button" href="{{route('studentHome')}}">Home</a>
            <a class="btn btn-outline-success me-2" type="button" href="{{route('profile')}}">Profile</a>
            <a class="btn btn-outline-success me-2" type="button" href="{{route('studentList')}}">Student List</a>
            <a class="btn btn-outline-success me-2" type="button" href="{{route('createStudent')}}">Add student</a>
            @if(session()->missing('id'))
            <a class="btn btn-outline-success me-2" type="button" href="{{route('studentLogin')}} href="{{route('studentLogout')}}"">Login</a>
            @endif
            @if(session()->has('id'))
            <a class="btn btn-danger" type="button" data-bs-toggle="modal" data-bs-target="#staticBackdrop">Log Out</a>
            @endif
        </div>
</nav>