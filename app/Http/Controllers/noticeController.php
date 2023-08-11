<?php

namespace App\Http\Controllers;

use App\Models\Notice;
use Illuminate\Http\Request;

class noticeController extends Controller
{
    
    public function Notice(){
        $notice=Notice::all();
        return view('management',compact('notice'));
    }

    public function AddNotice(){
        return view('add-notice');
        
    }

    public function saveNotice(Request $request)
    {
        $request->validate([

            'notice'=>'required',
        ]);
            
            $noticeValue = $request->notice;
    
    
            $notice = new Notice;
            $notice->notice = $noticeValue;
            $notice->upload_date = now();

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
        $newNotice = $request->notice; // Use the correct variable name for the notice value
        $notice = Notice::where('id','=',$id)->first();
        $notice->notice = $newNotice;
        $notice->save();

        return redirect('management')->with('success', 'notice updated successfully');
    }

    public function deleteNotice($id){
        Notice::where('id','=',$id)->delete();
        return redirect('management')->with('success','notice deleted succesfully');
    }
}
