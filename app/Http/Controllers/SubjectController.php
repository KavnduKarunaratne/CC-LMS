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
        return view('subject-list', compact('subject'));
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

        return view('edit-subject', compact('subject'), [
            'grade' => (new Grade())->all(),
            'classes' => (new Classes())->all(),
            'teachers' => $teachers,
        ]);
    }

    public function updateSubject(Request $request, $id){
        try{
            $request->validate([
                'subject_name' => 'required',
                'grade_id' => 'required',
                'class_id' => 'required',
                'teacher_id' => 'required',
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
            return redirect('dashboard')->with('success', 'subject updated successfully');
        } catch(\Exception $e){
            return redirect()->back()->with('error', 'Error updating subject');
        }
    }

    public function deleteSubject($id){
        Subject::where('id','=',$id)->delete();
        return redirect('dashboard')->with('success', 'subject deleted successfully');
    }

    public function showDynamicDetail($subject_id){
        // Retrieve the subject based on the subject_id parameter. this is a dynamic page. materials under that subject id is shown
        $subject = Subject::findOrFail($subject_id);
        $materials = $subject->materials;
        $assignments = $subject->assignments; 

        return view('subject-detail', compact('subject', 'materials', 'assignments'));
    }

    //using private helper functions to break the code down into smaller parts

}
