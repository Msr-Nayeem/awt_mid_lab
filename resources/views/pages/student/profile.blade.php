@extends('layouts.app')
@section('content')
@if($errors->any())
        <br>
        <div class="alert alert-success">
        <h6 style="color: red;">{{$errors->first()}}</h6>
        </div>
@endif
<div
  class="modal fade"
  id="changePassword"
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
          <input type="text" id="id"  class="form-control form-icon-trailing" value="{{$student->id}}" hidden />
          <div class="form-outline">
              
              <input type="password" id="password"  class="form-control form-icon-trailing">
              <label class="form-label" for="form1">New Password</label>
                 
          </div>
          <span class="text-danger" id="password_error"><br></span>
          <div class="form-outline">
              <input type="password" id="password_confirm" class="form-control form-icon-trailing" />
              <label class="form-label" for="form1">Re-type Password</label>
          </div>
          <span class="text-danger" id="password_errorr"><br></span>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary btn-sm" data-mdb-dismiss="modal">Cancel</button>
          <button type="button" onclick="checkPassword()" class="btn btn-danger btn-sm">Change</button>
        </div>
      </form>
    </div>
  </div>
</div>


    <div class="container" style="cursor:default;">
    <br>
    <div class="main-body">
          <div class="row gutters-sm">
            <div class="col-md-4 mb-3">
              <div class="card">
                <div class="card-body">
                  <div class="d-flex flex-column align-items-center text-center">
                    <img src="{{asset('image/profile_icon.png')}}" alt="Admin" class="img-fluid" width="150">
                    <div class="mt-3">
                      <h4 style = "text-transform:capitalize;">{{$student->name}}</h4>
                      <h6 class="text-secondary" style = "text-transform:capitalize;">Role: {{$student->utype}}</h6>
                      <button id="" onclick="alertFunction(this)" class="btn btn-primary btn-rounded" value="{{$student->id}}">Change Password</button>
                      <a class="btn btn-primary btn-rounded" style="margin-left:17px;" href="/profileEdit/{{$student->id}}">Edit/Update </a>
                    </div>
                  </div>
                </div>
              </div>
              
            </div>
            <div class="col-md-8">
              <div class="card mb-3">
                <div class="card-body">
                  <div class="row">
                    <div class="col-sm-3">
                      <h6 class="mb-0">Full Name :</h6>
                    </div>
                    <div class="col-sm-3 text-secondary">
                    <h6 class="mb-0" style = "text-transform:capitalize;">{{$student->name}}</h6>
                    </div>

                    <div class="col-sm-3">
                      <h6 class="mb-0">Student ID :</h6>
                    </div>
                    <div class="col-sm-3 text-secondary">
                      <h6 class="mb-0">{{$student->student_id}}</h6>
                    </div>
                  </div>
                  <hr>

                  <div class="row">
                     <div class="col-sm-3">
                      <h6 class="mb-0">Email :</h6>
                    </div>
                    <div class="col-sm-3 text-secondary">
                    <h6 class="mb-0"><u>{{$student->email}}</u></h6>
                    </div>

                    <div class="col-sm-3">
                      <h6 class="mb-0">Phone :</h6>
                    </div>
                    <div class="col-sm-3 text-secondary">
                      <h6 class="mb-0">+880{{$student->phone}}</h6>
                    </div>

                  </div>
                  <hr>

                  <div class="row">
                    <div class="col-sm-3">
                      <h6 class="mb-0">Address</h6>
                    </div>
                    <div class="col-sm-3 text-secondary">
                    {{$student->address}}
                    </div>
                    <div class="col-sm-3">
                      <h6 class="mb-0">Date of Birth</h6>
                    </div>
                    <div class="col-sm-3 text-secondary">
                    {{$student->dob}}
                    </div>
                  </div>
                  <hr>
                </div>
              </div>
              <br><br>
    

 
@endsection

@section('scriptList')
<script>  
  function alertFunction(btn){   
    $('#changePassword').modal('show');
    document.getElementById("password_error").innerHTML="<br>";
    document.getElementById("password_errorr").innerHTML="<br>";
  }
  function checkPassword(){
    var password = document.getElementById("password").value;
    var password_confirm = document.getElementById("password_confirm").value;
    var id = document.getElementById("id").value;

    if(password.length < 5){
        document.getElementById("password_error").innerHTML="password must be 5+ <br>";
        document.getElementById("password_errorr").innerHTML="password must be 5+<br>";
    }
    else if(password_confirm != password){
      document.getElementById("password_error").innerHTML="<br>";
       document.getElementById("password_errorr").innerHTML="must be same<br>";
    }
    else
    {
      location.href="/changePassword/"+id+"/"+password;
    }
   
  }

  </script>
 @endsection