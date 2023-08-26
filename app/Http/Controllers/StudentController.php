<?php

namespace App\Http\Controllers;

use App\Models\Classes;
use App\Models\Grade;
use App\Models\User;
use App\Rules\ValidSuNumber;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Student;

class StudentController extends Controller
{
    public function Student(){
        $student = User::where('role_id', 3)
            ->where('is_archived', false)
            ->get();

        return view('student-list', compact('student')); 
    }

    public function Grade(){
        $grade = Grade::all();
        return view('add-student', compact('grade'));
    }

    public function  Classes(){
        $classes = Classes::all();
        return view('add-student', compact('classes'));
    }

    public function addStudent(){
        return view('add-student', [
            'grades' => (new Grade())->all(),
            'classes' => (new Classes())->all(),
        ]);
    }

    public function saveStudent(Request $request){
        try{
            $request->validate([
                'name'=> 'required',
                'email'=>'required|email',
                'year_of_registration'=>'required',
                'class_id'=>'required',
                'grade_id'=>'required',
                'admission_number' => ['required', new ValidSuNumber],
            ]);

            $name = $request->name;
            $email = $request->email;
            $year_of_registration = $request->year_of_registration;
            $admission_number = $request->admission_number;
            $class_id = $request->class_id;
            $grade_id = $request->grade_id;

            $existingUser = User::where('admission_number', $admission_number)->first();
            if ($existingUser) {
                return redirect()->back()->with('error', 'User with this admission number already exists');
            }

            $student = new User;
            $student->name = $name;
            $student->email = $email;
            $student->role_id = 3;
            $student->year_of_registration = $year_of_registration;
            $student->admission_number = $admission_number;
            $student->class_id = $class_id;
            $student->grade_id = $grade_id;
            $student->save();

            return redirect()->back()->with('success', 'student added successfully');
        } catch(\Exception $e){
            return redirect()->back()->withErrors(['admission_number' => 'The admission number is not valid'])->withInput();
        }
    }

    public function editStudent($id){
        $student = User::where('id', '=', $id)->first();
        return view('edit-student', compact('student'), [
            'grades' => (new Grade())->all(),
            'classes' => (new Classes())->all(),
        ]);
    }

    public function updateStudent(Request $request){
        try{
            $request->validate([
                'name'=> 'required',
                'email'=>'required|email',
                'year_of_registration'=>'required',
                'admission_number' => ['required', new ValidSuNumber],
                'class_id'=>'required',
                'grade_id'=>'required',
            ]);

            $id = $request->id;
            $newStudentNameValue = $request->name;
            $newStudentEmailValue = $request->email;
            $newStudentYearOfRegistrationValue = $request->year_of_registration;
            $newStudentAdmissionNumberValue = $request->admission_number;
            $newStudentClassIdValue = $request->class_id;
            $newStudentGradeIdValue = $request->grade_id;

            User::where('id', '=', $id)->update([
                'name' => $newStudentNameValue,
                'email' => $newStudentEmailValue,
                'year_of_registration' => $newStudentYearOfRegistrationValue,
                'admission_number' => $newStudentAdmissionNumberValue,
                'class_id' => $newStudentClassIdValue,
                'grade_id' => $newStudentGradeIdValue,
            ]);

            return redirect('student-list')->with('success', 'student updated successfully');
        } catch(\Exception $e){
            return redirect()->back()->withErrors(['admission_number' => 'The admission number is not valid'])->withInput();
        }
    }

    public function deleteStudent($id){
        User::where('id', '=', $id)->delete();
        return redirect('student-list')->with('success', 'student deleted successfully');
    }
}
