@extends('layouts.app')

@section('content')


    <br><br>
    @if($errors->any())
        <div class="alert alert-success">
        <h6 style="color: red;">{{$errors->first()}}</h6>
        </div>
    @endif
    <table class="table table-bordered">
        <tr style="cursor:default;">
            <th style="text-align: left">Name</th>
            <th>Student ID</th>
            <th colspan="2">Action</th>
            
        </tr>
        @foreach($students as $student)
        <tr>
            <td><a href="/details/{{$student->id}}">{{$student->name}}</a></td>
            <td style="cursor:default;">{{$student->student_id}}</td>
            <td><a href="/studentEdit/{{$student->id}}">Edit</a></td>
            <td><a href="/studentDelete/{{$student->id}}">Delete</a></td>
            <td><button type="button" value="{{$student->id}}" id="dltBtn" class="btn btn-danger btn-sm">Delete</button></td>
            <td><button type="button" class="btn btn-primary" id="dltBtn"> Button</button></td>
        </tr>
        @endforeach
    </table>




@endsection


 @section('scriptList')
<script>

 </script>
 @endsection