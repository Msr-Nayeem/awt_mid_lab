<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class StudentController extends Controller
{
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
