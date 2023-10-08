<?php

namespace App\Http\Controllers;

use App\Models\Feedback;
use App\Models\Submission;
use Illuminate\Http\Request;


class FeedbackController extends Controller
{
    public function feedback(){
        $feedback = Feedback::all();
        $submissions = Submission::all();
        return view('feedback-list', compact('feedback','submissions'));
    }

    public function addFeedback($submission_id){  //send the submission id to the add feedback page
        $submission = Submission::find($submission_id);//so that the feedback is stored under the submission id
        return view('add-feedback', compact('submission'));
    }

    public function saveFeedback(Request $request){
        try{//get the submission id and save the feedback under the submission id
            $request->validate([
                'feedback' => 'required',
                'marks' => 'required|integer|min:0|max:100',
                'submission_id' => 'required',
            ]);

            Feedback::create([
                'feedback' => $request->feedback,
                'date' => now(),
                'marks' => $request->marks,
                'submission_id' => $request->submission_id,
            ]);

            return redirect()->back()->with('success', 'feedback added successfully');
        } catch(\Exception $e){
            return redirect()->back()->with('error', 'Error adding feedback');
        }
    }
    
    public function editFeedback($id){
        $feedback = Feedback::findOrFail($id);
        $submission = Submission::find($feedback->submission_id);
        return view('edit-feedback', compact('feedback', 'submission'));
    }

    public function updateFeedback(Request $request, $id){
        try{
            $request->validate([  //validations for feedback and grades
                'feedback' => 'required',
                'marks' => 'required|integer|min:0|max:100',
            ]);

            $feedback = Feedback::findOrFail($id);
            $feedback->update([
                'feedback' => $request->feedback,
                'marks' => $request->marks,
            ]);

            return redirect()->back()->with('success', 'feedback updated successfully');
        } catch(\Exception $e){
            return redirect()->back()->with('error', 'Error adding feedback');
        }
    }

    public function deleteFeedback($id){
        Feedback::findOrFail($id)->delete();

        return redirect()->back()->with('success', 'feedback deleted successfully');
    }
}
