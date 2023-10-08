<?php

use App\Http\Controllers\AssignmentController;
use App\Http\Controllers\FeedbackController;
use App\Http\Controllers\FlashcardController;
use App\Http\Controllers\GradeController;
use App\Http\Controllers\ManagementController;
use App\Http\Controllers\MaterialController;
use App\Http\Controllers\StudentController;
use App\Http\Controllers\SubmissionController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ClassesController;
use App\Http\Controllers\NoticeController;
use App\Http\Controllers\SubjectController;
use App\Http\Controllers\TeacherController;
use App\Http\Controllers\ProgressController;
use Illuminate\Support\Facades\Route;

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

Route::get('/', [UserController::class, 'loginView']);

Route::get('redirects',[UserController::class,'index']);

//admin routes
Route::middleware(['App\Http\Middleware\ValidateRole:1'])->group(function () {
//student
    Route::post('save-Student',[StudentController::class,'saveStudent']);
    Route::get('add-student ',[StudentController::class,'addStudent']);
    Route::get('edit-student/{id}',[StudentController::class,'editStudent']);
    Route::get('student-list',[StudentController::class,'Student']);
    Route::post('update-student/{id}', [StudentController::class, 'updateStudent'])->name('update-student');
    Route::get('delete-student/{id}',[StudentController::class,'deleteStudent']);

    Route::post('save-User',[UserController::class,'saveUser']);

    Route::get('roles-list',[UserController::class,'Role']);
    Route::get('add-student',[StudentController::class,'Grade']);
    Route::get('class-list',[StudentController::class,'Classes']);
    Route::get('dashboard',[GradeController::class,'Grade']);

//grades
    Route::get('add-grade',[GradeController::class,'addGrade']);
    Route::post('save-Grade',[GradeController::class,'saveGrade']);
    Route::post('update-grade',[GradeController::class,'updateGrade']);
    Route::get('edit-grade/{id}',[GradeController::class,'editGrade']);
    Route::get('delete-grade/{id}',[GradeController::class,'deleteGrade']);
    Route::post('update-grade/{id}', [GradeController::class, 'updateGrade'])->name('update-grade');


//class management
    Route::get('add-class',[ClassesController::class,'addClass']);
    Route:: get ('class-management',[ClassesController::class,'Class']);
    Route::post('save-Class',[ClassesController::class,'saveClass']);
    Route::get('edit-class/{id}',[ClassesController::class,'editClass']);
    Route::post('update-class/{id}', [ClassesController::class, 'updateClass'])->name('update-class');
    Route::get('delete-class/{id}',[ClassesController::class,'deleteClass']);
    Route::get('classes-for-grade/{grade}', [gradeController::class,'showClasses'])->name('classes.show');
    Route::get('class-details/{class}', [ClassesController::class,'showDetails'])->name('class.details');


//user management
    Route::get('user-management',[UserController::class,'User']);
    Route::get('edit-user/{id}',[UserController::class,'editUser']);
    Route::post('update-user/{id}', [UserController::class, 'updateUser'])->name('update-user');
    Route::get('delete-user/{id}',[UserController::class,'deleteUser']);
    Route::post('archive-user/{id}', [UserController::class,'archiveUser']);
    Route::post('unarchive-user/{id}', [UserController::class,'unarchiveUser']);
    Route::get('search-users', [UserController::class, 'searchUsers'])->name('search-users');
  
//subject
    Route::get('add-subject',[SubjectController::class,'addSubject']);
    Route::post('save-subject',[SubjectController::class,'saveSubject']);
    Route::post('update-subject',[SubjectController::class,'updateSubject']);
    Route::get('edit-subject/{id}',[SubjectController::class,'editSubject']);
    Route::get('delete-subject/{id}',[SubjectController::class,'deleteSubject']);
    Route::post('update-subject/{id}', [SubjectController::class, 'updateSubject'])->name('update-subject');
    Route::get('subject-list',[SubjectController::class,'Subjects']);

// teacher
    Route::get('teacher-list', [TeacherController::class, 'Teachers']);
    Route::get('add-teacher', [TeacherController::class, 'addTeacher']);
    Route::post('save-teacher', [TeacherController::class, 'saveTeacher']);
    Route::get('edit-teacher/{id}', [TeacherController::class, 'editTeacher']);
    Route::post('update-teacher/{id}', [TeacherController::class, 'updateTeacher'])->name('update-teacher');
    Route::get('delete-teacher/{id}', [TeacherController::class, 'deleteTeacher']);

//management
    Route::get('management-list',[ManagementController::class,'index']);
    Route::get('add-management', [ManagementController::class, 'addManagement']);
    Route::post('save-management', [ManagementController::class, 'saveManagement']);
    Route::get('edit-management/{id}', [ManagementController::class, 'editManagement']);
    Route::post('update-management/{id}', [ManagementController::class, 'updateManagement'])->name('update-management');
    Route::get('delete-management/{id}', [ManagementController::class, 'deleteManagement']);
   
});

Route::get('logout', [UserController::class, 'logout'])->name('logout');

