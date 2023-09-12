<?php

namespace App\Http\Controllers;

use App\Models\Assignment;
use App\Models\Submission;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class SubmissionController extends Controller
{
    public function index(){
        $submission = Submission::all();
        return view('submission-list', compact('submission'));
    }

    public function addSubmission($assignment_id){ //carry the assignment id to the add submission page
        $user = Auth::user();
        $assignment = Assignment::find($assignment_id);
        return view('add-submission', compact('assignment'));
    }

    public function saveSubmission(Request $request){
        try{
            $this->validateSubmission($request);

            $filePath = $request->file('file')->store('submissions', 'public');//files are stored in the submissions folder under the public folder
            $submission = new Submission;
            $submission->name = $request->name;
            $submission->description = $request->description;
            $submission->file = $filePath;
            $submission->submit_date = now();
            $submission->assignment_id = $request->assignment_id;
            $submission->student_id = Auth::id(); //get the id of the student that submitted
            $submission->save();

            return redirect()->back()->with('success', 'submission added successfully');
        } catch(\Exception $e){
            return redirect()->back()->with('error', 'Error adding submission');
        }
    }

    public function editSubmission($id){
        $submission = Submission::find($id);
        $assignment = Assignment::find($submission->assignment_id); // Fetch the associated assignment
        return view('edit-submission', compact('submission', 'assignment'));
    }

    public function updateSubmission(Request $request, $id){
        try{
            $this->validateSubmission($request);

            $submission = Submission::findOrFail($id);
            $submission->update([
                'name' => $request->name,
                'description' => $request->description,
                'file' => $request->file,
                'assignment_id' => $request->assignment_id,
            ]);

            return redirect()->back()->with('success', 'submission updated successfully');
        } catch(\Exception $e){
            return redirect()->back()->with('error', 'Error updating submission');
        }
    }

    public function deleteSubmission($id){
        Submission::where('id', $id)->delete();
        return redirect('submission-list')->with('success', 'submission deleted successfully');
    }

    public function viewSubmissions($assignment_id){ //get the submissions under each assignment
        $submissions = Submission::where('assignment_id', $assignment_id)->get();
        $assignment = Assignment::find($assignment_id);
        $subject = $assignment->subject; 

        return view('view-submissions', compact('submissions', 'assignment','subject'));
    }

    public function searchSubmissions(Request $request, $assignment_id){
        $assignment = Assignment::findOrFail($assignment_id);
        $searchTerm = $request->input('search');

        $submissions = Submission::where('assignment_id', $assignment_id)
            ->where(function ($query) use ($searchTerm) {
                $query->where('name', 'LIKE', "%$searchTerm%")
                    ->orWhere('description', 'LIKE', "%$searchTerm%");
            })
            ->get();

        return view('view-submissions', compact('assignment', 'submissions'));
    }

    public function viewMySubmissions(){
        $studentId = Auth::id(); // Get the logged-in user's ID
        $submissions = Submission::where('student_id', $studentId)->with('feedback')->get(); // Get the feedback for the submission through the student id

        $submissionsBySubject = [];
        // Make an array to store the submissions by subject
        foreach ($submissions as $submission) {
            $subjectName = $submission->assignment->subject->subject_name;

            if (!isset($submissionsBySubject[$subjectName])) {
                $submissionsBySubject[$subjectName] = [];
            }

            $submissionsBySubject[$subjectName][] = $submission;
        }

        return view('view-my-submissions', compact('submissionsBySubject'));
    }

    private function validateSubmission(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'description' => 'required',
            'file' => 'required|file|mimes:ppt,pptx,doc,docx,pdf,xls,xlsx|max:204800', //file size is 204800 kilobytes
            'assignment_id' => 'required',
        ]);
    }
}

