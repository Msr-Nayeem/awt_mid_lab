@extends('layouts.app')

@section('content')

 <form action="{{route('createStudent')}}" class="form-group" method="post" autocomplete="off" style="cursor:default;">
        {{csrf_field()}}
        <div class="col-md-5 border-right">
            <div class="p-3 py-5">
                <div class="row mt-3">
                    <div class="col-md-10">
                        <label class="labels">Full Name</label>
                        <input type="text" class="form-control" name="name" placeholder="Enter full name">
                        @error('name')
                            <span class="text-danger">{{$message}}</span><br>
                        @enderror 
                        <br>
                    
                        <label class="labels">Student ID</label>
                        <input type="text" class="form-control" name="student_id" placeholder="Enter student ID">
                        @error('student_id')
                            <span class="text-danger">{{$message}}</span><br>
                        @enderror
                        <br>
                    
                        <label class="labels">Email</label>
                        <input type="text" class="form-control" name="email" placeholder="enter email"> 
                        @error('email')
                            <span class="text-danger">{{$message}}</span><br>
                        @enderror
                        <br>

                        <label for="">Password</label><br>
                        <input type="password" name="password" class="form-control" placeholder="Enter Password">
                        @error('password')
                            <span class="text-danger">{{$message}}</span><br>
                        @enderror
                        <br>
                
                        <label class="labels">Address</label>
                        <input type="text" class="form-control" name="address" placeholder="Enter address">
                        @error('address')
                            <span class="text-danger">{{$message}}</span><br>
                        @enderror
                        <br>
                    </div>
                    <div class="col-md-6">
                        <label class="labels">Mobile Number</label>
                        <input type="text" class="form-control" name="phone" placeholder="phone number">
                        @error('phone')
                            <span class="text-danger">{{$message}}</span><br>
                        @enderror
                        <br>
                    </div>
                    <div class="col-md-4">
                        <label class="labels">Date of Birth</label>
                        <input type="date" class="form-control" name="dob" style="cursor:pointer;">
                        @error('dob')
                            <span class="text-danger">{{$message}}</span><br>
                        @enderror
                        <br>
                    </div>
                    <div class="col-md-4">
                        <label class="labels">Register As</label>
                        <select name="utype" style="width:150px; cursor:pointer;">
                            <option selected >Select Type</option>
                            <option value="admin">Admin</option>
                            <option value="teacher">Teacher</option>
                        </select>
                        <br>
                    </div>

                </div>
                
            </div>
                        
        </div>
        
         <input type="submit" class="btn btn-primary profile-button" value="Register">

 </form>

@endsection
