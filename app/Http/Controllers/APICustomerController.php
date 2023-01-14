<?php


namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;

use Illuminate\Http\Response;
use Illuminate\Http\Request;
use App\Models\Customer;


class APICustomerController extends Controller
{
    public function CustomerList(Request $req){
        
        if(!empty($req->searchh)){
            $customer = Customer::Where('main_id',$req->searchh)
            ->orWhere('name','LIKE', '%' .$req->searchh.'%')
            ->orWhere('email','LIKE', '%' .$req->searchh.'%')
            ->get();
            return $customer;
        }
        else{
            return Customer::get();  
        }
        
    }
    

    
    public function changeStatus(Request $req){
        
        $customer = Customer :: where('main_id', $req->idd)->first();
        if($customer && $customer->status == "active"){
            $affected = DB::table('customers')
              ->where('main_id', $req->idd)
              ->update(['status' => "block"]);
            if($affected){
                return Customer::get();
            }
        }
        else if($customer && $customer->status == "block"){
            $affected = DB::table('customers')
            ->where('main_id', $req->idd)
            ->update(['status' => "active"]);
            if($affected){
                return Customer::get();
            }
        }
        else if(!$customer){
            return "error";
        }

    }
    public function deleteCustomer(Request $req){
        
        $customer = DB::table('customers')->where('main_id', $req->idd)->delete();
        if($customer){
          return Customer::get();
        }
        else{
            return "error";
        }
        

    }

}
