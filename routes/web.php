<?php

use App\Http\Controllers\Excel;
use App\Http\Controllers\IndustryController;
use App\Http\Controllers\InternshipController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\AdvisorController;
use App\Http\Controllers\StudentController;
use App\Models\Advisor;
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
        Route::get('/report', [InternshipController::class, 'internshipReport'])->name('internship.report');
    });
    
    
});


// yang bisa diakses advisor
Route::group(['middleware' => ['auth:advisor']], function() {
    Route::prefix('advisor')->group(function() {
        Route::get('/dashboard', [AdvisorController::class, 'index'])->name('advisor.dashboard');  
        Route::get('/student/data', [AdvisorController::class, 'studentData'])->name('advisor.student.data');
        Route::get('/student/add', [AdvisorController::class, 'addStudent'])->name('advisor.student.add');
        Route::post('/student/store', [AdvisorController::class, 'storeStudent'])->name('advisor.student.store');
        Route::get('/student/edit/{id}', [AdvisorController::class, 'editStudent'])->name('advisor.student.edit');
        Route::put('/student/update/{id}', [AdvisorController::class, 'updateStudent'])->name('advisor.student.update');
        Route::post('/student/delete/{id}', [AdvisorController::class, 'deleteStudent'])->name('advisor.student.delete');
        Route::get('/template_student', [Excel::class, 'download_local'])->name('advisor.download.template.student');
        Route::post('/import_student', [Excel::class, 'upload_local_student'])->name('advisor.upload.student');

        Route::get('/industries/data', [IndustryController::class, 'industriDataAdv'])->name('advisor.industri.data');
        Route::get('/industries/add', [IndustryController::class, 'addIndustriAdv'])->name('advisor.industri.add');
        Route::post('/industries/store', [IndustryController::class, 'storeIndustriAdv'])->name('advisor.industri.store');
        Route::get('/industries/edit/{id}', [IndustryController::class, 'editIndustriAdv'])->name('advisor.industri.edit');
        Route::put('/industries/update/{id}', [IndustryController::class, 'updateIndustriAdv'])->name('advisor.industri.update');
        Route::post('/industries/delete/{id}', [IndustryController::class, 'deleteIndustri'])->name('advisor.industri.delete');
        Route::get('/template_industri', [Excel::class, 'download_local'])->name('advisor.download.template.industri');
        Route::post('/import_industri', [Excel::class, 'upload_local_industry'])->name('advisor.upload.industri');
        Route::get('/internship/submission', [AdvisorController::class, 'internshipSubmission'])->name('advisor.internship.submission');
        Route::get('/internship/submission/{id}', [AdvisorController::class, 'filterJurusan']);
        Route::post('/internship/submission/', [AdvisorController::class, 'updateSubmission'])->name('update.advisor');
        Route::get('/internship/monitoring/', [AdvisorController::class, 'internshipMonitoring'])->name('advisor.internship.monitoring');
        Route::get('/internship/monitoring/delete/{id}', [AdvisorController::class, 'deleteMonitoring'])->name('advisor.internship.monitoring.delete');
        Route::get('/internship/monitoring/personal/{id}', [AdvisorController::class, 'personalMonitoring'])->name('advisor.internship.monitoring.personal');
        Route::put('/internship/monitoring/personal/note/{id}', [AdvisorController::class, 'updateNote'])->name('update.note');
        Route::get('/internship/monthly-report', [AdvisorController::class, 'monthlyReport'])->name('advisor.internship.monthly-report');
        Route::get('/internship/report', [AdvisorController::class, 'finalReport'])->name('advisor.internship.report');
        Route::post('/internship/report/score/{id}', [AdvisorController::class, 'updateScore'])->name('update.score');

    });
    

    
});


// yang bisa diakses student
Route::group(['middleware' => ['auth:student']], function() {

    Route::prefix('student')->group(function() {
        Route::get('/dashboard', [StudentController::class, 'index'])->name('student.dashboard');
        Route::get('/industries/data', [StudentController::class, 'industriData'])->name('student.industry-data');
        Route::get('/internship/submission', [StudentController::class, 'internshipSubmission'])->name('student.internship-submission');
        Route::post('/internship/submission/store/{id}', [StudentController::class, 'storeSubmission'])->name('student.internship-store');
        Route::get('/internship/status', [StudentController::class, 'internshipStatus'])->name('student.internship-status');
        Route::post('/internship/submission/delete/{id}', [StudentController::class, 'deleteSubmission'])->name('student.delete-submission');
        Route::get('/logbook', [StudentController::class, 'logbookHarian'])->name('student.logbook');
        Route::get('/logbook/add', [StudentController::class, 'addLogbook'])->name('student.add-logbook');
        Route::post('/logbook/store', [StudentController::class, 'storeLogbook'])->name('logbook.store');
        Route::get('/logbook/edit/{id}', [StudentController::class, 'editLogbook'])->name('logbook.edit');
        Route::put('/logbook/update/{id}', [StudentController::class, 'updateLogbook'])->name('logbook.update');
        Route::post('/logbook/delete/{id}', [StudentController::class, 'deleteLogbook'])->name('logbook.delete');
        Route::get('/monthly-report', [StudentController::class, 'monthlyReport'])->name('monthly.report');
        Route::get('/download/monthly-report', [StudentController::class, 'downloadForm'])->name('download.monthly.report');
        Route::post('/store/monthly-report', [StudentController::class, 'storeForm'])->name('store.monthly.report');
        Route::post('/delete/monthly-report/{id}', [StudentController::class, 'deleteForm'])->name('delete.monthly.report');
        Route::get('/edit/monthly-report/{id}', [StudentController::class, 'editForm'])->name('edit.monthly.report');
        Route::put('/update/monthly-report/{id}', [StudentController::class, 'updateForm'])->name('update.monthly.report');
        Route::get('/report', [StudentController::class, 'report'])->name('internship.report');
        Route::post('/report/store', [StudentController::class, 'storeReport'])->name('store.internship.report');
        
    });
    
    

});





