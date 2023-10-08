<?php

namespace App\Http\Controllers;

use App\Models\Classes;
use App\Models\Grade;
use App\Models\Subject;
use App\Models\Teacher;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Storage;

class SubjectController extends Controller
{
    public function Subjects(){
        $subject = Subject::all();
        $classes = Classes::all();
        $grades = Grade::all();
        $teachers = User::where('role_id', 4)->get();

        return view('subject-list', compact('subject','classes','grades','teachers'));
    }

    public function Teacher(){
        $teacher = Teacher::all();
        return view('add-subject', compact('teacher'));
    }

    public function addSubject(){
        $teachers = User::where('role_id', 4)->get();
        $grades = Grade::all();
        $classes = Classes::all();

        return view('add-subject',compact('grades','classes') ,[
            'teachers' => $teachers,
        ]);
    }

    public function saveSubject(Request $request){
        try{
            $request->validate([
                'subject_name' => 'required',
                'grade_id' => 'required',
                'class_id' => 'required',
                'teacher_id' => 'required',
                'image' => 'nullable |file|mimes:jpeg,png,jpg',
            ]);
        
            // Upload the image

           $imagePath = $request->hasFile('image') ? $request->file('image')->store('subject_images', 'public') : null;
        
            // Save the subject with the image path
            $subject = new Subject;
            $subject->subject_name = $request->subject_name;
            $subject->grade_id = $request->grade_id;
            $subject->class_id = $request->class_id;
            $subject->teacher_id = $request->teacher_id;
            $subject->image = $imagePath;
            $subject->save();

            return redirect()->back()->with('success', 'subject added successfully');
        } catch(\Exception $e){
            Log::error($e->getMessage());
            return redirect()->back()->with('error', 'Error saving subject');
        }
    }

    public function editSubject($id){
        $teachers = User::where('role_id', 4)->get();    
        $subject = Subject::findOrFail($id);
        $grades=Grade::all();
        $classes=Classes::all();

        return view('edit-subject', compact('subject','grades','classes'), [
            'grade' => (new Grade())->all(),
            'classes' => (new Classes())->all(),
            'teachers' => $teachers,

        ]);
    }

    public function updateSubject(Request $request, $id){
        try{
            $request->validate([
                'subject_name' => 'nullable',
                'grade_id' => 'nullable',
                'class_id' => 'nullable',
                'teacher_id' => 'nullable',
                'image' => 'nullable|file|mimes:jpeg,png,jpg',
            ]);
        
            // Retrieve the subject
            $subject = Subject::findOrFail($id);
        
            // Check if a new image is provided
            if ($request->hasFile('image')) {
                // Delete the old image
                Storage::disk('public')->delete($subject->image);
        
                // Store the new image
                $imagePath = $request->hasFile('image') ? $request->file('image')->store('subject_images', 'public') : null;
        
            } else {
                // Keep the existing image
                $imagePath = $subject->image;
            }
        
            // Update the subject
            $subject->update([
                'subject_name' => $request->subject_name,
                'grade_id' => $request->grade_id,
                'class_id' => $request->class_id,
                'teacher_id' => $request->teacher_id,
                'image' => $imagePath,
            ]);
            return redirect()->back()->with('success', 'subject updated successfully');
        } catch(\Exception $e){
            return redirect()->back()->with('error', 'Error updating subject');
        }
    }

   

    public function deleteSubject($id){
        Subject::where('id','=',$id)->delete();
        return redirect()->back()->with('success', 'subject deleted successfully');
    }

    public function showDynamicDetail($subject_id){
        // Retrieve the subject based on the subject_id parameter. this is a dynamic page. materials under that subject id is shown
        $subject = Subject::findOrFail($subject_id);
        $materials = $subject->materials;
        $assignments = $subject->assignments; 

        return view('subject-detail', compact('subject', 'materials', 'assignments'));
    }

   public function filterSubjects (Request $request){
    
    $classId=$request->class_id;
    $gradeId=$request->grade_id;
    $teacherId=$request->teacher_id;
   
    $classes=Classes::all();
    $grades=Grade::all();
    $teachers=User::where('role_id', 4)->get();
 


    $filteredSubjects = Subject::where(function ($query) use ($classId, $gradeId,$teacherId) {
        if ($classId) {
            $query->where('class_id', $classId);
        }
        if ($gradeId) {
            $query->where('grade_id', $gradeId);
        }
        if ($teacherId) {
            $query->where('teacher_id', $teacherId);
        }
   
    })
    ->get();

    return view('filtered-subjects', compact('filteredSubjects', 'classes', 'grades', 'teachers'));

   }

   public function getClassesForSubject($gradeId){
    $classes = Classes::where('grade_id', $gradeId)->get();
    return response()->json($classes);

    
   }

   

}
