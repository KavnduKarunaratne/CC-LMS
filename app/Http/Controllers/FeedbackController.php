<?php

namespace App\Http\Controllers;

use App\Models\Feedback;
use App\Models\Submission;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class FeedbackController extends Controller
{
    public function feedback(){
        
        $feedback =Feedback::all();
            return view('feedback-list',compact('feedback'),[
                'submissions' => (new Submission())->all(),
            ]);
        
        
    }

    public function AddFeedback($submission_id){

        $submission = Submission::find($submission_id);
        return view('add-feedback',compact('submission'),[
            'submissions' => (new Submission())->all(),
        ]);
        
    }

    public function saveFeedback(Request $request){
      
        try{
      
        $request->validate([
            'feedback' => 'required',
            'marks' => 'required',
            'submission_id' => 'required',
        ]);
    
        $feedbackText = $request->feedback; // Use a different variable name
        $marks = $request->marks;
        $submission_id = $request->input('submission_id');

    
        $feedback = new Feedback;
        $feedback->feedback = $feedbackText;
        $feedback->date = now();
        $feedback->marks = $marks;
        $feedback->submission_id = $submission_id;
    
        $feedback->save();
    
        return redirect('feedback-list')->with('success', 'feedback added successfully');
    }
    catch(\Exception $e){
        return redirect()->back()->withInput()->withErrors(['error' => 'An error occurred while saving the feedback.']);
    }
}
    
    public function editFeedback($id)
    {
        $feedback=Feedback::find($id);
        $submission = Submission::find($feedback->submission_id); // Fetch the associated submission
        return view('edit-feedback', compact('feedback', 'submission'));

    }

    public function updateFeedback(Request $request, $id)
    {
        $request->validate([
            'feedback'=>'required',
            'date'=>'required',
            'marks'=>'required',
            'submission_id'=>'required',
        ]);


        $newFeedback = $request->feedback;
        $newMarks = $request->marks;
        $newDate = $request->date;
        $newSubmission_id = $request->submission_id;
        
      
        $feedback = Feedback::where('id','=',$id)->update([
            'feedback' => $newFeedback,
            'marks' => $newMarks,
            'date' => $newDate,
            'submission_id' => $newSubmission_id,
        ]);
     
        
        return redirect('view-submissions')->with('success', 'feedback updated successfully');
    }

    public function deleteFeedback($id){
        Feedback::where('id','=',$id)->delete();
        return redirect('view-submissions')->with('success','feedback deleted succesfully');
    }


 

}
