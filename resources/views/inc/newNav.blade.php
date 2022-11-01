<!-- Modal -->
<div
  class="modal fade"
  id="staticBackdrop"
  data-mdb-backdrop="static"
  data-mdb-keyboard="false"
  tabindex="-1"
  aria-labelledby="staticBackdropLabel"
  aria-hidden="true"
>
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="staticBackdropLabel">Confirmation</h5>
        <button type="button" class="btn-close" data-mdb-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <h6>Do You want to logout?</h6>
      </div>
      <div class="modal-footer">
        <a type="button" class="btn btn-secondary btn-sm" data-mdb-dismiss="modal">Cancel</a>
        <a class="btn btn-danger btn-sm" type="button" href="{{route('studentLogout')}}"">Logout</a>
      </div>
    </div>
  </div>
</div>
<!-- Navbar -->
<nav class="navbar navbar-expand-lg navbar-primary bg-primary">
  <!-- Container wrapper -->
  <div class="container-fluid">
    <!-- Toggle button -->
    <button
      class="navbar-toggler"
      type="button"
      data-mdb-toggle="collapse"
      data-mdb-target="#navbarSupportedContent"
      aria-controls="navbarSupportedContent"
      aria-expanded="false"
      aria-label="Toggle navigation"
    >
      <i class="fas fa-bars"></i>
    </button>

    <!-- Collapsible wrapper -->
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <!-- Left links -->
      <ul class="navbar-nav me-auto mb-2 mb-lg-0">
        <li class="nav-item">
          <a class="btn btn-dark me-2" type="button" href="{{route('studentHome')}}">Home</a>
        </li>
        <li class="nav-item">
          <a class="btn btn-dark me-2" type="button" href="{{route('studentList')}}">Student List</a>
        </li>
        <li class="nav-item">
          <a class="btn btn-dark me-2" type="button" href="{{route('createStudent')}}">Add student</a>
        </li>
      </ul>
      <!-- Left links -->
    </div>

      <!-- Avatar -->
      @if(session()->has('id'))

      <div class="dropdown">
        <a
          class="dropdown-toggle d-flex align-items-center hidden-arrow"
          href="#"
          id="navbarDropdownMenuAvatar"
          role="button"
          data-mdb-toggle="dropdown"
          aria-expanded="false"
        >
          <img
            src="https://bootdey.com/img/Content/avatar/avatar7.png"
            class="rounded-circle"
            height="35"
            alt="Black and White Portrait of a Man"
            loading="lazy"
          />
        </a>
        <ul
          class="dropdown-menu dropdown-menu-end"
          aria-labelledby="navbarDropdownMenuAvatar"
        >
          <li>
            <a class="dropdown-item" href="{{route('profile')}}">Profile</a>
          </li>
          <li>
            <a class="dropdown-item" type="button" data-mdb-toggle="modal" data-mdb-target="#staticBackdrop">Logout</a>
          </li>
        </ul>
      </div>
      @endif
    </div>
    <!-- Right elements -->
  </div>
  <!-- Container wrapper -->
</nav>
<!-- Navbar -->