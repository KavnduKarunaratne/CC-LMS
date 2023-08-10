<?php

namespace App\Http\Controllers;

use App\Models\Teacher;
use App\Models\User;
use Illuminate\Http\Request;

class TeacherController extends Controller
{
    public function Teachers(){

        $teachers= User::where('role_id',4)->get();
        return view('teacher-list', compact('teachers'));
    }

    public function AddTeacher(){
        return view('add-teacher');
    }

    public function saveTeacher(Request $request){

        $request->validate([
            'name'=> 'required',
            'email'=>'required|email',
            'admission_number'=>'required',
            'year_of_registration'=>'required',
        ]);

        $teacherName = $request->name; // Use a different variable name for teacher name from the request
        $teacherEmail = $request->email; // Use a different variable name for teacher email from the request
        $teacherAdmissionNumber = $request->admission_number; // Use a different variable name for teacher phone from the request
        $teacherReg = $request->year_of_registration;


        $teacher = new User;
        $teacher->name = $teacherName;
        $teacher->email = $teacherEmail;
        $teacher->role_id = 4;
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


        return view('edit-teacher', compact('teacher'));
    }

    public function updateTeacher(Request $request, $id){
        $newTeacherNameValue = $request->name; // Use a different variable name for teacher name from the request
        $newTeacherEmailValue = $request->email; // Use a different variable name for teacher email from the request
        $newTeacherAdmissionNumberValue = $request->admission_number; // Use a different variable name for teacher phone from the request
        $newTeacherRegValue = $request->year_of_registration;

        User::where('id', '=', $id)->update([
            'name' => $newTeacherNameValue, // Use the new variable name here
            'email' => $newTeacherEmailValue, // Use the new variable name here
            'admission_number' => $newTeacherAdmissionNumberValue, // Use the new variable name here
            'year_of_registration' => $newTeacherRegValue, // Use the new variable name here
        ]);
        return redirect('teacher-list')->with('success', 'Teacher updated successfully');
    }

    

}
