<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;

use Illuminate\Http\Response;
use Illuminate\Http\Request;
use App\Models\Admin;

class APIAdminController extends Controller
{
    public function AdminList(Request $req){
        
        if(!empty($req->searchh)){
            $customer = Admin::Where('main_id',$req->searchh)
            ->orWhere('name','LIKE', '%' .$req->searchh.'%')
            ->orWhere('email','LIKE', '%' .$req->searchh.'%')
            ->get();
            return $customer;
        }
        else{
            return Admin::get();  
        }
        
    }
    

    
    public function changeStatus(Request $req){
        
        $customer = Admin :: where('main_id', $req->idd)->first();
        if($customer && $customer->status == "active"){
            $affected = DB::table('admins')
              ->where('main_id', $req->idd)
              ->update(['status' => "block"]);
            if($affected){
                return Admin::get();
            }
        }
        else if($customer && $customer->status == "block"){
            $affected = DB::table('admins')
            ->where('main_id', $req->idd)
            ->update(['status' => "active"]);
            if($affected){
                return Admin::get();
            }
        }
        else if(!$customer){
            return "error";
        }

    }
    public function deleteAdmin(Request $req){
        
        $customer = DB::table('admins')->where('main_id', $req->idd)->delete();
        if($customer){
          return Admin::get();
        }
        else{
            return "error";
        }
        

    }
}
