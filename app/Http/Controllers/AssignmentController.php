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

    public function AddAssignment()
    {
        $user = Auth::user(); // Get the logged-in user (teacher)
        $subjects = $user->subjects; // Retrieve the subjects associated with the teacher

        return view('add-assignment', compact('subjects'));
    }

    public function saveAssignment(Request $request)
    {
        $request->validate([
            'assignment_name' => 'required',
            'file' => 'required',
            'description' => 'required',
            'due_date' => 'required|date',
            'subject_id' => 'required',
        ]);

        $filePath = $request->file('file')->store('assignments');

        $assignment = new Assignment;
        $assignment->assignment_name = $request->assignment_name;
        $assignment->file = $filePath;
        $assignment->description = $request->description;
        $assignment->due_date = $request->due_date;
        $assignment->subject_id = $request->subject_id;
        $assignment->teacher_id = Auth::id();
        $assignment->upload_date = now();
        $assignment->save();

        return redirect('assignment-list')->with('success', 'Assignment Added Successfully');
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
