<?php

namespace App\Http\Controllers;

use App\Models\Classes;
use App\Models\Grade;
use App\Models\User;
use Illuminate\Http\Request;
use App\Models\Student;
use Illuminate\Support\Facades\Auth;

class StudentController extends Controller
{

    public function Student(){
        $student= User::where('role_id',3)->get();
        
        return view('student-list',compact('student'));

        
        // return $data;
         
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
            'name'=> 'required',
            'email'=>'required|email',


           
            'year_of_registration'=>'required',
            'admission_number'=>'required',

           'class_id'=>'required',
        'grade_id'=>'required',


  
        ]);

        $name=$request->name;
        $email=$request->email;
       
        $year_of_registration=$request->year_of_registration;
        $admission_number=$request->admission_number;
     //  $password = $request->password?$request->password:Auth::user()->password;
        $class_id=$request->class_id;
       $grade_id=$request->grade_id;


        $student = new User;
        $student->name=$name;
        $student->email=$email;
        $student->role_id=3;
        $student->year_of_registration=$year_of_registration;
        $student->admission_number=$admission_number;
      //  $student->password=bcrypt($password);

        $student->class_id=$class_id;
        $student->grade_id=$grade_id;
        $student->save();
        return redirect()->back()->with('success','student added succesfully');
       

    } 


    public function editStudent($id){
        $student = User::where('id','=',$id)->first();
        return view('edit-student',compact('student'),[
            'grades' => (new Grade())->all(),
            'classes' => (new Classes())->all(),
        
        
        ]);
    }

    public function updateStudent(Request $request){
        $id=$request->id;

        $newStudentNameValue = $request->name;
        $newStudentEmailValue = $request->email;
        $newStudentYearOfRegistrationValue = $request->year_of_registration;
        $newStudentAdmissionNumberValue = $request->admission_number;
       $newStudentClassIdValue = $request->class_id;
        $newStudentGradeIdValue = $request->grade_id;

        User::where('id', '=', $id)->update([
            'name' => $newStudentNameValue ,
            'email' => $newStudentEmailValue,
            'year_of_registration' => $newStudentYearOfRegistrationValue,
            'admission_number' => $newStudentAdmissionNumberValue,
            'class_id' => $newStudentClassIdValue,
           'grade_id' => $newStudentGradeIdValue,

        ]);

        return redirect('student-list')->with('success', 'student updated successfully');

    }
    public function deleteStudent($id){
        User::where('id','=',$id)->delete();
        return redirect('student-list')->with('success','student deleted succesfully');

    }
  
}
