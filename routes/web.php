<?php

use App\Http\Controllers\AssignmentController;
use App\Http\Controllers\Controller;
use App\Http\Controllers\FeedbackController;
use App\Http\Controllers\gradeController;
use App\Http\Controllers\ManagementController;
use App\Http\Controllers\MaterialController;
use App\Http\Controllers\QuizController;
use App\Http\Controllers\StudentController;
use App\Http\Controllers\SubmissionController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\classController;
use App\Http\Controllers\noticeController;
use App\Http\Controllers\SubjectController;
use App\Http\Controllers\TeacherController;
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
    Route::middleware(['role:2'])->group(function () {
        Route::get('/management', [UserController::class, 'Management'])->name('management');
    });

    Route::middleware(['role:1'])->group(function () {
        Route::get('/dashboard', [UserController::class, 'Admin'])->name('dashboard');
    });

    Route::middleware(['role:3'])->group(function (){
        Route::get('/teacher-panel', [UserController::class, 'Teacher'])->name('teacher-panel');
    });

    Route::middleware(['role:4'])->group(function (){
        Route::get('/student-panel', [UserController::class, 'Student'])->name('student-panel');
    });
});

Route::get('redirects',[UserController::class,'index']);


//student user

Route::post('save-Student',[StudentController::class,'saveStudent']);

Route::get('add-student ',[StudentController::class,'addStudent']);

Route::get('edit-student/{id}',[StudentController::class,'editStudent']);

Route::get('student-list',[StudentController::class,'Student']);

Route::post('update-student/{id}', [StudentController::class, 'updateStudent'])->name('update-student');

Route::get('delete-student/{id}',[StudentController::class,'deleteStudent']);



Route::get('logout', [UserController::class, 'logout'])->name('logout');



Route::post('save-User',[UserController::class,'SaveUser']);


Route::get('register-user',[UserController::class,'AddUser'])
->middleware('role:0');


Route::get('roles-list',[UserController::class,'Role']);


Route::get('add-student',[StudentController::class,'Grade']);

Route::get('class-list',[StudentController::class,'Classes']);

//Route::get('grade-list',[classController::class,'Grade']);//

Route::get('dashboard',[gradeController::class,'Grade']);

Route::get('add-grade',[gradeController::class,'AddGrade']);

Route::post('save-Grade',[gradeController::class,'saveGrade']);

Route::post('update-grade',[gradeController::class,'updateGrade']);

Route::get('edit-grade/{id}',[gradeController::class,'editGrade']);

Route::get('delete-grade/{id}',[gradeController::class,'deleteGrade']);

Route::post('update-grade/{id}', [gradeController::class, 'updateGrade'])->name('update-grade');





Route::post('update-notice/{id}',[noticeController::class,'updateNotice'])->name('update-annoucement');

Route::get('delete-notice/{id}',[noticeController::class,'deleteNotice']);

Route::get('management',[noticeController::class,'Notice']);

Route::get('add-notice',[noticeController::class,'AddNotice']);

Route::post('save-notice',[noticeController::class,'saveNotice']);

Route::get('edit-notice/{id}',[noticeController::class,'editNotice']);



Route::get('add-class',[classController::class,'AddClass']);

Route:: get ('class-management',[classController::class,'Class']);

Route::post('save-Class',[classController::class,'saveClass']);

Route::get('edit-class/{id}',[classController::class,'editClass']);

Route::post('update-class/{id}', [classController::class, 'updateClass'])->name('update-class');

Route::get('delete-class/{id}',[classController::class,'deleteClass']);





Route::get('user-management',[UserController::class,'User']);

//Route::get('dashboard',[classController::class,'Index']);//

Route::get('edit-user/{id}',[UserController::class,'editUser']);

Route::post('update-user/{id}', [UserController::class, 'updateUser'])->name('update-user');

Route::get('delete-user/{id}',[UserController::class,'deleteUser']);

// routes/web.php
Route::get('classes-for-grade/{grade}', [gradeController::class,'showClasses'])->name('classes.show');

Route::get('auth.register',[UserController::class,'register']);

Route::get('class-details/{class}', [classController::class,'showDetails'])->name('class.details');

//subject
Route::get('add-subject',[SubjectController::class,'AddSubject']);

Route::post('save-subject',[SubjectController::class,'saveSubject']);

Route::post('update-subject',[SubjectController::class,'updateSubject']);

Route::get('edit-subject/{id}',[SubjectController::class,'editSubject']);

Route::get('delete-subject/{id}',[SubjectController::class,'deleteSubject']);

Route::post('update-subject/{id}', [SubjectController::class, 'updateSubject'])->name('update-subject');

