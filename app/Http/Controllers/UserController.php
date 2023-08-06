<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Role;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{

    public function Role(){
        $role = Role::all();
        return view('register-user',compact('role'));
    }

    public function User(){
        $user = User::all();
        return view('user-management',compact('user'));
    }

    public function AddUser(){
        return view('register-user', [
            'roles' => (new Role())->all()
        ]);
    }

    public function  SaveUser(Request $request){

        $request->validate([
            'name'=> 'required',
            'email'=>'required|email',
            'role_id'=>'required',
            'admission_number'=>'required',
            'year_of_registration'=>'required',

            'password'=>'required|min:5|max:12',

        ]);

        $name=$request->name;
        $email=$request->email;
        $role_id=$request->role_id;
        $admission_number=$request->admission_number;
        $year_of_registration=$request->year_of_registration;
        $password=$request->password;


        $user = new User;
        $user->name=$name;
        $user->email=$email;
        $user->role_id=$role_id;
        $user->admission_number=$admission_number;
        $user->year_of_registration=$year_of_registration;
        $user->password=$password;

        $user->save();
        return redirect()->back()->with('success','user added succesfully');


    }

    public function editUser($id){
        $user = User::where('id','=',$id)->first();
        return view('edit-user',compact('user'));

    }
    public function updateUser(Request $request, $id){
        $newName = $request->input('name');
    $newEmail = $request->input('email');
    $newAdmissionNumber = $request->input('admission_number');
    $newYearOfRegistration = $request->input('year_of_registration');
   

    User::where('id', '=', $id)->update([
        'name' => $newName,
        'email' => $newEmail,
        'admission_number' => $newAdmissionNumber,
        'year_of_registration' => $newYearOfRegistration,
        
    ]);


        return redirect('user-management')->with('success','user updated succesfully');
    }
    public function deleteUser($id){
        User::where('id','=',$id)->delete();
        return redirect('user-management')->with('success','user deleted succesfully');

    }




    public function index()
    {

    $role_id=Auth::user()->role_id;



    if($role_id==0){
        return view('dashboard');
    }
    else if($role_id==1){
        return view('management');
    }
    else if($role_id==2){
        return view('student-panel');
    }
    else{
        return view('teacher-panel');
    }


    }

    public function logout(Request $request)
    {
        Auth::logout();

        return view('/welcome');
    }



}
