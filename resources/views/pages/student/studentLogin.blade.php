@extends('layouts.app')

@section('content')
    <h3><center>Login as Student</center></h3>
    
    <form action="{{route('studentLogin')}}" class="form-group" method="post" autocomplete="off">
        {{csrf_field()}}   
        <label for="">Email</label><br>
        <input type="text" name="email" ><br>

        <label for="">Password</label><br>
        <input type="password" name="password"  ><br>  <br>       
        
        <input type="submit" class="btn btn-primary" value="Login"><br><br>

        @if($errors->any())
            <div class="alert alert-success" style="height: 100px; width:190px;">
               <h4>{{$errors->first()}}</h4>
            </div>
        @endif

    </form>
 @endsection
