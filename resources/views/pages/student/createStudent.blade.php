@extends('layouts.app')

@section('content')
    <h3>Fill student information</h3>
    <form action="{{route('createStudent')}}" class="form-group" method="post" autocomplete="off">
        {{csrf_field()}}

        <label for="">Name</label><br>
        <input type="text" name="name" value="{{old('name')}}" class="form-control"><br>
        @error('name')
            <span class="text-danger">{{$message}}</span><br>
        @enderror
        
        <label for="">ID</label><br>
        <input type="text" name="student_id" class="form-control"><br>
        @error('student_id')
            <span class="text-danger">{{$message}}</span><br>
        @enderror


        <label for="">Email</label><br>
        <input type="text" name="email" class="form-control"><br>
        @error('email')
            <span class="text-danger">{{$message}}</span><br>
        @enderror

        <label for="">Password</label><br>
        <input type="password" name="password" class="form-control"><br>
        @error('password')
            <span class="text-danger">{{$message}}</span><br>
        @enderror

        <label for="">date of birth</label><br>
        <input type="date" name="dob"><br>
        @error('dob')
            <span class="text-danger">{{$message}}</span><br>
        @enderror
        <br>

        <label for="">Phone</label><br>
        <input type="text" name="phone" class="form-control"><br>
        @error('phone')
            <span class="text-danger">{{$message}}</span><br>
        @enderror
        

        <input type="submit" name="Add" class="btn btn-primary" value="ADD">

    </form>
 @endsection
