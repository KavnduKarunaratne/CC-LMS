<?php

namespace App\Http\Controllers;

use App\Models\Classes;
use App\Models\Grade;
use App\Models\Notice;
use App\Models\Subject;
use Illuminate\Http\Request;
use App\Models\Role;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use App\Rules\ValidSuNumber;

class UserController extends Controller
{

    public function User(){  
        $user = User::where('is_archived', 0)->get();
        $classes = Classes::all();
        $grades = Grade::all();
        
        $archivedUsers = User::where('is_archived', true)->get();

        return view('user-management', compact('user', 'archivedUsers','classes','grades'));
    }

    public function addUser(){
        $roles=Role::all();
        return view('register',compact('roles'));
    }

    public function saveUser(Request $request){
        try {
            $request->validate([
                'name'=> 'required',
                'email'=>'required|email',
                'year_of_registration'=>'required',
                'password'=>'required|min:5|max:12',
                'admission_number' => ['required', new ValidSuNumber],
            ]);

            $name=$request->name;
            $email=$request->email;
            $admission_number=$request->admission_number;
            $year_of_registration=$request->year_of_registration;
            $password=$request->password;
            //check if the user already exists
            $existingUser = User::where('admission_number', $admission_number)->first();
            if ($existingUser) {
                return redirect()->back()->with('error', 'User with this admission number already exists');
            }

            $user = new User;
            $user->is_archived = 0;
            $user->name = $name;
            $user->email = $email;
            $user->role_id = 2;
            $user->admission_number = $admission_number;
            $user->year_of_registration = $year_of_registration;
            $user->password = $password;

            $user->save();
            return redirect()->back()->with('success', 'user added successfully');
        } catch (\Exception $e) {
            return redirect()->back()->withErrors(['admission_number' => 'The admission number is not valid'])->withInput();
        }
    }

    public function editUser($id){
        $user = User::findOrFail($id);
        return view('edit-user', compact('user'));
    }

    public function updateUser(Request $request, $id){
        try {
            $request->validate([
                'name'=> 'required',
                'email'=>'required|email',
                'year_of_registration'=>'required',
                'admission_number' => ['required', new ValidSuNumber],//validate the SU number
            ]);

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

            return redirect('user-management')->with('success', 'user updated successfully');
        } catch(\Exception $e) {
            return redirect()->back()->withErrors(['admission_number' => 'The admission number is not valid'])->withInput();
        }
    }
    
    public function deleteUser($id){
        User::where('id','=',$id)->delete();
        return redirect('user-management')->with('success', 'user deleted successfully');
    }
    public function loginView(){
        return redirect('login');
    }

    public function index(){  //the users are redirected based on their role
        $role_id = Auth::user()->role_id;
        $grade_id = Auth::user()->grade_id;

        if ($role_id == 1) { 
            $grade=Grade::all();
            $classes=Classes::all();
            return view('dashboard',compact('grade','classes'));
        } else if ($role_id == 2) {
            $notice=Notice::all();
            $grades=Grade::all();
            $filteredNotices = Notice::where('grade_id', $grade_id)->get();
            
         
            return view('management', compact('notice','grades','filteredNotices'));
        } else if ($role_id == 4) {
            $grade=Grade::all();
            $classes=Classes::all();
            $notices=Notice::all();
            $students=User::all();
            $subjects=Subject::all();
            return view('teacher-panel', compact('grade','classes','notices','students','subjects'));
        } else if($grade_id >= 1 && $grade_id <= 5){
            $notices=Notice::all();
           return view('kiddy-panel', compact('notices'));
        }
        else if($grade_id >= 6 ){
            $notices=Notice::all();
            return view('student-panel', compact('notices'));
        }
      
        
        else {
            return view('/');
        }
    }

    public function logout(Request $request){
        Auth::logout();
        return redirect('/');
    }

    public function archiveUser($id) {
        User::where('id', $id)->update([
            'is_archived' => true,
            'archived_at' => now(),
        ]);
        return redirect('user-management')->with('success', 'User archived successfully');
    }

    public function archivedUsers() {  //display archived users
        $archivedUsers = User::where('is_archived', true)->get();
        return view('user-management', compact('archivedUsers'));
    }

    public function unarchiveUser($id) {  //make an inactive user active
        User::where('id', $id)->update([
            'is_archived' => false,
            'archived_at' => null,
        ]);
        return redirect('user-management')->with('success', 'User unarchived successfully');
    }

    public function searchUsers(Request $request){
        $searchTerm = $request->input('search');

        $user = User::where(function ($query) use ($searchTerm) {
            $query->where('name', 'LIKE', "%$searchTerm%")
                ->orWhere('email', 'LIKE', "%$searchTerm%")
                ->orWhere('admission_number', 'LIKE', "%$searchTerm%")
                ->orWhere('year_of_registration', 'LIKE', "%$searchTerm%");
        })
        ->get();

        $archivedUsers = User::where('is_archived', true)
            ->where(function ($query) use ($searchTerm) {
                $query->where('name', 'LIKE', "%$searchTerm%")
                    ->orWhere('email', 'LIKE', "%$searchTerm%")
                    ->orWhere('admission_number', 'LIKE', "%$searchTerm%")
                    ->orWhere('year_of_registration', 'LIKE', "%$searchTerm%");
            })
            ->get();

        return view('user-management', compact('user', 'archivedUsers'));
    }

    public function showProfile(){  //get the built in laravel profile page for each user
        $user = Auth::user();
        return view('profile/show', compact('user'));
    }

    public function filterUser(Request $request){

        $classId=$request->class_id;
        $gradeId=$request->grade_id;
        $role_id=$request->role_id;
        $year_of_registration=$request->year_of_registration;
        $status = $request->status;
        $classes=Classes::all();
        $grades=Grade::all();
        $user=User::all();


        $filteredUsers = User::where(function ($query) use ($classId, $gradeId, $role_id, $year_of_registration, $status) {
            if ($classId) {
                $query->where('class_id', $classId);
            }
            if ($gradeId) {
                $query->where('grade_id', $gradeId);
            }
            if ($role_id) {
                $query->where('role_id', $role_id);
            }
            if ($year_of_registration) {
                $query->where('year_of_registration', $year_of_registration);
            }
            if ($status) {
                $query->where('is_archived', $status === 'archived');
            }
        })
        ->get();

        return view('filtered-users', compact('filteredUsers', 'classes', 'grades', 'user'));


    }
}
