<?php
namespace App\Http\Controllers;

use DatePeriod;
use Illuminate\Http\Response;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

use App\Models\Student;
use App\Models\Token;
use DateTime;

class LoginAPIController extends Controller
{

    public function apiRegistration(Request $req){
       /*  $student = new Student();
        $student->name = $req->name;
        $student->email = $req->email;
        $student->phone = $req->phone;
        $student->password = $req->password;
        $student->dob = $req->dob;
        $student->save(); */

        return "Registration success";
    }



    public function  apiLogin(Request $req){

        $user = Student::where('email',$req->email)->where('password',$req->password)->first();
        
        if($user){
            $token_no = Str::random(32);
            $token = new Token();
            $token->user_id = $user->id;
            $token->token_no = $token_no;
            $token->login_at = new DateTime();
            $token->save();

            return $token_no;
        }
        else{
            return "failed";
        }
       
    }

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
     
    public function APIList(){
        
        return Student :: select('name','id')->get();
    }

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
    

}