Route::get('subject-list',[SubjectController::class,'Subjects']);


// routes/web.php

Route::get('teacher-list', [TeacherController::class, 'Teachers']);
Route::get('add-teacher', [TeacherController::class, 'AddTeacher']);
Route::post('save-teacher', [TeacherController::class, 'saveTeacher']);
Route::get('edit-teacher/{id}', [TeacherController::class, 'editTeacher']);
Route::post('update-teacher/{id}', [TeacherController::class, 'updateTeacher'])->name('update-teacher');
Route::get('delete-teacher/{id}', [TeacherController::class, 'deleteTeacher']);

//management
Route::get('management-list',[ManagementController::class,'index']);

Route::get('add-management', [ManagementController::class, 'AddManagement']);
Route::post('save-management', [ManagementController::class, 'saveManagement']);
Route::get('edit-management/{id}', [ManagementController::class, 'editManagement']);
Route::post('update-management/{id}', [ManagementController::class, 'updateManagement']);
Route::get('delete-management/{id}', [ManagementController::class, 'deleteManagement']);


Route::get('teacher-panel',[TeacherController::class,'teacherPanel']);

Route::get('subject-detail/{subject_id}', [SubjectController::class,'showDynamicDetail'])->name('subject.detail');


Route::get('material-list',[MaterialController::class,'Material']);
Route::get('add-material',[MaterialController::class,'AddMaterial']);
Route::post('save-material',[MaterialController::class,'saveMaterial']);
Route::get('edit-material/{id}',[MaterialController::class,'editMaterial']);
Route::post('update-material/{id}',[MaterialController::class,'updateMaterial'])->name('update-material');
Route::get('delete-material/{id}',[MaterialController::class,'deleteMaterial']);

Route::get('assignment-list',[AssignmentController::class,'Assignment']);
Route::get('add-assignment',[AssignmentController::class,'AddAssignment']);
Route::post('save-assignment',[AssignmentController::class,'saveAssignment']);
Route::get('edit-assignment/{id}',[AssignmentController::class,'editAssignment']);
Route::post('update-assignment/{id}',[AssignmentController::class,'updateAssignment'])->name('update-assignment');
Route::get('delete-assignment/{id}',[AssignmentController::class,'deleteAssignment']);

Route::get('submission-list',[SubmissionController::class,'index']);
Route::get('add-submission/{assignment_id}',[SubmissionController::class,'AddSubmission']);
Route::post('save-submission', [SubmissionController::class, 'saveSubmission'])->name('save-submission');
Route::get('edit-submission/{id}',[SubmissionController::class,'editSubmission']);
Route::post('update-submission/{id}',[SubmissionController::class,'updateSubmission'])->name('update-submission');
Route::get('delete-submission/{id}',[SubmissionController::class,'deleteSubmission']);

Route::get('view-submissions/{assignment_id}', [SubmissionController::class, 'viewSubmissions'])->name('view-submissions');

Route::get('feedback-list',[FeedbackController::class,'Feedback']);
Route::get('add-feedback/{submission_id}',[FeedbackController::class,'AddFeedback']);
Route::post('save-feedback',[FeedbackController::class,'saveFeedback'])->name('save-feedback');
Route::get('edit-feedback/{id}',[FeedbackController::class,'editFeedback']);
Route::post('update-feedback/{id}',[FeedbackController::class,'updateFeedback'])->name('update-feedback');
Route::get('delete-feedback/{id}',[FeedbackController::class,'deleteFeedback']);

Route::post('archive-user/{id}', [UserController::class,'archiveUser']);
Route::post('unarchive-user/{id}', [UserController::class,'unarchiveUser']);

Route::get('quiz-list', [QuizController::class, 'Quiz']);
Route::get('add-quiz', [QuizController::class, 'addQuiz']);
Route::post('save-quiz', [QuizController::class, 'saveQuiz'])->name('save-quiz');
Route::get('edit-quiz/{id}', [QuizController::class, 'editQuiz']);
Route::post('update-quiz/{id}', [QuizController::class, 'updateQuiz'])->name('update-quiz');
Route::get('delete-quiz/{id}', [QuizController::class, 'deleteQuiz']);

Route::get('quiz-details/{quiz_id}', [QuizController::class, 'showDetails'])->name('quiz-details');
Route::get('add-question/{quiz_id}',[ QuizController::class,'addQuestion']);

Route::post('save-question/{quiz_id}', [QuizController::class, 'saveQuestion'])->name('save-question');

Route::get('search-users', [UserController::class, 'searchUsers'])->name('search-users');

Route::get('search-submissions/{assignment_id}', [SubmissionController::class, 'searchSubmissions'])->name('search-submissions');
