<?php

namespace App\Http\Controllers;

use App\Models\Assignment;
use App\Models\Subject;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class AssignmentController extends Controller
{
    public function Assignment()
    {
        $assignments = Assignment::all();
        return view('assignment-list', compact('assignments'),[
            'assignments' => (new Assignment())->all(),
            'subjects' => (new Subject())->all(),
        
        ]);
    }

    public function AddAssignment($subject_id)
    {
        $user = Auth::user(); // Get the logged-in user (teacher)
        $subjects = $user->subjects; // Retrieve the subjects associated with the teacher
        $subject = Subject::find($subject_id);//to send the material under the selected subject
        return view('add-assignment', compact('subjects','subject'));
    }

    public function saveAssignment(Request $request)
    {
    try{
        $request->validate([
            'assignment_name' => 'required',
            'file' => 'required|file|mimes:ppt,pptx,doc,docx,pdf,xls,xlsx|max:204800', //validating file type
            'description' => 'nullable',
            'due_date' => 'required|date|after:today',
            'subject_id' => 'required',
        ]);

         $filePath = $request->file('file')->store('assignments', 'public');//storing files under the folder assignments
         $subject_id = $request->input('subject_id'); 

        $assignment = new Assignment;
        $assignment->assignment_name = $request->assignment_name;
        $assignment->file = $filePath;
        $assignment->description = $request->description;
        $assignment->due_date = $request->due_date;
        $assignment->subject_id = $subject_id;
        $assignment->teacher_id = Auth::id();
        $assignment->upload_date = now();
        $assignment->save();

        return redirect('assignment-list')->with('success', 'Assignment Added Successfully');
      }catch(\Exception $e){
        return redirect()->back()->with('error', 'Error adding assignment');
      }

    }

    public function editAssignment($id)
    {
        $assignment = Assignment::find($id);
        return view('edit-assignment', compact('assignment'), [
            'subjects' => (new Subject())->all(),
        ]);
    }

    public function updateAssignment(Request $request, $id)
    {
       try{
       
        $request->validate([
            'assignment_name' => 'nullable',
            'description' => 'nullable',
            'due_date' => 'required|date|after:today',
            'file' => 'nullable|file|mimes:ppt,pptx,doc,docx,pdf,xls,xlsx|max:204800',
        ]);
    
        $assignment = Assignment::findOrFail($id);
    
        if ($request->hasFile('file')) {
            // Delete old file
            Storage::delete($assignment->file);
            // Store new file
            $filePath = $request->file('file')->store('assignments', 'public');
            $assignment->file = $filePath;
        }
    
        $assignment->assignment_name = $request->assignment_name;
        $assignment->description = $request->description;
        $assignment->due_date = $request->due_date;
        $assignment->save();
    
        return redirect()->back()->with('success', 'Assignment Updated Successfully');
    }catch(\Exception $e){
        return redirect()->back()->with('error', 'Error updating assignment');
    }
    }
    


    public function deleteAssignment($id)
    {
        Assignment::findOrFail($id)->delete();
        return redirect()->back()->with('success', 'Assignment Deleted Successfully');
    }

   

}
