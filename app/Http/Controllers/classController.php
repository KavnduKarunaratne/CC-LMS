<?php

namespace App\Http\Controllers;

use App\Models\Grade;
use App\Models\Role;
use App\Models\Student;
use App\Models\Subject;
use App\Models\User;
use Illuminate\Http\Request;
use App\Models\Classes;

class classController extends Controller
{
    public function Class(){
        $classes = Classes::all();
        return view('class-management',compact('classes'));
    }

    /*public function Grade(){
        $grade = Grade::all();
        return view('add-class', compact('grade'));
    }*/

    public function AddClass(){
        return view('add-class',[
            'grades' => (new Grade())->all(),
            'classes' => (new Classes())->all(),


        ]);
    }

    public function saveClass(Request $request)
    {
        $request->validate([
            'class_name'=> 'required',
            'grade_id'=>'required',
        ]);
        $class_name = $request->class_name;
        $grade_id=$request->grade_id;

        $class = new Classes;
        $class->class_name = $class_name;
        $class->grade_id=$grade_id;


        $class->save();
        return redirect('dashboard')->with('success', 'class added successfully');
    }

    public function editClass($id){

        $class = Classes::where('id','=',$id)->first();
        return view('edit-class',compact('class'));
      }

      public function updateClass(Request $request, $id)
    {
        $newClassNameValue = $request->class_name;
        $newClassGradeValue = $request->grade_id;

        Classes::where('id', '=', $id)->update([
            'class_name' => $newClassNameValue ,
            'grade_id' => $newClassGradeValue

        ]);

        return redirect('dashboard')->with('success', 'class updated successfully');
    }


      public function deleteClass($id){
        Classes::where('id','=',$id)->delete();
        return redirect('dashboard')->with('success','class deleted succesfully');
      }
     /* public function showDetails(Classes $class)
      {
          $students = User::where('grade_id', $class->grade_id, $role_id=3)
              ->where('class_id', $class->id)
              ->with('studentname')
              ->get();
      
          $subjects = Subject::where('grade_id', $class->grade_id)
              ->where('class_id', $class->id)
              ->with('teachername')
              ->get();
      
          return view('class-details', compact('class', 'students', 'subjects'));
      }*/

      public function showDetails(Classes $class)
{
    $students = User::where('grade_id', $class->grade_id)
        ->where('class_id', $class->id)
        ->where('role_id', 3) // Assuming 3 is the role_id for students
        ->get();

    $subjects = Subject::where('grade_id', $class->grade_id)
        ->where('class_id', $class->id)
        ->with('teacher') // Assuming you have defined the relationship as 'teacher'
        ->get();

    return view('class-details', compact('class', 'students', 'subjects'));
}



}