<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class StudentController extends Controller
{
    public function createStudent(){
        return view('pages.student.createStudent');
    }
    public function createStudentSubmitted(Request $request){
       // $name = $request->name;
        //return $request;

        $validate = $request->validate([
            "name"=>"required|min:5|max:20",
            "id"=>"required",
            'dob'=>'required',
            'email'=>'email',
            'phone'=>'required|regex:/^([0-9\s\-\+\(\)]*)$/'
        ],
        [
            'name.required'=>"name here",
            'dob.required'=>"Select date of birth",
            'phone.required'=>"Phone Number"
            
        ]
        
        );

        return $request;
    }


    public function studentList(){
        $student = array();
        for($i=1; $i<=10; $i++){
            $student = array(
                "name"=>"Student ".($i),
                "id"=>"sid".($i),
                "dob"=>"2000-".($i)."-01"
            );
            $students[] = (object)$student;
        }
        return view('pages.student.list')->with('students', $students);
    }


}
