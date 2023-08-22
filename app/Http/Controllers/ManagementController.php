<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Rules\ValidSuNumber;
use Illuminate\Http\Request;

class ManagementController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $management=User::where('role_id',2)->get();
        return view('management-list',compact('management'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function AddManagement()
    {
        return view('add-management');

    }

    /**
     * Store a newly created resource in storage.
     */
    public function saveManagement(Request $request)
    {
        try{   
        $request->validate([
            'name'=> 'required',
            'email'=>'required|email',
            'year_of_registration'=>'required',
            'admission_number' => ['required',new ValidSuNumber],
    
        ]);

        $name=$request->name;
        $email=$request->email;
        $year_of_registration=$request->year_of_registration;
        $admission_number=$request->admission_number;
     

      $existingUser = User::where('admission_number', $admission_number)->first();
    if ($existingUser) {
        return redirect()->back()->with('error', 'User with this admission number already exists');
    }



        $management = new User;
        $management ->name=$name;
        $management ->email=$email;
        $management ->role_id=2;
        $management->class_id=null;
        $management->grade_id=null;
        $management ->year_of_registration=$year_of_registration;
        $management ->admission_number=$admission_number;
      
        $management ->save();
        return redirect()->back()->with('success','student added succesfully');
}catch(\Exception $e){
    return redirect()->back()->with('error','An error occured');
}  


    }

   

    /**
     * Show the form for editing the specified resource.
     */
    public function editManagement($id)
    {
        $management = User::where('id','=',$id)->first();
        return view('edit-management',compact('management'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function updateManagement(Request $request)
    {
     try{
  
            $request->validate([
            'name'=> 'required',
            'email'=>'required|email',
            'year_of_registration'=>'required',
            'admission_number' => ['required',new ValidSuNumber],
    
        ]);


        $id=$request->id;
        $newManagementName=$request->name;
        $newManagementEmail=$request->email;
        $newManagementYear_of_registration=$request->year_of_registration;
        $newManagementAdmission_number=$request->admission_number;


       User::where('id','=',$id)->update([
              'name'=>$newManagementName,
              'email'=>$newManagementEmail,
              'year_of_registration'=>$newManagementYear_of_registration,
              'admission_number'=>$newManagementAdmission_number,
         ]);
            return redirect('user-management')->with('success','student updated succesfully');

        
       
    }catch(\Exception $e){
        return redirect()->back()->with('error','An error occured');
    }
    }


    /**
     * Remove the specified resource from storage.
     */
    public function deleteManagement($id)
    {
        User::where('id','=',$id)->delete();
        return redirect('user-management')->with('success','student deleted succesfully');
    }
}
