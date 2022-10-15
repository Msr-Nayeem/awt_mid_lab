@extends('layouts.app')
@section('content')
    <form action="{{route('studentEdit')}}"" class="form-group" method="post" autocomplete="off">
        {{csrf_field()}}
        <div class="container rounded bg-white mt-5 mb-5">
            <div class="row">
                <div class="col-md-4 border-right">
                    <div class="d-flex flex-column align-items-center text-center p-3 py-5">
                        <img class="rounded-circle mt-5" width="150px" 
                            src="https://st3.depositphotos.com/15648834/17930/v/600/depositphotos_179308454-stock-illustration-unknown-person-silhouette-glasses-profile.jpg">
                        <span class="font-weight-bold">Full Name</span>
                        <span class="text-black-50">{{$student->email}}</span>
                        <input type="text" name="id" value="{{$student->id}}" class="form-control" readonly style="width:60px;">
                    </div>
                </div>
                <div class="col-md-5 border-right">
                <div class="p-3 py-5">
                <div>
                    <h3>Registration</h3>
                </div>
                <div class="row mt-3">
                    <div class="col-md-10">
                        <label class="labels">Full Name</label>
                        <input type="text" class="form-control" name="name" value="{{$student->name}}" placeholder="Enter full name">
                        @error('name')
                            <span class="text-danger">{{$message}}</span><br>
                        @enderror 
                        <br>
                    
                        <label class="labels">Student ID</label>
                        <input type="text" class="form-control" name="student_id" value="{{$student->student_id}}" placeholder="Enter student ID">
                        @error('student_id')
                            <span class="text-danger">{{$message}}</span><br>
                        @enderror
                        <br>
                    
                        <label class="labels">Email</label>
                        <input type="text" class="form-control" name="email" value="{{$student->email}}" placeholder="enter email"> 
                        @error('email')
                            <span class="text-danger">{{$message}}</span><br>
                        @enderror
                        <br>

                        <label for="">Password</label><br>
                        <input type="password" name="password" value="{{$student->password}}" class="form-control" placeholder="Enter Password">
                        @error('password')
                            <span class="text-danger">{{$message}}</span><br>
                        @enderror
                        <br>
                
                        <label class="labels">Address</label>
                        <input type="text" class="form-control" name="address" value="{{$student->address}}" placeholder="Enter address">
                        @error('address')
                            <span class="text-danger">{{$message}}</span><br>
                        @enderror
                        <br>
                    </div>
                    <div class="col-md-6">
                        <label class="labels">Mobile Number</label>
                        <input type="text" class="form-control" name="phone" value="0{{$student->phone}}" placeholder="phone number">
                        @error('phone')
                            <span class="text-danger">{{$message}}</span><br>
                        @enderror
                        <br>
                    </div>
                    <div class="col-md-4">
                        <label class="labels">Date of Birth</label>
                        <input type="date" class="form-control" name="dob" value="{{$student->dob}}">
                        @error('dob')
                            <span class="text-danger">{{$message}}</span><br>
                        @enderror
                        <br>
                    </div>

                </div>
                <input type="submit" class="btn btn-primary profile-button" value="Change">
                
            </div>

            </div>

            </div>

        </div>
            
        
    </form>
 @endsection