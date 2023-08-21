<?php

namespace App\Http\Controllers;

use App\Models\Grade;
use Illuminate\Http\Request;

class GradeController extends Controller
{
    public function Grade(){

        $grade = Grade::all();
        return view('dashboard', compact('grade'));
    }

    public function AddGrade(){
        return view('add-grade');
    }

    public function saveGrade(Request $request)
    {
        $gradeValue = $request->grade; // Use a different variable name for grade value from the request
    
        $grade = new Grade;
        $grade->grade = $gradeValue;
    
        $grade->save();
        return redirect()->back()->with('success', 'grade added successfully');
    }
    

  public function editGrade($id){

    $grade = Grade::where('id','=',$id)->first();
    return view('edit-grade',compact('grade'));
  }

  public function updateGrade(Request $request, $id)
{
    $newGradeValue = $request->grade; // Use a different variable name for grade value from the request

    Grade::where('id', '=', $id)->update([
        'grade' => $newGradeValue // Use the new variable name here
    ]);

    return redirect('dashboard')->with('success', 'grade updated successfully');
}


  public function deleteGrade($id){
    Grade::where('id','=',$id)->delete();
    return redirect('dashboard')->with('success','grade deleted succesfully');
  }

  public function showClasses(Grade $grade)
  {
      $classes = $grade->classes; 
  
      return view('classes.show', compact('grade', 'classes'));
  }





}
