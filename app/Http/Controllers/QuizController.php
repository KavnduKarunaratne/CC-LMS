<?php

namespace App\Http\Controllers;

use App\Models\Classes;
use App\Models\Grade;
use App\Models\Option;
use App\Models\Question;
use App\Models\Quizzes;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class QuizController extends Controller
{
    public function Quiz()
    {
        $quizzes = Quizzes::all();
        return view('quiz-list',compact('quizzes'));
    }

    public function addQuiz(){
        $user = Auth::user();
         $classes = Classes::all();
         $grades=Grade::all();
        return view('add-quiz', compact('classes','grades'));
    }
    public function saveQuiz(Request $request)
    {
        $request->validate([
            'title' => 'required',
            'description' => 'required',
            'deadline' => 'required',
            'class_id' => 'required',
            'grade_id' => 'required',
        ]);

        $quiz = new Quizzes;
        $quiz->title = $request->title;
        $quiz->description = $request->description;
        $quiz->deadline = $request->deadline;
        $quiz->class_id = $request->class_id;
        $quiz->grade_id = $request->grade_id;
        $quiz->teacher_id = auth()->user()->id;
        $quiz->is_active = 1;
        $quiz->upload_date = now();
        $quiz->save();


        

        return redirect()->back()->with('success', 'Quiz Added Successfully');
      
        
    }

    public function editQuiz($id){
        $quiz=Quizzes::find($id);
        $classes = Classes::all();
        $grades=Grade::all();
        return view('edit-quiz',compact('quiz','classes','grades'));
    }

    public function updateQuiz(Request $request, $id)
    {
        $newTitle = $request->title;
        $newDescription = $request->description;
        $newDeadline = $request->deadline;
        $newClass = $request->class_id;
        $newGrade = $request->grade_id;

        $quiz = Quizzes::find($id);
        $quiz->title = $newTitle;
        $quiz->description = $newDescription;
        $quiz->deadline = $newDeadline;
        $quiz->class_id = $newClass;
        $quiz->grade_id = $newGrade;
        $quiz->save();

        return redirect()->back()->with('success', 'Quiz Updated Successfully');
    }

    public function deleteQuiz($id){
        Quizzes::where('id','=',$id)->delete();
        return redirect()->back()->with('success', 'Quiz Deleted Successfully');
    }

    public function showDetails($id)
    {
        $quiz = Quizzes::find($id);
      
        return view('quiz-details', compact('quiz'));
    }

    public function addQuestion($id)
    {
        $quiz = Quizzes::find($id); // Get the quiz ID from the query string
        return view('add-question', compact('quiz'));
        
    }
    public function saveQuestion(Request $request, $quiz_id ){
        $request->validate([
            'question' => 'required',
            'quiz_id' => 'required',
           
            
        ]);

        $question= new Question;
        $quiz_id = $request->input('quiz_id');

        $question->question = $request->question;
       
        $question->save();


        

        return redirect()->back()->with('success', 'question Added Successfully');
      
        

    }

}
