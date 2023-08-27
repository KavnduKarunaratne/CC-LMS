<?php

namespace App\Http\Controllers;

use App\Models\Grade;
use Illuminate\Http\Request;

class GradeController extends Controller
{
    public function Grade(){
        $grade = Grade::all();
        return view('dashboard', compact('grade'));
    }

    public function addGrade(){
        return view('add-grade');
    }

    public function saveGrade(Request $request){
        try{
            $request->validate([
                'grade' => 'required|integer|min:0|max:14'
            ]);

            Grade::create([
                'grade' => $request->grade,
            ]);

            return redirect()->back()->with('success', 'grade added successfully');
        } catch(\Exception $e){
            return redirect()->back()->with('error', 'Error adding grade');
        }
    }

    public function editGrade($id){
        $grade = Grade::findOrfail($id);
        return view('edit-grade', compact('grade'));
    }

    public function updateGrade(Request $request, $id){
        try{
            $request->validate([
                'grade' => 'required|integer|min:0|max:14'
            ]);
           

            Grade::where('id', '=', $id)->update([
                'grade' => $request->grade 
            ]);

            return redirect('dashboard')->with('success', 'grade updated successfully');
        } catch(\Exception $e){
            return redirect()->back()->with('error', 'Error updating grade');
        }
    }

    public function deleteGrade($id){
        Grade::where('id', '=', $id)->delete();
        return redirect('dashboard')->with('success', 'grade deleted successfully');
    }

    public function showClasses(Grade $grade){
        $classes = $grade->classes; 
        return view('classes.show', compact('grade', 'classes'));
    }
}
