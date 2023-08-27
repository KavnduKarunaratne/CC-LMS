<?php

namespace App\Http\Controllers;
use App\Models\Grade;
use App\Models\Subject;
use App\Models\User;
use Illuminate\Http\Request;
use App\Models\Classes;


class ClassesController extends Controller
{
    public function Class(){
        $classes = Classes::all();
        return view('class-management', compact('classes'));
    }

    public function addClass(){

        $grades=Grade::all();
        $classes=Classes::all();
        return view('add-class', compact('grades','classes'));
    }

    public function saveClass(Request $request){ 
        try{
            $request->validate([
                'class_name'=> 'required',
                'grade_id'=>'required',
            ]);
            Classes::create([
                'class_name' => $request->class_name,
                'grade_id' => $request->grade_id,
            ]);
            return redirect('subject-list')->with('success', 'class added successfully');
        }catch(\Exception $e){
            return redirect()->back()->with('error', 'class already exists');
        }
    }

    public function editClass($id){
        $class = Classes::findOrfail($id);
        return view('edit-class', compact('class'));
    }

    public function updateClass(Request $request, $id){
        try{
            $request->validate([
                'class_name'=> 'required',
                'grade_id'=>'required',
            ]);

            $class = Classes::findOrFail($id);
            $class->update([
                'class_name' => $request->class_name,
                'grade_id' => $request->grade_id,
            ]);

            return redirect('subject-list')->with('success', 'class updated successfully');
        }catch(\Exception $e){
            return redirect()->back()->with('error', 'Error updating class');
        }
    }

    public function deleteClass($id){
        Classes::where('id','=',$id)->delete();
        return redirect('dashboard')->with('success', 'class deleted successfully');
    }
    
    public function showDetails(Classes $class){
        $students = User::where('grade_id', $class->grade_id)
            ->where('class_id', $class->id)
            ->where('role_id', 3) //role 3 is for students
            ->get();

        $subjects = Subject::where('grade_id', $class->grade_id)
            ->where('class_id', $class->id)
            ->with('teacher')
            ->get();

        return view('class-details', compact('class', 'students', 'subjects'));
    }
}
