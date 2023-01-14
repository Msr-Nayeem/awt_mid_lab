<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;

use Illuminate\Http\Response;
use Illuminate\Http\Request;
use App\Models\Receiptionist;


class APIReceiptionistController extends Controller
{

//Receiptionist
public function ReceiptionistList(Request $req){
        
    if(!empty($req->searchh)){
        $receiptionist = Receiptionist::Where('main_id',$req->searchh)
        ->orWhere('name','LIKE', '%' .$req->searchh.'%')
        ->orWhere('email','LIKE', '%' .$req->searchh.'%')
        ->get();
        return $receiptionist;
    }
    else{
        return Receiptionist::get();  
    }
    
}

public function deleteReceiptionist(Request $req){
    
    $receiptionist = Receiptionist::where('main_id', $req->receiptionist_id)->first();
     
    $receiptionist->delete(); 

    return Receiptionist::get();
}
public function changeStatus(Request $req){
        
    $customer = Receiptionist :: where('main_id', $req->idd)->first();
    if($customer && $customer->status == "active"){
        $affected = DB::table('receiptionists')
          ->where('main_id', $req->idd)
          ->update(['status' => "block"]);
        if($affected){
            return Receiptionist::get();
        }
    }
    else if($customer && $customer->status == "block"){
        $affected = DB::table('receiptionists')
        ->where('main_id', $req->idd)
        ->update(['status' => "active"]);
        if($affected){
            return Receiptionist::get();
        }
    }
    else if(!$customer){
        return "error";
    }

}


}
