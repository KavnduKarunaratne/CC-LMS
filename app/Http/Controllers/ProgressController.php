<?php
namespace App\Http\Controllers;

use App\Models\Assignment;
use App\Models\Subject;
use App\Models\User;
use Illuminate\Http\Request;

class ProgressController extends Controller
{
    public function studentProgress($subject_id)
    {
        $subject = Subject::findOrFail($subject_id);

        $students = User::where('role_id', 3)->get(); // 3 is the student role id
        $assignments = Assignment::where('subject_id', $subject_id)->get();

        // Calculate Class Average
        $totalMarks = 0;
        foreach ($students as $student) {
            $totalMarks += $this->calculateTotalMarks($student, $subject, $assignments);
        }

        $classAverage = $totalMarks / $students->count();

        // Get Top 5 and Least 5 students
        $sortedStudents = $students->sortByDesc(function ($student) use ($subject, $assignments) {
            return $this->calculateTotalMarks($student, $subject, $assignments);
        });

        $top5Students = $sortedStudents->take(5);
        $least5Students = $sortedStudents->take(-5)->reverse(); // Take the last 5 and reverse the order

        return view('student-progress', compact('subject', 'students', 'assignments', 'classAverage', 'top5Students', 'least5Students'));
    }

    // Helper function to calculate total marks for a student
    private function calculateTotalMarks($student, $subject, $assignments)
    {
        $totalMarks = $student->submissions
            ->where('assignment.subject_id', $subject->id)
            ->flatMap(function ($submission) {
                return $submission->feedback->pluck('marks');
            })
            ->sum();

        return $totalMarks;
    }

    public function searchProgress(Request $request)
{
    $assignmentName = $request->input('search');

    // Find the assignment by name
    $Searchedassignment = Assignment::where('assignment_name', 'like', '%' . $assignmentName . '%')->first();

    if (!$Searchedassignment) {
        return redirect()->back()->with('error', 'Assignment not found.');
    }
    $subject = $Searchedassignment->subject;
    $students = User::where('role_id', 3)->get();
    $assignments = Assignment::where('subject_id', $subject->id)->get();

    // Calculate Class Average
    $totalMarks = 0;
    foreach ($students as $student) {
        $totalMarks += $this->calculateTotalMarks($student, $subject, $assignments);
    }

    $classAverage = $totalMarks / $students->count();

    // Get Top 5 and Least 5 students
    $sortedStudents = $students->sortByDesc(function ($student) use ($subject, $assignments) {
        return $this->calculateTotalMarks($student, $subject, $assignments);
    });

    $top5Students = $sortedStudents->take(5);
    $least5Students = $sortedStudents->take(-5)->reverse(); // Take the last 5 and reverse the order

    return view('search-progress', compact('subject', 'students', 'assignments', 'classAverage', 'top5Students', 'least5Students'));
}

}
