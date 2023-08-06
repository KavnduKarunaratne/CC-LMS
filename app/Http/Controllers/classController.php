<?php

namespace App\Http\Controllers;

use App\Models\Grade;
use App\Models\Role;
use Illuminate\Http\Request;
use App\Models\Classes;

class classController extends Controller
{
    public function Index(){
        $classes = Classes::all();
        return view('dashboard',compact('classes'));
    }

    public function Grade(){
        $grade = Grade::all();
        return view('add-class', compact('grade'));
    }

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




}
