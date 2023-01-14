<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use Illuminate\Http\Response;
use Illuminate\Http\Request;
use App\Models\Admin;
use App\Models\Token;
use DateTime;

class APILoginController extends Controller
{
    public function  login(Request $req){

        $user = Admin::where('email',$req->email)->where('password',$req->password)->first();
            
        if($user && $user->status == "active"){
            $token_no = Str::random(64);
            $token = new Token();
            $token->user_id = $user->main_id;
            $token->token_no = $token_no;
            $token->login_at = new DateTime();
            $token->save();
    
            return $token_no;
        }
        else if($user && $user->status == "block"){
            return "block";
        }
        else{
            return "failed";
        }
       
    }
    
    
    //Logout
    
    public function  logout(Request $req){
    
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
    
}