//management routes
Route::middleware(['App\Http\Middleware\ValidateRole:2'])->group(function () {
    Route::post('update-notice/{id}',[NoticeController::class,'updateNotice'])->name('update-annoucement');
    Route::get('delete-notice/{id}',[NoticeController::class,'deleteNotice']);
    Route::get('management',[NoticeController::class,'Notice']);
    Route::get('add-notice',[NoticeController::class,'addNotice']);
    Route::post('save-notice',[NoticeController::class,'saveNotice']);
    Route::get('edit-notice/{id}',[NoticeController::class,'editNotice']);
    
    
});
//routes for teachers and students
Route::middleware(['App\Http\Middleware\ValidateRole:3,4'])->group(function () {
    Route::get('subject-detail/{subject_id}', [SubjectController::class,'showDynamicDetail'])->name('subject.detail');
    Route::get('add-submission/{assignment_id}',[SubmissionController::class,'addSubmission']);
    Route::post('save-submission', [SubmissionController::class, 'saveSubmission'])->name('save-submission');
    Route::get('subject/{subject_id}/flashcards', [FlashcardController::class, 'showFlashcards'])->name('subject.flashcards');

});

//teacher routes
Route::middleware(['App\Http\Middleware\ValidateRole:4'])->group(function () {
    Route::get('teacher-panel',[TeacherController::class,'teacherPanel']);
    Route::get('material-list',[MaterialController::class,'Material']);
    Route::get('add-material/{subject_id}',[MaterialController::class,'addMaterial']);
    Route::post('save-material',[MaterialController::class,'saveMaterial']);
    Route::get('edit-material/{id}',[MaterialController::class,'editMaterial'])->name('edit-material');
    Route::post('update-material/{id}',[MaterialController::class,'updateMaterial'])->name('update-material');
    Route::match(['get', 'delete'], 'delete-material/{id}', [MaterialController::class, 'deleteMaterial'])->name('delete-material');

    //assignment handling
    Route::get('assignment-list',[AssignmentController::class,'Assignment']);
    Route::get('add-assignment/{subject_id}',[AssignmentController::class,'addAssignment']);
    Route::post('save-assignment',[AssignmentController::class,'saveAssignment']);
    Route::get('edit-assignment/{id}',[AssignmentController::class,'editAssignment'])->name('edit-assignment');
    Route::post('update-assignment/{id}',[AssignmentController::class,'updateAssignment'])->name('update-assignment');
    Route::match(['get', 'delete'], 'delete-assignment/{id}', [AssignmentController::class, 'deleteAssignment'])->name('delete-assignment');

   //submission handling
   Route::get('submission-list',[SubmissionController::class,'index']);
   Route::get('edit-submission/{id}',[SubmissionController::class,'editSubmission']);
   Route::post('update-submission/{id}',[SubmissionController::class,'updateSubmission'])->name('update-submission');
   Route::match(['get', 'delete'], 'delete-submission/{id}', [SubmissionController::class, 'deleteSubmission'])->name('delete-submission');
   Route::get('view-submissions/{assignment_id}', [SubmissionController::class, 'viewSubmissions'])->name('view-submissions');

   //feedback handling
   Route::get('feedback-list',[FeedbackController::class,'Feedback']);
   Route::get('add-feedback/{submission_id}',[FeedbackController::class,'addFeedback']);
   Route::post('save-feedback',[FeedbackController::class,'saveFeedback'])->name('save-feedback');
   Route::get('edit-feedback/{id}',[FeedbackController::class,'editFeedback']);
   Route::post('update-feedback/{id}',[FeedbackController::class,'updateFeedback'])->name('update-feedback');
   Route::get('delete-feedback/{id}',[FeedbackController::class,'deleteFeedback']);

   Route::get('search-submissions/{assignment_id}', [SubmissionController::class, 'searchSubmissions'])->name('search-submissions');

   //flashcard handling
   Route::get('flashcard-list',[FlashcardController::class,'Flashcard']);
   Route::get('add-card/{subject_id}',[FlashcardController::class,'addFlashcard']);
   Route::post('save-card',[FlashcardController::class,'saveFlashcard'])->name('save-card');
   Route::get('edit-card/{id}', [FlashcardController::class, 'editFlashcard']);
   Route::post('update-flashcard/{id}', [FlashcardController::class, 'updateFlashcard'])->name('update-flashcard');
   Route::get('delete-flashcard/{id}', [FlashcardController::class, 'deleteFlashcard']);

   Route::get('student-progress/{subject_id}', [ProgressController::class,'studentProgress'])->name('student-progress');

});

Route::middleware(['App\Http\Middleware\ValidateRole:3'])->group(function () {
    Route::get('student-panel',[StudentController::class,'studentPanel']);
    Route::get('view-my-submissions', [SubmissionController::class,'viewMySubmissions'])->name('view-my-submissions');
});


Route::get('profile/show',[UserController::class,'showProfile']);

Route::get('search-progress', [ProgressController::class, 'searchProgress'])->name('search-progress');
