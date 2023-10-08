<?php

namespace App\Http\Controllers;

use App\Models\Classes;
use App\Models\Grade;
use App\Models\Notice;
use Illuminate\Http\Request;

class NoticeController extends Controller
{
    public function Notice(Request $request){
        $notice = Notice::all();
    
        $gradeId=$request->grade_id;
        $date=$request->date;
        $grades=Grade::all();
      
        $filteredNotices = Notice::where(function ($query) use ( $gradeId, $date) {
          
            if ($gradeId) {
                $query->where('grade_id', $gradeId);
            }
            if ($date) {
                $query->whereDate('date_of_notice', $date);
            }
       
        })
        ->get();
        return view('management', compact('notice','grades','filteredNotices','gradeId','date'));
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
