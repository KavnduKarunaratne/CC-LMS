<?php

namespace App\Http\Controllers;

use App\Models\Classes;
use App\Models\Grade;
use App\Models\Subject;
use App\Models\Teacher;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class TeacherController extends Controller
{
    public function Teachers(){

        $teachers= User::where('role_id',4)->get();
        return view('teacher-list', compact('teachers'));
    }

   

    public function AddTeacher(){
        return view('add-teacher',[
            'grades' => (new Grade())->all(),
            'classes' => (new Classes())->all(),

        ]);
    }

    public function saveTeacher(Request $request){

        $request->validate([
            'name'=> 'required',
            'email'=>'required|email',
            'admission_number'=>'required',
            'year_of_registration'=>'required',
            'class_id'=>'required',
            'grade_id'=>'required',
        ]);

        $teacherName = $request->name; // Use a different variable name for teacher name from the request
        $teacherEmail = $request->email; // Use a different variable name for teacher email from the request
        $teacherAdmissionNumber = $request->admission_number; // Use a different variable name for teacher phone from the request
        $teacherReg = $request->year_of_registration;
        $teacherClass = $request->class_id;
        $teacherGrade=$request->grade_id;


        $teacher = new User;
        $teacher->name = $teacherName;
        $teacher->email = $teacherEmail;
        $teacher->role_id = 4;
        $teacher->class_id=$teacherClass;
        $teacher->grade_id=$teacherGrade;
        $teacher->admission_number = $teacherAdmissionNumber;
        $teacher->year_of_registration = $teacherReg;

        $teacher->save();

        return redirect('teacher-list')->with('success', 'Teacher added successfully');
    }

    public function deleteTeacher($id){
        User::where('id','=',$id)->delete();
        return redirect('teacher-list')->with('success', 'Teacher deleted successfully');
    }

    public function editTeacher($id){
        $teacher = User::where('id','=',$id)->first();


        return view('edit-teacher', compact('teacher'), [
            'grades' => (new Grade())->all(),
            'classes' => (new Classes())->all(),

        ]);



    }

    public function updateTeacher(Request $request, $id){
        $newTeacherNameValue = $request->name; // Use a different variable name for teacher name from the request
        $newTeacherEmailValue = $request->email; // Use a different variable name for teacher email from the request
        $newTeacherAdmissionNumberValue = $request->admission_number; // Use a different variable name for teacher phone from the request
        $newTeacherRegValue = $request->year_of_registration;
        $newTeacherClassValue = $request->class_id;
        $newTeacherGradeValue=$request->grade_id;

        User::where('id', '=', $id)->update([
            'name' => $newTeacherNameValue, // Use the new variable name here
            'email' => $newTeacherEmailValue, // Use the new variable name here
            'admission_number' => $newTeacherAdmissionNumberValue, // Use the new variable name here
            'year_of_registration' => $newTeacherRegValue, // Use the new variable name here
            'class_id' => $newTeacherClassValue,
            'grade_id'=>$newTeacherGradeValue,
        ]);
        return redirect('teacher-list')->with('success', 'Teacher updated successfully');
    }

    public function teacherPanel()
    {
        // Fetch the logged-in teacher's subjects
        
         $teacher = auth()->user();
         $subjects = $teacher->subjects;
        
         
 
         return view('teacher-panel', compact('subjects'));
    }

}
