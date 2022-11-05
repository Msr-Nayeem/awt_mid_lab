@extends('layouts.app')

@section('content')

    @if($errors->any())
        <div class="alert alert-success">
        <h6 style="color: red;">{{$errors->first()}}</h6>
        </div>
    @endif
    <table class="table table-bordered" style="cursor:default;">
        <tr style="cursor:default;">
            <th style="text-align: left">Room ID</th>
            <th>Category</th>
            <th>Status</th>
            <th>Rent per day</th>
            <th>Guest ID</th>
        </tr>
        @foreach($room_datas as $room)
        <tr>
            <td>{{$room->id}}</td>
            <td>{{$room->cetegory}}</td>
            <td>{{$room->status}}</td>
            <td>{{$room->rent_per_day}} BDT</td>
            <td><a href="/details/{{$room->booked_for}}">{{$room->booked_for}}</a></td>
        </tr>
        @endforeach
        <tfoot>
            <tr>
                <td colspan="5" style="text-align: center">Total Room: {{count($room_datas);}} </td>
            </tr>
        </tfoot> 
        
    </table>




@endsection