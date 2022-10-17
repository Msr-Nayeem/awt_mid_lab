@extends('layouts.app')

@section('content')
    <div class="container" style="cursor:default;">
        <h4>Logged in as </h4><h1>{{$student->utype}}</h1>
        Your are - <h3 style = "text-transform:capitalize;">{{$student->name}}</h3>
    </div>
    
 @endsection
