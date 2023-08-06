<?php

use App\Http\Controllers\gradeController;
use App\Http\Controllers\StudentController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\classController;
use App\Http\Controllers\announcementController;
use App\Models\Annoucement;
use Illuminate\Support\Facades\Route;
//use App\Http\Controllers\RoleController;
use Illuminate\Routing\Controllers\Middleware;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified'
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
})
->middleware(['role:0'])
->name('dashboard');

//Route::get('adminpanel',[RoleController::class,'index']);
Route:: get ('classes',[classController::class,'Class']);

Route::post('save-Student',[StudentController::class,'saveStudent']);


Route::get('add-student ',[StudentController::class,'addStudent']);


Route::get('student-list',[StudentController::class,'Student']);


Route::get('logout', [App\Http\Controllers\UserController::class, 'logout'])->name('logout');

Route::post('save-User',[UserController::class,'SaveUser']);


Route::get('register-user',[UserController::class,'AddUser'])
->middleware('role:0');


Route::get('user-roles',[UserController::class,'Role']);


Route::get('add-student',[StudentController::class,'Grade']);

Route::get('class-list',[StudentController::class,'Classes']);

Route::get('grade-list',[classController::class,'Grade']);

Route::get('dashboard',[gradeController::class,'Grade']);



Route::get('add-grade',[gradeController::class,'AddGrade']);

Route::post('save-Grade',[gradeController::class,'saveGrade']);

Route::post('update-grade',[gradeController::class,'updateGrade']);

Route::get('edit-grade/{id}',[gradeController::class,'editGrade']);

Route::post('update-grade/{id}', [gradeController::class, 'updateGrade'])->name('update-grade');

Route::post('update-annoucement/{id}',[announcementController::class,'updateAnnouncement'])->name('update-annoucement');

Route::get('delete-grade/{id}',[gradeController::class,'deleteGrade']);

Route::get('delete-ann/{id}',[announcementController::class,'deleteAnnoucement']);

Route::get('management',[announcementController::class,'Index']);

Route::get('add-annoucement',[announcementController::class,'AddAnnocement']);

Route::post('save-Annoucement',[announcementController::class,'saveAnnouncement']);

Route::get('edit-ann/{id}',[announcementController::class,'editAnnoucement']);

Route::get('add-class',[classController::class,'AddClass']);

Route::post('save-Class',[classController::class,'saveClass']);



Route::get('edit-class/{id}',[classController::class,'editClass']);

Route::post('update-class/{id}', [classController::class, 'updateClass'])->name('update-class');

Route::get('delete-class/{id}',[classController::class,'deleteClass']);

Route::get('delete-student/{id}',[StudentController::class,'deleteStudent']);

Route::get('user-management',[UserController::class,'User']);

Route::get('dashboard',[classController::class,'Index']);

Route::get('edit-user/{id}',[UserController::class,'editUser']);

Route::post('update-user/{id}', [UserController::class, 'updateUser'])->name('update-user');

Route::get('delete-user/{id}',[UserController::class,'deleteUser']);