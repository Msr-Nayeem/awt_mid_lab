@extends('layouts.app')
@section('content')
    <h4>Logged in as </h4><h1>{{$student->utype}}</h1>
    Your are - <h3 style = "text-transform:capitalize;">{{$student->name}}</h3>
    
 @endsection
