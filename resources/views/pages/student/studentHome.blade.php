@extends('layouts.app')
@section('content')
    <h4>Logged in as </h4><h1>{{session()->get("type")}}</h1>
    Your are - <h3>{{session()->get("user")}}</h3>
    
 @endsection
