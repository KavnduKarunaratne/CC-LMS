<?php

namespace App\Http\Controllers;

use App\Models\Assignment;
use App\Models\Submission;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class submissionController extends Controller
{
    public function index(){
        $submission=Submission::all();
        return view('submission-list',compact('submission'));
    }

    public function AddSubmission($assignment_id){
        $user = Auth::user();
        $assignment = Assignment::find($assignment_id);
        return view('add-submission',compact('assignment'));
        
    }

    public function saveSubmission(Request $request){
        try{
        $request->validate([

            'name'=>'required',
            'description'=>'required',
            'file' => 'required|file|mimes:ppt,pptx,doc,docx,pdf,xls,xlsx|max:204800',   
           
            
        ]);
            $filePath = $request->file('file')->store('submissions');
            $name=$request->name;
            $description=$request->description;
            
          
            $assignment_id = $request->input('assignment_id');

            $submission = new Submission;
            $submission->name=$name;
            $submission->description=$description;
            $submission->file=$filePath;
            $submission->submit_date=now();
            $submission->assignment_id=$assignment_id;
            $submission->student_id=Auth::id();


            $submission->save();
    
            return redirect()->back()->with('success', 'submission added successfully');
}catch(\Exception $e){
    return redirect()->back()->with('error', 'Error adding submission');
}


    }

    public function editSubmission($id)
{
    $submission = Submission::find($id);
    $assignment = Assignment::find($submission->assignment_id); // Fetch the associated assignment
    
    return view('edit-submission', compact('submission', 'assignment'));
}

    public function updateSubmission(Request $request,$id){

       try{
        $request->validate([
            'name'=>'required',
            'description'=>'required',
            'file' => 'required|file|mimes:ppt,pptx,doc,docx,pdf,xls,xlsx|max:204800',   
            'assignment_id'=>'required'
        ]);

        $newSubmissionName=$request->name;
        $newSubmissionDescription=$request->description;
        $newSubmissionFile=$request->file;
        
        $newSubmissionAssignmentId=$request->assignment_id;

        Submission::where('id','=',$id)->update([
            'name'=>$newSubmissionName,
            'description'=>$newSubmissionDescription,
            'file'=>$newSubmissionFile,
            
            'assignment_id'=>$newSubmissionAssignmentId
        ]);

        return redirect()->back()->with('success','submission updated succesfully');
    }catch(\Exception $e){
        return redirect()->back()->with('error','Error updating submission');
    }}
       public function deleteSubmission($id){
        Submission::where('id','=',$id)->delete();
        return redirect('submission-list')->with('success','submission deleted succesfully');
    }

    public function viewSubmissions($assignment_id)
{
    $submissions = Submission::where('assignment_id', $assignment_id)->get();
    $assignment = Assignment::find($assignment_id);
    
    return view('view-submissions', compact('submissions', 'assignment'));
}



public function searchSubmissions(Request $request, $assignment_id)
{
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

public function viewMySubmissions()
{
    $studentId = Auth::id();//get the logged in users ID
    $submissions = Submission::where('student_id', $studentId)->with('feedback')->get(); //get the feedback for the submission through the stdent id

    $submissionsBySubject = [];
      //make an array to store the submissions by subject
    foreach ($submissions as $submission) {
        $subjectName = $submission->assignment->subject->subject_name;

        if (!isset($submissionsBySubject[$subjectName])) {
            $submissionsBySubject[$subjectName] = [];
        }

        $submissionsBySubject[$subjectName][] = $submission;
    }
    
    return view('view-my-submissions', compact('submissionsBySubject'));
}





}
