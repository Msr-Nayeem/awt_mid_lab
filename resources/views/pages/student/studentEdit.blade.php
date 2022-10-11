@extends('layouts.app')

@section('content')
    <h3>Fill student information</h3>
    <form action="{{route('studentEdit')}}" class="form-group" method="post">
        {{csrf_field()}}

        <label for="">ID</label><br>
        <input type="text" name="id" value="{{$student->id}}" class="form-control" readonly><br>
        
        <label for="">Name</label><br>
        <input type="text" name="name" value="{{$student->name}}" class="form-control"><br>
        @error('name')
            <span class="text-danger">{{$message}}</span><br>
        @enderror
        
        <label for="">ID</label><br>
        <input type="text" name="student_id" class="form-control" value="{{$student->student_id}}"><br>
        @error('id')
            <span class="text-danger">{{$message}}</span><br>
        @enderror


        <label for="">Email</label><br>
        <input type="text" name="email" class="form-control" value="{{$student->email}}"><br>
        @error('email')
            <span class="text-danger">{{$message}}</span><br>
        @enderror

        <label for="">date of birth</label><br>
        <input type="date" name="dob" value="{{$student->dob}}"><br>
        @error('dob')
            <span class="text-danger">{{$message}}</span><br>
        @enderror

        <label for="">Phone</label><br>
        <input type="text" name="phone" class="form-control" value="{{$student->phone}}"><br>
        @error('phone')
            <span class="text-danger">{{$message}}</span><br>
        @enderror
        

        <input type="submit" value="Update" class="btn btn-primary">

    </form>
 @endsection
