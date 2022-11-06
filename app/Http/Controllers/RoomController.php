<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Illuminate\Http\Response;
use Illuminate\Http\Request;

use DateTime;
use App\Models\Room;



class RoomController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $room_datas = Room::all();
        return view('pages.customer.room', compact('room_datas'));
    }
    public function getRoom(Request $request)
    {
        $room = Room :: where('cetegory', $request->cetegory)
        ->where('status', "available")
        ->get();
        if (count($room) > 0) {
            return response()->json($room);
        }
        
    }
    public function getRent(Request $request)
    {
        $rent = Room :: select('rent_per_day')
        ->where('id', $request->id)->get();
        
        return response()->json($rent);
        
    }

    public function newRoom()
    {
        return view('pages.customer.addRoom');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        
        $room = new Room();
        $room->cetegory = $request->cetegory;
        $room->rent_per_day = $request->rent;
        $room->save(); 
        return redirect()->back()->withErrors(['Room listed !']);
    }
    public function bookings(Request $request)
    {
         $room = Room::where('id', $request->room_id)->first();
         $room->status = "booked";
         $room->booked_for = $request->customer_id;
         $room->save();
         return redirect()->back()->withErrors(['Bookings Done !']);
    }
 
    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreRoomRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreRoomRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Room  $room
     * @return \Illuminate\Http\Response
     */
    public function show(Room $room)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Room  $room
     * @return \Illuminate\Http\Response
     */
    public function edit(Room $room)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateRoomRequest  $request
     * @param  \App\Models\Room  $room
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateRoomRequest $request, Room $room)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Room  $room
     * @return \Illuminate\Http\Response
     */
    public function destroy(Room $room)
    {
        //
    }
}
