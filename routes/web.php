<?php

use App\Http\Controllers\Excel;
use App\Http\Controllers\IndustryController;
use App\Http\Controllers\InternshipController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\AdvisorController;
use App\Http\Controllers\StudentController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
*/

// ROUTE LOGIN DAN LOGOUT
Route::get('/', function () {
    
    return view('auth.login');
})->name('login');
Route::post('postLogin', [LoginController::class, 'postLogin'])->name('postLogin');
Route::get('logout', [LoginController::class, 'logout'])->name('logout');


// yang bisa diakses admin
Route::group(['middleware' => ['auth:web']], function() {
    
    Route::get('/dashboard', [AdminController::class, 'index'])->name('admin.dashboard');  
        Route::get('/template_advisor', [Excel::class, 'download_local'])->name('download.template.advisor');
        Route::get('/template_student', [Excel::class, 'download_local'])->name('download.template.student');
        Route::post('/import_advisor', [Excel::class, 'upload_local_advisor'])->name('upload.advisor');
        Route::post('/import_student', [Excel::class, 'upload_local_student'])->name('upload.student');
        Route::get('/template_industri', [Excel::class, 'download_local'])->name('download.template.industri');
        Route::post('/import_industri', [Excel::class, 'upload_local_industry'])->name('upload.industri');


    Route::prefix('advisor')->group(function() {
        Route::get('/data', [AdminController::class, 'advisorData'])->name('advisor.data');
        Route::get('/add', [AdminController::class, 'addAdvisor'])->name('advisor.add');
        Route::post('/store', [AdminController::class, 'storeAdvisor'])->name('advisor.store');
        Route::get('/edit/{id}', [AdminController::class, 'editAdvisor'])->name('advisor.edit');
        Route::put('/update/{id}', [AdminController::class, 'updateAdvisor'])->name('advisor.update');
        Route::post('/delete/{id}', [AdminController::class, 'deleteAdvisor'])->name('advisor.delete');
    });

    Route::prefix('student')->group(function() {
        Route::get('/data', [AdminController::class, 'studentData'])->name('student.data');
        Route::get('/add', [AdminController::class, 'addStudent'])->name('student.add');
        Route::post('/store', [AdminController::class, 'storeStudent'])->name('student.store');
        Route::get('/edit/{id}', [AdminController::class, 'editStudent'])->name('student.edit');
        Route::put('/update/{id}', [AdminController::class, 'updateStudent'])->name('student.update');
        Route::post('/delete/{id}', [AdminController::class, 'deleteStudent'])->name('student.delete');
    });

    Route::prefix('industries')->group(function() {
        Route::get('/data', [IndustryController::class, 'industriData'])->name('industri.data');
        Route::get('/add', [IndustryController::class, 'addIndustri'])->name('industri.add');
        Route::post('/store', [IndustryController::class, 'storeIndustri'])->name('industri.store');
        Route::get('/edit/{id}', [IndustryController::class, 'editIndustri'])->name('industri.edit');
        Route::put('/update/{id}', [IndustryController::class, 'updateIndustri'])->name('industri.update');
        Route::post('/delete/{id}', [IndustryController::class, 'deleteIndustri'])->name('industri.delete');
    });
    
    Route::prefix('internship')->group(function() {
        Route::get('/submission', [InternshipController::class, 'internshipSubmission'])->name('internship.submission');
        Route::put('/submission_accept/{id}', [InternshipController::class, 'submissionAccept'])->name('submission.accept');
        Route::put('/submission_reject/{id}', [InternshipController::class, 'submissionReject'])->name('submission.reject');
        Route::get('/data', [InternshipController::class, 'internshipData'])->name('internship.data');
        Route::get('/data/logbook/{id}', [InternshipController::class, 'internshipLogbook'])->name('internship.logbook');
        Route::get('/monthly-report', [InternshipController::class, 'monthlyReport'])->name('internship.monthly.report');
        // Route::get('/report', [InternshipController::class, 'internshipReport'])->name('internship.report');
    });
    
    
});


// yang bisa diakses advisor
Route::group(['middleware' => ['auth:advisor']], function() {
    Route::get('/advisor/dashboard', [AdvisorController::class, 'index'])->name('advisor.dashboard');  
    
});


// yang bisa diakses student
Route::group(['middleware' => ['auth:student']], function() {

    Route::prefix('student')->group(function() {
        Route::get('/dashboard', [StudentController::class, 'index'])->name('student.dashboard');
        Route::get('/industries/data', [StudentController::class, 'industriData'])->name('student.industry-data');
        Route::get('/internship/submission', [StudentController::class, 'internshipSubmission'])->name('student.internship-submission');
        Route::post('/internship/submission/store', [StudentController::class, 'storeSubmission'])->name('student.internship-store');


    });
    
    

});





