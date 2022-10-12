@extends('layouts.app')

@section('content')
    <table class="table table-border">
        <tr>
            <th>Name</th>
            <th>Student ID</th>
            <th>Email</th>
            <th>Phone</th>
            <th>Date of Birth</th>
            <th>Action</th>
            <th colspan="2"></th>
        </tr>
        @foreach($students as $student)
        <tr>
            <td>{{$student->name}}</td>
            <td>{{$student->student_id}}</td>
            <td>{{$student->email}}</td>
            <td>{{$student->phone}}</td>
            <td>{{$student->dob}}</td>
            <td><a href="/studentEdit/{{$student->id}}">Details</a></td>
            <td><a href="/studentDelete/{{$student->id}}">Delete</a></td>
        </tr>
        @endforeach
    </table>

 @endsection
