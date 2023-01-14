<?php
namespace App\Http\Controllers;

use DatePeriod;
use Illuminate\Http\Response;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

use App\Models\Customer;
use App\Models\Admin;
use App\Models\Receiptionist;
use App\Models\Room;
use App\Models\Country;
use App\Models\Cetegory;


use App\Models\Token;
use DateTime;

class LoginAPIController extends Controller
{

//Registration
    public function apiRegistration(Request $req){
        $admin = new Admin();
        $admin->name = $req->name;
        $admin->email = $req->email;
        $admin->phone = $req->phone;
        $admin->password = $req->password;
        $admin->dob = $req->dob;
        $admin->save(); 

        return "Registration success. Now back to Login";
    }
//    
 
//UPDATE
    public function userUpdate(Request $req){
        $affected = DB::table('admins')
              ->where('main_id', $req->userID)
              ->update(['name' => $req->Name, 'email' => $req->Email, 'phone' => $req->Phone, 'dob' => $req->DOB]);
        if($affected)
        {
            return "done";
        }
    }
//     
    public function  apiLogin(Request $req){

    $user = Admin::where('email',$req->email)->where('password',$req->password)->first();
        
    if($user){
        $token_no = Str::random(64);
        $token = new Token();
        $token->user_id = $user->main_id;
        $token->token_no = $token_no;
        $token->login_at = new DateTime();
        $token->save();

        return $token_no;
    }
    else{
        return "failed";
    }
   
}


//Logout

public function  apiLogout(Request $req){

    $token = Token::where('token_no',$req->token_no)->first();
    if($token){
        $token->logout_at =new DateTime();
        $token->save();
        return "logout success";
    }
    else{
        return "failed";
    }

}



//User Profile
    public function  profile(Request $req){
       
        $id = Token::select('user_id')->where('token_no',$req->userToken)->first();
        $userId = $id->user_id;

        $profile = Admin::where('admins.main_id', $userId)
        ->join('cities', 'cities.id', '=', 'admins.city_id')
        ->join('districts', 'districts.id', '=', 'admins.district_id')
        ->join('areas', 'areas.id', '=', 'admins.area_id')->first();
        
        return $profile; 
       
    }

//USER INformation
public function  getDetails(Request $req){
       
    $profile = Admin::where('admins.main_id', $req->userID)
        ->join('cities', 'cities.id', '=', 'admins.city_id')
        ->join('districts', 'districts.id', '=', 'admins.district_id')
        ->join('areas', 'areas.id', '=', 'admins.area_id')->first();
    return $profile;
   
}



//ADMIN
    public function AdminList(Request $req){
        
        if(!empty($req->searchh)){
            $admin = Admin::where('utype', "admin")->orWhere('main_id',$req->searchh)
            ->orWhere('name','LIKE', '%' .$req->searchh.'%')
            ->orWhere('email','LIKE', '%' .$req->searchh.'%')
            ->get();
            return $admin;
        }
        else{
            return Admin ::where('utype', 'admin')->get(); 
        }
        
    }
    public function DeleteAdmin(Request $req){
        $admin =  DB::table('admins')->where('main_id', $req->idd)->delete();
        if($admin){
            return Admin::select('name','main_id', 'email', 'utype')->where('utype', 'admin')->get();
        }
    }

//END_ADMIN


//BOOKING
    public function getRooms(Request $req){
            $freeRoom = Room::select('id','rent_per_day', 'cetegory')->where('cetegory', $req->inCetegory)->where('booked_for', null)
            ->get();
            return $freeRoom;  
    }
    public function getRent(Request $req){
 
            $rent = Room::select('rent_per_day')->where('id', $req->roomID)->first();
            
            return $rent->rent_per_day;
     
    }
    public function getCetegory(){
 
            $ctgry = Cetegory::get();
            return $ctgry;
     
    }
    public function getCustomer(){
 
            $customer = Admin::select('main_id', 'name','email')->where('utype', 'customer')->get();
            return $customer;
     
    }
    
    public function makeBooking(Request $req){
        $roomm = Room::where('id', $req->RoomId)->first();
        $roomm->booked_for = $req->CustomerId;
        $roomm->save();
        if($roomm){
            return true;
        }
        else{
            return false;
        }        
    }
//ROOM
public function rooms(Request $req){
        
    if(!empty($req->searchh)){
        $roomm = Room::where('cetegory','LIKE', '%' .$req->searchh.'%')
        ->orWhere('status','LIKE', '%' .$req->searchh.'%')
        ->orWhere('rent_per_day','LIKE', '%' .$req->searchh.'%')
        ->get();
        return $roomm;
        
    }
    else{
        return Room :: get();  
    }
    
}

    public function deleteRooms(Request $req){
        $roomm = Room::where('id', $req->id)->first();
        $roomm->delete();

        return Room :: get();
    }
    public function addRoom(Request $req){
        $room = new Room();
        $room->cetegory = $req->cetegory;
        $room->rent_per_day = $req->rent;
        $room->save();
        if($room){
            return "success";
        }
        else{
            return "error";
        }
    }
    public function cancelBooking(Request $req){
        $roomm = Room::where('id', $req->id)->first();
        $roomm->booked_for = null;
        $roomm->save();
        return Room :: get();
    }
 //END_ROOM

//Practice
    public function APIpost(Request $req){
        $student = new Student();
        $student->name = $req->name;
        $student->email = $req->email;
        $student->phone = $req->phone;
        $student->password = $req->password;
        $student->dob = new DateTime();
        $student->save();  
        


        return "Registration success"; 
    }

    public function APIList(){
        
        return Student :: select('name','main_id', 'email')->get();
    }
    

}