@extends('layouts.app')
@section('content')
    <h3><center>Logged in as Student</center></h3>
    Your are - {{session()->get("user")}}
    
 @endsection
