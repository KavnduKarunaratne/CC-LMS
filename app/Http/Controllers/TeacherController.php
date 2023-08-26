<?php

namespace App\Http\Controllers;

use App\Models\Classes;
use App\Models\Grade;
use App\Models\Subject;
use App\Models\Teacher;
use App\Models\User;
use App\Rules\ValidSuNumber;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class TeacherController extends Controller
{
    public function Teachers(){
        $teachers = User::where('role_id', 4)
                        ->where('is_archived', false)
                        ->get();
        return view('teacher-list', compact('teachers'));
    }

    public function addTeacher(){
        return view('add-teacher', [
            'grades' => (new Grade())->all(),
            'classes' => (new Classes())->all(),
        ]);
    }

    public function saveTeacher(Request $request){
        try{
            $request->validate([
                'name' => 'required',
                'email' => 'required|email',
                'year_of_registration' => 'required',
                'class_id' => 'required',
                'grade_id' => 'required',
                'admission_number' => ['required', new ValidSuNumber],
            ]);

            $teacherName = $request->name;
            $teacherEmail = $request->email;
            $teacherAdmissionNumber = $request->admission_number;
            $teacherReg = $request->year_of_registration;
            $teacherClass = $request->class_id;
            $teacherGrade = $request->grade_id;

            $existingUser = User::where('admission_number', $teacherAdmissionNumber)->first();
            if ($existingUser) {
                return redirect()->back()->with('error', 'User with this admission number already exists');
            }

            $teacher = new User;
            $teacher->name = $teacherName;
            $teacher->email = $teacherEmail;
            $teacher->role_id = 4;
            $teacher->class_id = $teacherClass;
            $teacher->grade_id = $teacherGrade;
            $teacher->admission_number = $teacherAdmissionNumber;
            $teacher->year_of_registration = $teacherReg;

            $teacher->save();

            return redirect('teacher-list')->with('success', 'Teacher added successfully');
        } catch (\Exception $e) {
            return redirect()->back()->withErrors(['admission_number' => 'The admission number is not valid'])->withInput();
        }
    }

    public function deleteTeacher($id){
        User::where('id', '=', $id)->delete();
        return redirect('teacher-list')->with('success', 'Teacher deleted successfully');
    }

    public function editTeacher($id){
        $teacher = User::where('id', '=', $id)->first();
        return view('edit-teacher', compact('teacher'), [
            'grades' => (new Grade())->all(),
            'classes' => (new Classes())->all(),
        ]);
    }

    public function updateTeacher(Request $request, $id){
        try{
            $request->validate([
                'name' => 'required',
                'email' => 'required|email',
                'year_of_registration' => 'required',
                'class_id' => 'required',
                'grade_id' => 'required',
                'admission_number' => ['required', new ValidSuNumber],
            ]);

            $newTeacherNameValue = $request->name;
            $newTeacherEmailValue = $request->email;
            $newTeacherAdmissionNumberValue = $request->admission_number;
            $newTeacherRegValue = $request->year_of_registration;
            $newTeacherClassValue = $request->class_id;
            $newTeacherGradeValue = $request->grade_id;

            User::where('id', '=', $id)->update([
                'name' => $newTeacherNameValue,
                'email' => $newTeacherEmailValue,
                'admission_number' => $newTeacherAdmissionNumberValue,
                'year_of_registration' => $newTeacherRegValue,
                'class_id' => $newTeacherClassValue,
                'grade_id' => $newTeacherGradeValue,
            ]);

            return redirect('teacher-list')->with('success', 'Teacher updated successfully');
        } catch (\Exception $e){
            return redirect()->back()->withErrors(['admission_number' => 'The admission number is not valid'])->withInput();
        }
    }

    public function teacherPanel(){
        $teacher = auth()->user();
        $subjects = $teacher->subjects;
        return view('teacher-panel', compact('subjects'));
    }
}
