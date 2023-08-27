<?php

namespace App\Http\Controllers;

use App\Models\Grade;
use App\Models\Notice;
use Illuminate\Http\Request;

class NoticeController extends Controller
{
    public function Notice(){
        $notice = Notice::all();
        return view('management', compact('notice'));
    }

    public function addNotice(){
        $grades=Grade::all();
        return view('add-notice',compact('grades'));
    }

    public function saveNotice(Request $request){
        try{
            $request->validate([
                'notice' => 'required',
                'grade_id' => 'nullable',
            ]);

            $this->createNotice($request);

            return redirect('management')->with('success', 'notice added successfully');
        } catch(\Exception $e){
            return redirect()->back()->with('error', 'Error adding notice');
        }
    }

    public function editNotice($id){
        $notice = Notice::find($id);
        $grades = Grade::all();
        return view('edit-notice', compact('notice', 'grades'));
    }

    public function updateNotice(Request $request, $id){
        try{
            $request->validate([
                'notice' => 'required',
                'grade_id' => 'nullable', // Validate it as an array
            ]);

            $this->updateTheNotice($request, $id);

            return redirect('management')->with('success', 'Notice updated successfully');
        } catch(\Exception $e){
            return redirect()->back()->with('error', 'Error updating notice');
        }
    }

    public function deleteNotice($id){
        Notice::where('id', '=', $id)->delete();
        return redirect('management')->with('success', 'notice deleted successfully');
    }
    //using private helper methods 
    private function createNotice(Request $request)
    {
        $notice = new Notice;
        $notice->notice = $request->notice;
        $notice->management_id = auth()->user()->id;
        $notice->date_of_notice = now(); //the current date and time is automatically added
        $notice->grade_id = $request->grade_id;
        $notice->save();
    }

    private function updateTheNotice(Request $request, $id)
    {
        $newNotice = $request->notice;
        $newGradeValues = $request->grade_id;

        Notice::where('id', $id)->update([
            'notice' => $newNotice,
            'grade_id' => $newGradeValues,
        ]);
    }

}
