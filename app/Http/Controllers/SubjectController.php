<?php

namespace App\Http\Controllers;
use App\Models\Classes;
use App\Models\Grade;
use App\Models\Material;
use App\Models\Student;
use App\Models\Subject;

use App\Models\Teacher;
use App\Models\User;
use Illuminate\Http\Request;

class SubjectController extends Controller
{
    public function Subjects(){
        $subject=Subject::all();
        return view('subject-list',compact('subject'));
    }

  public function Teacher(){
     $teacher=Teacher::all();
        return view('add-subject',compact('teacher'));


  }

    public function AddSubject(){
        $teachers = User::where('role_id', 4)->get();
    
        return view('add-subject', [
            'grades' => (new Grade())->all(),
            'classes' => (new Classes())->all(),
            
            'teachers' => $teachers,
        ]);
    }
 
    
  

    public function saveSubject(Request $request){
        try{
        $request->validate([
            'subject_name'=> 'required',
            'grade_id'=>'required',
            'class_id'=>'required',
            'teacher_id'=>'required',
        ]);

        $subject_name=$request->subject_name;
        $grade_id=$request->grade_id;
        $class_id=$request->class_id;
       $teacher_id=$request->teacher_id;

       
        $subject = new Subject;
        $subject->subject_name=$subject_name;
        $subject->grade_id=$grade_id;
        $subject->class_id=$class_id;
       $subject->teacher_id=$teacher_id;

        $subject->save();
        return redirect()->back()->with('success','subject added succesfully');
       }catch(\Exception $e){
        return redirect()->back()->with('error', 'subject already exists');
       }
    }

    public function editSubject($id){

        $teachers = User::where('role_id', 4)->get();
            
            $subject = Subject::where('id','=',$id)->first();
            return view
            ('edit-subject',compact('subject'), [
                'grade' => (new Grade())->all(),
                'classes' => (new Classes())->all(),
                'teachers' => $teachers,


              
            ]);
        
        }

    
     public function updateSubject(Request $request, $id)
    {
          try{
             $request->validate([
                'subject_name'=> 'required',
                'grade_id'=>'required',
                'class_id'=>'required',
                'teacher_id'=>'required']);



            $newSubjectNameValue = $request->subject_name;
            $newSubjectGradeValue = $request->grade_id;
            $newSubjectClassValue = $request->class_id;
            $newTeacherValue = $request->teacher_id;




    
            Subject::where('id', '=', $id)->update([
                'subject_name' => $newSubjectNameValue,
                'grade_id' => $newSubjectGradeValue,
                'class_id' => $newSubjectClassValue,
               'teacher_id' => $newTeacherValue,
            ]);
    
            return redirect('dashboard')->with('success', 'subject updated successfully');
        }catch(\Exception $e){
          return redirect()->back()->with('error', 'Error updating subject');
        }
    }
    

    public function deleteSubject($id){
        Subject::where('id','=',$id)->delete();
        return redirect('dashboard')->with('success','subject deleted succesfully');
    }

    public function showDynamicDetail($subject_id)
    {
      // Retrieve the subject based on the subject_id parameter. this is a dynamic page. materials under that subject id is shown
      $subject = Subject::findOrFail($subject_id);
      $materials = $subject->materials;
      $assignments = $subject->assignments; 

      return view('subject-detail', compact('subject','materials','assignments'));
    }
}
