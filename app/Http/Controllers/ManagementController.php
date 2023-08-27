<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Rules\ValidSuNumber;
use Illuminate\Http\Request;

class ManagementController extends Controller
{
    public function index(){
        $management = User::where('role_id', 2)->get();
        return view('management-list', compact('management'));
    }

    public function addManagement(){
        return view('add-management');
    }

    public function saveManagement(Request $request){
        try{   
            $request->validate([
                'name' => 'required',
                'email' => 'required|email',
                'year_of_registration' => 'required',
                'admission_number' => ['required', new ValidSuNumber], //the validation rule for the SU number
            ]);

            $admission_number = $request->admission_number;
            
            //check if the user already exists
            $existingUser = User::where('admission_number', $admission_number)->first();
            if ($existingUser) {
                return redirect()->back()->with('error', 'User with this admission number already exists');
            }

            User::create([
                'name' => $request->name,
                'email' => $request->email,
                'role_id' => 2,//magament has a role id of 2
                'class_id' => null,
                'grade_id' => null,
                'year_of_registration' => $request->year_of_registration,
                'admission_number' => $admission_number,
            ]);
            return redirect()->back()->with('success', 'Management added successfully');
        } catch(\Exception $e){
            return redirect()->back()->withErrors(['admission_number' => 'The admission number is not valid'])->withInput();
        }  
    }

    public function editManagement($id){
        $management = User::findOrFail($id);
        return view('edit-management', compact('management'));
    }

    public function updateManagement(Request $request){
        try{
            $request->validate([
                'name' => 'required',
                'email' => 'required|email',
                'year_of_registration' => 'required',
                'admission_number' => ['required', new ValidSuNumber],
            ]);

            $id = $request->id;

             User::where('id', $id)->update([
            'name' => $request->name,
            'email' => $request->email,
            'year_of_registration' => $request->year_of_registration,
            'admission_number' => $request->admission_number,
            ]);

            return redirect('user-management')->with('success', 'student updated successfully');
        } catch(\Exception $e){
            return redirect()->back()->with('error', 'An error occurred');
        }
    }
    
    public function deleteManagement($id){
        User::where('id', '=', $id)->delete();
        return redirect('user-management')->with('success', 'Management deleted successfully');
    }
}
