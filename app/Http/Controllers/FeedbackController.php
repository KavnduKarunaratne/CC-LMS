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

    public function addFeedback($submission_id){
        $submission = Submission::find($submission_id);
        return view('add-feedback', compact('submission'));
    }

    public function saveFeedback(Request $request){
        try{
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

            return redirect('feedback-list')->with('success', 'feedback added successfully');
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
            $request->validate([
                'feedback' => 'required',
                'marks' => 'required|integer|min:0|max:100',
            ]);

            $feedback = Feedback::findOrFail($id);
            $feedback->update([
                'feedback' => $request->feedback,
                'marks' => $request->marks,
            ]);

            return redirect('teacher-panel')->with('success', 'feedback updated successfully');
        } catch(\Exception $e){
            return redirect()->back()->with('error', 'Error adding feedback');
        }
    }

    public function deleteFeedback($id){
        Feedback::findOrFail($id)->delete();
        return redirect('view-submissions')->with('success', 'feedback deleted successfully');
    }
}
