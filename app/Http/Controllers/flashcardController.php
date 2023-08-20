<?php

namespace App\Http\Controllers;

use App\Models\Flashcard;
use App\Models\Subject;
use Illuminate\Http\Request;

class flashcardController extends Controller
{
    public function Flashcard()
    {
        $flashcards=Flashcard::all();
        return view('flashcard-list',compact('flashcards'));
    }

    public function addFlashcard($subject_id){
        $subject=Subject::find($subject_id);
        return view('add-card',compact('subject'));
    }

    public function saveFlashcard(Request $request){
        $request->validate([
            'content'=> 'required',
            'answer'=>'required',
            'subject_id'=>'required',

           
        ]);

        $content=$request->content;
        $answer=$request->answer;
        $subject_id=$request->input('subject_id');
       
        try{
            $flashcard = new Flashcard;
            $flashcard->content=$content;
            $flashcard->answer=$answer;
            $flashcard->subject_id=$subject_id;
            $flashcard->teacher_id=auth()->user()->id;
            $flashcard->upload_date=now();
            $flashcard->save();
            return redirect()->back()->with('success','Flashcard added successfully');
        }catch(\Exception $e){
            return redirect()->back()->with('error',$e->getMessage());
        }
    

    }

    public function editFlashcard($id){

        $flashcard=Flashcard::find($id);
        $subject=Subject::find($flashcard->subject_id);// fetch the related subject
        return view('edit-Card',[
            'flashcard'=>$flashcard,
        ]);


    }
    public function updateFlashcard(Request $request,$id){
        $request->validate([
            'content'=> 'required',
            'answer'=>'required',
           
           
        ]);

        $newContent = $request->content;
        $newAnswer = $request->answer;
     
       
        Flashcard::where('id','=',$id)->update([
            'content'=>$newContent,
            'answer'=>$newAnswer,
          
        
        ]);



    return redirect('flashcard-list')->back()->with('success', 'Flashcard updated successfully');
    
    }
    public function deleteFlashcard($id){
        Flashcard::where('id','=',$id)->delete();
        return redirect()->back()->with('success','Flashcard deleted successfully');

    }

    public function showFlashcards($subject_id)
{
    $subject = Subject::findOrFail($subject_id);
    $flashcards = Flashcard::where('subject_id', $subject_id)->get();

    return view('flashcards', compact('subject', 'flashcards'));
}




}