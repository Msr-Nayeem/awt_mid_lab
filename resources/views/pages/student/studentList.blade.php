@extends('layouts.app')

@section('content')
    <br><br>
    <table class="table table-bordered">
        <tr>
            <th style="text-align: left">Name</th>
            <th>Student ID</th>
            <th colspan="2">Action</th>
            
        </tr>
        @foreach($students as $student)
        <tr>
            <td><a href="/details/{{$student->id}}">{{$student->name}}</a></td>
            <td>{{$student->student_id}}</td>
            <td><a href="/studentEdit/{{$student->id}}">Edit</a></td>
            <td><a href="/studentDelete/{{$student->id}}">Delete</a></td>
        </tr>
        @endforeach
    </table>

    @if($errors->any())
        <div class="alert alert-success">
        <h6>{{$errors->first()}}</h6>
        </div>
    @endif

 @endsection
