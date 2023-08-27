<?php

namespace App\Http\Controllers;

use App\Models\Classes;
use App\Models\Grade;
use App\Models\User;
use App\Rules\ValidSuNumber;
use Illuminate\Http\Request;


class TeacherController extends Controller
{
    public function Teachers(){
        $teachers = User::where('role_id', 4)
                        ->where('is_archived', false)
                        ->get();
        return view('teacher-list', compact('teachers'));
    }

    public function addTeacher(){

        $grades=Grade::all();
        $classes=Classes::all();
        return view('add-teacher',compact('grades','classes'));
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

            $admission_number = $request->admission_number;

            $existingUser = User::where('admission_number', $admission_number)->first();
            if ($existingUser) {
                return redirect()->back()->with('error', 'User with this admission number already exists');
            }

            $this->createTeacher($request);

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
        $teacher = User::findOrFail($id);
        $grades=Grade::all();
        $classes=Classes::all();
        return view('edit-teacher', compact('teacher', 'grades', 'classes'));
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

            $existingUser = User::where('admission_number', $request->admission_number)
            ->where('id', '!=', $id) 
            ->first();

            if ($existingUser) {
            return redirect()->back()->withErrors(['admission_number' => 'User with this admission number already exists'])->withInput();
            }
            

            $this->update($request, $id);

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

    private function createTeacher(Request $request)
    {
        $student = new User;
        $student->name = $request->name;
        $student->email = $request->email;
        $student->role_id = 4;
        $student->year_of_registration = $request->year_of_registration;
        $student->admission_number = $request->admission_number;
        $student->class_id = $request->class_id;
        $student->grade_id = $request->grade_id;
        $student->save();
    }

    private function update(Request $request, $id)
    {
        User::where('id', $id)->update([
            'name' => $request->name,
            'email' => $request->email,
            'year_of_registration' => $request->year_of_registration,
            'admission_number' => $request->admission_number,
            'class_id' => $request->class_id,
            'grade_id' => $request->grade_id,
        ]);

    }


}
