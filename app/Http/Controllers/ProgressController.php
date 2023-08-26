<?php

namespace App\Http\Controllers;

use App\Models\Assignment;
use App\Models\Subject;
use App\Models\User;
use Illuminate\Http\Request;

class ProgressController extends Controller
{
    public function studentProgress($subject_id){
        $subject = Subject::findOrFail($subject_id);
    
        $students = User::where('role_id', 3)->get(); // 3 is the student role id
        $assignments = Assignment::where('subject_id', $subject_id)->get();
        
        return view('student-progress', compact('subject', 'students', 'assignments'));
    }
    
     
}
