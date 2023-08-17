<?php

namespace App\Http\Controllers;

use App\Models\Grade;
use App\Models\Notice;
use Illuminate\Http\Request;

class noticeController extends Controller
{
    
    public function Notice(){
        $notice=Notice::all();
        return view('management',compact('notice'));
    }

    public function AddNotice(){
        return view('add-notice',[
            'grades' => (new Grade())->all(),
          
        ]);
        
    }

    public function saveNotice(Request $request)
    {
        $request->validate([

            'notice'=>'required',
            'grade_id'=>'array|nullable',
        ]);
            
            $noticeValue = $request->notice;
            $gradeValue=$request->grade_id;
    
    
            $notice = new Notice;
            $notice->notice = $noticeValue;
            $notice->grade_id=$gradeValue;
            $notice->management_id = auth()->user()->id;
           
            $notice->date_of_notice = now();

            

            $notice->save();

            
    if (in_array('all', $gradeValue)) {
        // If 'All Grades' is selected, assign to all grades
        $grades = Grade::all();
        $notice->grades()->sync($grades);
    } else {
        // Assign to selected grades
        $grades = Grade::whereIn('id', $gradeValue)->get();
        $notice->grades()->sync($grades);
    }
            

    
            return redirect('management')->with('success', 'notice added successfully');
    }

    public function editNotice($id)
    {
        $notice=Notice::where('id','=',$id)->first();
        return view('edit-notice',compact('notice'));
    }

    public function updateNotice(Request $request, $id)
{
    $request->validate([
        'notice' => 'required',
        'grade_id' => 'array', // Validate it as an array
    ]);

    $newNotice = $request->notice;
    $newGradeValues = $request->grade_id;

    $notice = Notice::findOrFail($id); // Find the notice by ID

    $notice->update([
        'notice' => $newNotice,
        'management_id' => auth()->user()->id,
    ]);

    if (in_array('all', $newGradeValues)) {
        // If 'All Grades' is selected, assign to all grades
        $grades = Grade::all();
        $notice->grades()->sync($grades);
    } else {
        // Assign to selected grades
        $grades = Grade::whereIn('id', $newGradeValues)->get();
        $notice->grades()->sync($grades);
    }

    return redirect('management')->with('success', 'Notice updated successfully');
}


  

    public function deleteNotice($id){
        Notice::where('id','=',$id)->delete();
        return redirect('management')->with('success','notice deleted succesfully');
    }
}
