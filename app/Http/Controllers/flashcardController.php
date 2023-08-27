<?php

namespace App\Http\Controllers;

use App\Models\Flashcard;
use App\Models\Subject;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class FlashcardController extends Controller
{
    public function Flashcard(){
        $flashcards = Flashcard::all();
        return view('flashcard-list', compact('flashcards'));
    }

    public function addFlashcard($subject_id){
        $subject = Subject::find($subject_id);
        return view('add-card', compact('subject'));
    }

    public function saveFlashcard(Request $request){
        try{
        $request->validate([
            'content' => 'required',
            'answer' => 'required',
            'subject_id' => 'required',
        ]);

        Flashcard::create([
            'content' => $request->content,
            'answer' => $request->answer,
            'subject_id' => $request->subject_id,
            'teacher_id' => Auth::id(),
            'upload_date' => now(),
        ]);

            return redirect()->back()->with('success', 'Flashcard added successfully');
        } catch(\Exception $e){
            return redirect()->back()->with('error', 'Error adding Flashcard');
        }
    }

    public function editFlashcard($id){
        $flashcard = Flashcard::findOrFail($id);
        $subject = Subject::find($flashcard->subject_id);
        return view('edit-Card', compact('flashcard'));
    }

    public function updateFlashcard(Request $request, $id){
        try{
            $request->validate([
                'content' => 'required',
                'answer' => 'required',
            ]);

            $flashcard =Flashcard::findOrFail($id);

            $flashcard->update([
                'content' => $request->content,
                'answer' => $request->answer,
            ]);
            $flashcard->save();

            return redirect()->back()->with('success', 'Flashcard updated successfully');
        } catch(\Exception $e){
            return redirect()->back()->with('error', 'Error updating Flashcard');
        }
    }

    public function deleteFlashcard($id){
        Flashcard::where('id', '=', $id)->delete();
        return redirect()->back()->with('success', 'Flashcard deleted successfully');
    }

    public function showFlashcards($subject_id){  //check the subject ID and flashcards with the associated
        $subject = Subject::findOrFail($subject_id);//subject ID is displayed
        $flashcards = Flashcard::where('subject_id', $subject_id)->get();

        return view('flashcards', compact('subject', 'flashcards'));
    }
}
