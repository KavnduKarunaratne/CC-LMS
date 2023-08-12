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

    public function AddSubmission(){
        $user = Auth::user();
        return view('add-submission',[
            'assignments' => (new Assignment())->all(),
            'students' => (new User())->all(),
        
        ]);
        
    }

    public function saveSubmission(Request $request){
        $request->validate([

            'name'=>'required',
            'description'=>'required',
            'file'=>'required',
           
            'assignment_id'=>'required'
            
        ]);
            $name=$request->name;
            $description=$request->description;
            $file=$request->file;
          
            $assignment_id=$request->assignment_id;

            $submission = new Submission;
            $submission->name=$name;
            $submission->description=$description;
            $submission->file=$file;
            $submission->submit_date=now();
            $submission->assignment_id=$assignment_id;
            $submission->student_id=Auth::id();


            $submission->save();
    
            return redirect('submission-list')->with('success', 'submission added successfully');


    }

    public function editSubmission($id)
    {
        $submission=Submission::find($id);
        return view('edit-submission',compact('submission'));
    }

    public function updateMaterial(Request $request,$id){
        $newSubmissionName=$request->name;
        $newSubmissionDescription=$request->description;
        $newSubmissionFile=$request->file;
        $newSubmissionSubmitDate=$request->submit_date;
        $newSubmissionAssignmentId=$request->assignment_id;

        Submission::where('id','=',$id)->update([
            'name'=>$newSubmissionName,
            'description'=>$newSubmissionDescription,
            'file'=>$newSubmissionFile,
            'submit_date'=>$newSubmissionSubmitDate,
            'assignment_id'=>$newSubmissionAssignmentId
        ]);

        return redirect()->back()->with('success','submission updated succesfully');
    }
    public function deleteSubmission($id){
        Submission::where('id','=',$id)->delete();
        return redirect('submission-list')->with('success','submission deleted succesfully');
    }

}
