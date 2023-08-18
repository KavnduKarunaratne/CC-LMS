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
        $request->validate([
            'assignment_name' => 'required',
            'file' => 'required|mimes:doc,pdf,docx,xls,xlsx,zip,ppt,pptx',
            'description' => 'nullable',
            'due_date' => 'required|date',
            'subject_id' => 'required',
        ]);

        $filePath = $request->file('file')->store('assignments');
         $subject_id = $request->input('subject_id'); 
try{
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
        return redirect()->back()->withInput()->withErrors(['error' => 'An error occurred while saving the assignment.']);
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
       
        $request->validate([
            'assignment_name' => 'required',
            'description' => 'required',
            'due_date' => 'required|date',
            'subject_id' => 'required',
            'file' => 'required|mimes:doc,pdf,docx,xls,xlsx,zip,ppt,pptx',
        ]);

        $assignment = Assignment::findOrFail($id);

        if ($request->hasFile('file')) {
            // Delete old file
            Storage::delete($assignment->file);
            // Store new file
            $filePath = $request->file('file')->store('assignments');
            $assignment->file = $filePath;
        }

        $assignment->assignment_name = $request->assignment_name;
        $assignment->description = $request->description;
        $assignment->due_date = $request->due_date;
        $assignment->subject_id = $request->subject_id;
        $assignment->save();

        return redirect()->back()->with('success', 'Assignment Updated Successfully');
   
    }


    public function deleteAssignment($id)
    {
        Assignment::findOrFail($id)->delete();
        return redirect()->route('assignments.index')->with('success', 'Assignment Deleted Successfully');
    }
}
