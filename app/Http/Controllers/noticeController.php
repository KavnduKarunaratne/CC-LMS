<?php

namespace App\Http\Controllers;

use App\Models\Grade;
use App\Models\Notice;
use Illuminate\Http\Request;

class noticeController extends Controller
{
    
    public function Notice(){
        $notice=Notice::all();
        return view('management,',compact('notice'));
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
            
           
           
    
    try{
            $notice = new Notice;
            $notice->notice = $request->notice;
            $notice->management_id = auth()->user()->id;//checks the logged in users id and sets the id automatically
            $notice->date_of_notice = now();

          
            $notice->save();

            
    
            return redirect('management')->with('success', 'notice added successfully');
    }catch(\Exception $e){
        return redirect()->back()->withInput()->withErrors(['error' => $e->getMessage()]);
    }
}

    public function editNotice($id)
    {
        $notice=Notice::find($id);
        return view('edit-notice',[
            'notice'=>$notice,
            'grades' => (new Grade())->all(),
        
        ]);
    }

    public function updateNotice(Request $request, $id)
{
 
    $request->validate([
        'notice' => 'required',
        'grade_id' => 'nullable', // Validate it as an array
    ]);

    $newNotice = $request->notice;
    $newGradeValues = $request->grade_id;

    Notice::where('id', $id)->update([
        'notice' => $newNotice,
        'grade_id' => $newGradeValues
    ]);

  
    return redirect('management')->with('success', 'Notice updated successfully');
}


  

    public function deleteNotice($id){
        Notice::where('id','=',$id)->delete();
        return redirect('management')->with('success','notice deleted succesfully');
    }
}
