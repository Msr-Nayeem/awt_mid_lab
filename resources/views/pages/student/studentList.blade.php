@extends('layouts.app')

@section('content')
    <br><br>
    <table class="table table-bordered">
        <tr>
            <th style="text-align: left">Name</th>
            <th>Student ID</th>
            <th>Email</th>
            <th>Phone</th>
            <th>Address</th>
            <th>Date of Birth</th>
            <th colspan="2">Action</th>
            
        </tr>
        @foreach($students as $student)
        <tr>
            <td>{{$student->name}}</td>
            <td>{{$student->student_id}}</td>
            <td>{{$student->email}}</td>
            <td>0{{$student->phone}}</td>
            <td>{{$student->address}}</td>
            <td>{{$student->dob}}</td>
            <td><a href="/studentEdit/{{$student->id}}">Details/Edit</a></td>
            <td><a href="/studentDelete/{{$student->id}}">Delete</a></td>
        </tr>
        @endforeach
    </table>

 @endsection
