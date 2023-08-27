<?php

namespace App\Http\Controllers;

use App\Models\Assignment;
use App\Models\Subject;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class AssignmentController extends Controller
{
    public function Assignment(){
        $assignments = Assignment::all();
        $subjects= Subject::all();
        
        return view('assignment-list', compact('assignments','subjects'));
    }

    public function addAssignment($subject_id){
        $user = Auth::user(); // Get the logged-in user (teacher)
        $subjects = $user->subjects; // Retrieve the subjects associated with the teacher
        $subject = Subject::find($subject_id); // To send the material under the selected subject
        return view('add-assignment', compact('subjects', 'subject'));
    }

    public function saveAssignment(Request $request){
        try {
            $request->validate([
                'assignment_name' => 'required',
                'file' => 'required|file|mimes:ppt,pptx,doc,docx,pdf,xls,xlsx|max:204800', // Validating file type
                'description' => 'nullable',
                'due_date' => 'required|date|after:today',
                'subject_id' => 'required',
            ]);

            if ($request->hasFile('file')) {
                $filePath = $request->file('file')->store('assignments', 'public');// Storing the file under assignments folder in public folder
            } else {
                $filePath = null;
            }
          

            Assignment::create([
                'assignment_name' => $request->assignment_name,
                'file' => $filePath,
                'description' => $request->description,
                'due_date' => $request->due_date,
                'subject_id' => $request->subject_id,
                'teacher_id' => Auth::id(),
                'upload_date' => now(),
            ]);

            return redirect('assignment-list')->with('success', 'Assignment Added Successfully');
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Error adding assignment. check file type');
        }
    }

    public function editAssignment($id){
        $assignment = Assignment::find($id);
        $subjects = Subject::all();
        return view('edit-assignment', compact('assignment', 'subjects'));
    }

    public function updateAssignment(Request $request, $id){
        try {
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

            $assignment->update([
                'assignment_name' => $request->assignment_name,
                'description' => $request->description,
                'due_date' => $request->due_date,
            ]);

            return redirect()->back()->with('success', 'Assignment Updated Successfully');
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Error updating assignment');
        }
    }

    public function deleteAssignment($id){
        Assignment::findOrFail($id)->delete();
        return redirect()->back()->with('success', 'Assignment Deleted Successfully');
    }
}
