<?php

namespace App\Http\Controllers;


use Illuminate\Http\Response;
use Illuminate\Http\Request;
use App\Models\Student;
use App\Http\Controllers\CookieController;

class StudentController extends Controller
{
    
    public function studentHome(){
        
        $student = Student::where('id', session()->get("id"))->first();
        session()->put('log', $student->id);
        return view('pages.student.studentHome')->with('student', $student);
    }
    public function studentLogin(){ 
        return view('pages.student.studentLogin');
    }
    public function studentLoginCheck(Request $request){
        $email = $request->email;
        $p = $request->password;
        $password = $request->password;

         $student = Student::where('email', $email)
        ->where('password', $password)->first();

        if( $request->input('remember') == 'remember'){
            cookie()->queue(cookie(name: 'email', value: $email, minutes: 60*7*24));
            cookie()->queue(cookie(name: 'password', value: $p, minutes: 60*7*24));    
        }
        else{
            cookie()->queue(cookie(name: 'email', value: '', minutes: -3600));
            cookie()->queue(cookie(name: 'password', value: '', minutes: -3600));  
        }

        if($student){    
            $request->session()->put('id', $student->id);
            $request->session()->put('type', $student->utype);
             if($request->session()->has('url')){
                 $url = $request->session()->get('url');
                 $request->session()->forget('url');
                 return redirect()->route($url);
             }
             return redirect()->route('studentHome'); 
             
         }
         else{
              return redirect()->back()->withErrors(['User not found']);
         } 
        
    }

    public function studentLogout(){
        session()->flush();
        return redirect()->route('studentLogin');
    }

    // ADD STUDENT
    public function createStudent(){
        return view('pages.student.createStudent');
    }
    public function createStudentSubmitted(Request $request){
       // $name = $request->name;
        //return $request;

        $validate = $request->validate([
            "name"=>"required|min:5|max:20",
            "student_id"=>"required",
            'dob'=>'required',
            'email'=>'email',
            'password'=>'required',
            'phone'=>'required|regex:/^([0-9\s\-\+\(\)]*)$/',
            'address'=>'required'
            
        ],
        [
            'dob.required'=>"Select date of birth",
            'phone.required'=>"Phone Number needed",
            'password.required'=>"Password needed for login"
            
        ]
        
        );

        $student = new Student();
        
        $student->utype = $request->utype;
        $student->name = $request->name;
        $student->email = $request->email;
        $student->password = $request->password;
        $student->phone = $request->phone;
        $student->address = $request->address;
        $student->student_id = $request->student_id;
        $student->dob = $request->dob;
        $student->save();

        return redirect()->route('studentList');

    }
    // DONE ADDING


    // SHOW STUDENT
    public function studentList(){
        /* $student = array();
        for($i=1; $i<=10; $i++){
            $student = array(
                "name"=>"Student ".($i),
                "id"=>"sid".($i),
                "dob"=>"2000-".($i)."-01"
            );
            $students[] = (object)$student;
        } */
        $student = Student::all();
        return view('pages.student.studentList')->with('students', $student);
    }
    // DONE STUDENT LIST

    // EDIT STUDENT
    public function studentEdit(Request $request){
        $student = Student::where('id', $request->id)->first();
        return view('pages.student.studentEdit')->with('student', $student);

    }
    public function studentEditSubmitted(Request $request){

         $validate = $request->validate([
             "name"=>"required|min:5",
             "student_id"=>"required",
             'dob'=>'required',
             'email'=>'email',
             'phone'=>'required|regex:/^([0-9\s\-\+\(\)]*)$/',
             'address'=>'required'
         ],
         [
             'name.required'=>"name here",
             'dob.required'=>"Select date of birth",
             'phone.required'=>"Phone Number"
         ]
         
         );
        
         $student = Student::where('id', $request->id)->first();
         $student->name = $request->name;
         $student->email = $request->email;
         $student->password = $request->password;
         $student->phone = $request->phone;
         $student->address = $request->address;
         $student->student_id = $request->student_id;
         $student->dob = $request->dob;
         $student->save(); 

         return redirect()->route('studentList'); 
        }
         // EDIT STUDENT DONE

        //Delete Student
        public function studentDelete(Request $request){
            $student = Student::where('id', $request->sid)->first();
            $student->delete();
            return redirect()->route('studentList');
        }




        //newProfile
        public function profile(){
            $student = Student::where('id',session()->get("id"))->first();
            return view('pages.student.profile')->with('student', $student);
    
        }
        public function details(Request $request){
            $student = Student::where('id', $request->id)->first();
            return view('pages.student.details')->with('student', $student);
    
        }

        public function profileEdit(Request $request){
            $student = Student::where('id', $request->id)->first();
            return view('pages.student.profileEdit')->with('student', $student);
    
        }


        public function profileEditSubmitted(Request $request){
        
            $validate = $request->validate([
                "name"=>"required|min:5",
                "student_id"=>"required",
                'dob'=>'required',
                'email'=>'email',
                'phone'=>'required|regex:/^([0-9\s\-\+\(\)]*)$/',
                'address'=>'required'
            ],
            [
                'name.required'=>"name here",
                'dob.required'=>"Select date of birth",
                'phone.required'=>"Phone Number"
            ]
            
            );
           
            $student = Student::where('id', $request->id)->first();
            $student->name = $request->name;
            $student->email = $request->email;
            $student->phone = $request->phone;
            $student->address = $request->address;
            $student->student_id = $request->student_id;
            $student->dob = $request->dob;
            $student->save(); 
   
            return redirect()->route('profile'); 
           }




     public function changePassword(Request $request){
        $id = $request->id;
        $password = $request->password;
        $student = Student::where('id', $id)->first();
        $student->password = $request->password;
        $student->save();

         return redirect()->back()->withErrors(['password changed']);

    }

           
}
