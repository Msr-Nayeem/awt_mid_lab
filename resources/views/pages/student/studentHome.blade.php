@extends('layouts.app')

@section('content')
<div class="container" style="cursor:default;">
    <br>
    <div class="main-body">
            
        <!-- <div class="card">
            <div class="card-body">
                <div class="align-items-center text-center">
                    <div class="mt-3">
                        <div class="row">
                            <div class="col-sm-3">
                                <h6 class="mb-0">Full Name :</h6>
                            </div>
                            <div class="col-sm-3">
                                <h6 class="mb-0" style = "text-transform:capitalize;">nayeem</h6>   
                            </div>
                         </div>
                    </div>
                </div>
            </div>
        </div> -->
        <div class="card">
            <div class="card-body" style="background-color:cyan;">
                <div class="container">
                <form action="{{route('bookings')}}"  method="post">
                         {{csrf_field()}}
                    <label style="margin-left:20px;">Room Id: </label>
                    <input type="number" name="id" id="roomId" class="mb-0" style="width:100px; height:40px;" value="3">    

                    <label style="margin-left:20px;">From: </label>
                    <input type="date" name="from_" id="from_" class="mb-0" style="width:100px; height:40px;">      
                 
                    <label style="margin-left:20px;">To: </label>
                    <input type="date" name="to_" id="to_" class="mb-0" style="width:100px; height:40px;">      
                 
                    <!-- <label class="form-label" for="cetegory" style="margin-left:20px;">Cetegory</label>
                    <select class="mb-0" id="cetegory" name="cetegory" style="width:200px; height:40px;">
                        <option value="delux">Delux (3k)</option>
                        <option value="premium">Premium (2k)</option>
                        <option value="regular">Regular (1k)</option>
                    </select>  --> 
                    <label style="margin-left:20px;">Customer Id: </label>
                    <input type="number" name="customer_id" id="customer_id" class="mb-0" style="width:50px; height:30px;" value="1">  

                    <button type="submit" class="mb-0" style="width: 150px; height:40px; margin-left:20px; background-color:darkcyan; border: 2px;">Submit </button>
                    @if($errors->any())
                        <div class="err">
                        <h4>{{$errors->first()}}</h4>
                        </div>
                    @endif
                 </div>
        </div>
            
     </div>
    
 @endsection
