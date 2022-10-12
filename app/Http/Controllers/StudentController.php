<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Student;

class StudentController extends Controller
{
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
            'phone'=>'required|regex:/^([0-9\s\-\+\(\)]*)$/'
        ],
        [
            'name.required'=>"name here",
            'dob.required'=>"Select date of birth",
            'phone.required'=>"Phone Number"
            
        ]
        
        );

        $student = new Student();
        $student->name = $request->name;
        $student->student_id = $request->student_id;
        $student->email = $request->email;
        $student->dob = $request->dob;
        $student->phone = $request->phone;
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
             "name"=>"required|min:5|max:20",
             "student_id"=>"required",
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
 
         $student = Student::where('id', $request->id)->first();
         $student->name = $request->name;
         $student->student_id = $request->student_id;
         $student->email = $request->email;
         $student->dob = $request->dob;
         $student->phone = $request->phone;
         $student->save(); 

         return redirect()->route('studentList');
        }
         // EDIT STUDENT DONE

        //Delete Student
        public function studentDelete(Request $request){
            $student = Student::where('id', $request->id)->first();
            $student->delete();

            return redirect()->route('studentList');
        }
     
}
