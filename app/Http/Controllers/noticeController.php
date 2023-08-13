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
            'grade_id'=>'nullable',
        ]);
            
            $noticeValue = $request->notice;
            $gradeValue=$request->grade_id;
    
    
            $notice = new Notice;
            $notice->notice = $noticeValue;
            $notice->grade_id=$gradeValue;
           
            $notice->date_of_notice = now();

            $notice->save();
    
            return redirect('management')->with('success', 'notice added successfully');
    }

    public function editNotice($id)
    {
        $notice=Notice::where('id','=',$id)->first();
        return view('edit-notice',compact('notice'));
    }

    public function updateNotice(Request $request, $id)
    {
        $newNotice = $request->notice;
        $newGrade = $request->grade_id;

         // Use the correct variable name for the notice value
        $notice = Notice::where('id','=',$id)->update([

            'notice'=>$newNotice,
            'grade_id'=>$newGrade
        
        ]);
       
       

        return redirect('management')->with('success', 'notice updated successfully');
    }

    public function deleteNotice($id){
        Notice::where('id','=',$id)->delete();
        return redirect('management')->with('success','notice deleted succesfully');
    }
}
