<?php

namespace App\Http\Controllers;

use App\Models\Classes;
use App\Models\Grade;
use Illuminate\Http\Request;
use App\Models\Student;

class StudentController extends Controller
{

    public function Student(){
        $student=Student::all();
        
        return view('student-list',compact('student'));
    }
    public function Grade(){
        $grade = Grade::all();
        return view('add-student',compact('grade'));
    }

    public function  Classes(){
        $classes = Classes::all();
        return view('add-student', compact('classes'));
    }
    public function AddStudent(){
        return view('add-student',[
            'grades' => (new Grade())->all(),
            'classes' => (new Classes())->all(),
        
        ]);
    }

    public function saveStudent(Request $request){

        $request->validate([
            'student_name'=> 'required',
            'email'=>'required|email',


           
            'year_of_registration'=>'required',
            'admission_number'=>'required',
            'class_id'=>'required',
            'grade_id'=>'required',


  
        ]);

        $student_name=$request->student_name;
        $email=$request->email;
       
        $year_of_registration=$request->year_of_registration;
        $admission_number=$request->admission_number;
        $class_id=$request->class_id;
        $grade_id=$request->grade_id;


        $student = new Student;
        $student->student_name=$student_name;
        $student->email=$email;
        $student->year_of_registration=$year_of_registration;
        $student->admission_number=$admission_number;
        $student->class_id=$class_id;
        $student->grade_id=$grade_id;
        $student->save();
        return redirect()->back()->with('success','student added succesfully');
       

    } 
    public function deleteStudent($id){
        Student::where('id','=',$id)->delete();
        return redirect('student-list')->with('success','student deleted succesfully');

    }
  
}
