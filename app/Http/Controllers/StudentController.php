<?php

namespace App\Http\Controllers;

use App\Helper\FileHelper;
use App\Helper\RedirectHelper;
use App\Models\Advisor;
use App\Models\Industry;
use App\Models\InternshipLogbooks;
use App\Models\InternshipMonthlyReport;
use App\Models\InternshipReports;
use App\Models\InternshipSubmission;
use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;
use App\Models\Student;
use Carbon\Carbon;
use Facade\FlareClient\Http\Response;
use Illuminate\Database\Query\Builder;
use Illuminate\Http\Response as HttpResponse;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Hash;

class StudentController extends Controller
{   

    public function index() {
        return view('student.index');
    }

    public function industriData() {
        $data['industries'] = Industry::all();
        return view('student.industry-view.industry-data', $data);
    }
    
    public function internshipSubmission () {
        $data['industries'] = Industry::all();
        return view('student.internship-view.internship-submission', $data);
        
    }

    public function storeSubmission(Request $request) {
        
        $validator = Validator::make($request->all(), [
            'student_id' => 'required',
            'industry_id' => 'required',
            'status' => 'required',
            'file' => 'required|mimes:pdf|max:1024'
        ]);

        if($validator->fails()){
            $errors = $validator->errors()->all(':message');
            return RedirectHelper::redirectBack(implode(' ',$errors), 'error');

        }

        if($request->hasFile('file')) {
           $fileNameSimpan = $this->uploadSubmission($request->file('file'));
        } 

        if(isset($request->industry_id)) {
            $data = new InternshipSubmission();
            $data->student_id = $request->student_id;
            $data->industry_id = $request->industry_id;
            $data->status = $request->status;
            $data->acceptance_file = $fileNameSimpan;                           
            $data->save();
            
            $notification = array(
                'message' => 'Pengajuan PKL berhasil ditetapkan',
                'alert-type' => 'success'
            );
            
            return redirect()->route('student.internship-status')->with($notification);
        } else {
            $notification = array(
                'message' => 'Pengajuan gagal! Pilih industri',
                'alert-type' => 'error'
            );
            return redirect()->back()->with($notification);
        }
    }


    public function uploadSubmission(UploadedFile $uploadedFile) {
        $file = new FileHelper();
        $fileName = $file->handle($uploadedFile, InternshipSubmission::getUploadPath());
        return $fileName;

    }

    public function internshipStatus() {
        
        $data['internshipSubmissions'] = InternshipSubmission::where('student_id', Auth::id())->get();
        return view('student.internship-view.internship-status', $data);

    }

    public function deleteSubmission($id) {
        
        $submission = InternshipSubmission::find($id);
        Storage::disk('public')->delete('internship/letter-of-acceptance/'. $submission->acceptance_file);
        $submission->delete();        

        return redirect()->route('student.internship-status');

    }

    public function logbookHarian() {
        
        $data['internships'] = InternshipSubmission::where('student_id', Auth::id())->where('status', 2)->get();
        $data['submissions'] = InternshipSubmission::with('internshipLogbooks')
                ->whereHas('students', function ($query) {
                    $query->where('status', '=', 2) && ('student_id' == Auth::id());
                    
                })->get();
            
        return view('student.internship-view.internship-logbook', $data);

    }

    public function exportLogbook() {
        $data['internships'] = InternshipSubmission::where('student_id', Auth::id())->where('status', 2)->get();
        $data['submissions'] = InternshipSubmission::with('internshipLogbooks')
                ->whereHas('students', function ($query) {
                    $query->where('status', '=', 2) && ('student_id' == Auth::id());
                    
                })->get();
            
        return view('student.internship-view.export-logbook', $data);
    }

    public function addLogbook() {
        return view('student.internship-view.internship-add-logbook');
    }

    public function storeLogbook(Request $request) {
        
        $validator = Validator::make($request->all(), [
            'date' => 'required',
            'activity' => 'required',
            'file' => 'required|mimes:pdf,jpg,jpeg,png|max:1024',
        ]);

        if($validator->fails()) {
            $errors = $validator->errors()->all(':message');
            return RedirectHelper::redirectBack(implode(' ', $errors), 'error');
        }

        if($request->hasFile('file')) {
            $fileNameSimpan = $this->uploadLogbook($request->file('file'));
        }

        $data = new InternshipLogbooks();
        $dataPKL = InternshipSubmission::where('student_id', Auth::id())->where('status', 2)->get(); 
        $data->internship_submission_id = $dataPKL[0]->id;
        $data->date = $request->date;
        $data->activity = $request->activity;
        $data->note = '';
        $data->attachment_file = $fileNameSimpan;
        $data->save();
        

        $notification = array(  
            'message' => 'Data logbook berhasil diinput',
            'alert-type' => 'success'
        );
        
        return redirect()->route('student.logbook')->with($notification);
    } 

    public function uploadLogbook(UploadedFile $uploadedFile) {
        $file = new FileHelper();
        $fileName = $file->handle($uploadedFile, InternshipLogbooks::getUploadPath());
        return $fileName;
    }

    public function editLogbook($id) {
        $editData['logbook'] = InternshipLogbooks::find($id);
        return view('student.internship-view.internship-edit-logbook', $editData);
    }

    public function updateLogbook(Request $request, $id) {
        $validator = Validator::make($request->all(), [
            'date' => 'required',
            'activity' => 'required',
            'file' => 'mimes:pdf,jpg,jpeg,png|max:1024',
        ]);

        if($validator->fails()) {
            $errors = $validator->errors()->all(':message');
            return RedirectHelper::redirectBack(implode(' ', $errors), 'error');
        }

        $logbooks = InternshipLogbooks::find($id);
        $logbooks->date = $request->date;
        $logbooks->activity = $request->activity;
        
        if($request->hasFile('file') != null ) {
            $oldFile = $logbooks->attachment_file;

            if($logbooks->attachment_file) {
                Storage::disk('public')->delete('internship/logbook/'. $oldFile);
            }

            $fileNameSimpan = $this->uploadLogbook($request->file('file'));
            $logbooks->attachment_file = $fileNameSimpan;

        }

        $logbooks->save();
        
        $notification = array(  
            'message' => 'Data logbook berhasil diupdate',
            'alert-type' => 'success'
        );
        
        return redirect()->route('student.logbook')->with($notification);

    }

    public function deleteLogbook($id) {
        
            $logbook = InternshipLogbooks::find($id);
            Storage::disk('public')->delete('internship/logbook/'. $logbook->attachment_file);
            $logbook->delete();
            return redirect()->route('student.logbook');
      
    }

    public function monthlyReport() {
        $data['internships'] = InternshipSubmission::where('student_id', Auth::id())->where('status', 2)->get();
        $internship = InternshipSubmission::where('student_id', Auth::id())->where('status', 2)->get(); 
        $data['monthly_report'] = InternshipMonthlyReport::where('internship_submission_id', $internship[0]->id)->get();

        return view('student.internship-view.internship-monthly-report', $data);
    }

    public function downloadForm() {

        $path = storage_path('app\public\internship\monthly-report\laporan-bulanan.docx');
        $fileName = 'laporan-bulanan.docx';
        $headers = ['Content-Type: application/docx'];
        return response()->download($path, $fileName, $headers);
        

    }

    public function storeForm(Request $request) {
        $validator = Validator::make($request->all(), [
            'title' => 'required',
            'file' => 'required|mimes:pdf|max:1024',
        ]);

        if($validator->fails()){
            $errors = $validator->errors()->all(':message');
            return RedirectHelper::redirectBack(implode(' ',$errors), 'error');

        }

        if($request->hasFile('file')) {
            $fileNameSimpan = $this->uploadMonthlyReport($request->file('file'));
        }

        $data = new InternshipMonthlyReport();
        $id_internship = InternshipSubmission::where('student_id', Auth::id())->where('status', 2)->get(); 
        $data->internship_submission_id = $id_internship[0]->id;
        $data->title = $request->title;
        $data->file = $fileNameSimpan;
        $data->save();

        $notification = array(
            'message' => 'Laporan bulanan berhasil diupload',
            'alert-type' => 'success'
        );

        return redirect()->route('monthly.report')->with($notification);

    }

    public function uploadMonthlyReport(UploadedFile $uploadedFile) {
        $file = new FileHelper();
        $fileName = $file->handle($uploadedFile, InternshipMonthlyReport::getUploadPath());
        return $fileName;
    }

    public function deleteForm($id) {
        try {
            $monthlyReport = InternshipMonthlyReport::find($id);
            Storage::disk('public')->delete('internship/monthly-report/'. $monthlyReport->file);
            $monthlyReport->delete();
            return redirect()->route('monthly.report');
        }

        catch(\Exception $e) {
            $e->getMessage();
        }
    }

    public function editForm($id) {
        $editData['monthly_report'] = InternshipMonthlyReport::find($id);
    }

    public function updateForm(Request $request, $id) {
        $validator = Validator::make($request->all(), [
            'title' => 'required',
            'file' => 'mimes:pdf|max:1024',
        ]);

        if($validator->fails()){
            $errors = $validator->errors()->all(':message');
            return RedirectHelper::redirectBack(implode(' ',$errors), 'error');
        }

        $monthlyReport = InternshipMonthlyReport::find($id);    
        $monthlyReport->title = $request->title;

        if($request->hasFile('file')) {
            $oldFile = $monthlyReport->file;
            
            if($request->hasFile('file') != null) {
                Storage::disk('public')->delete('internship/monthly-report/'. $oldFile);
            }
            $fileNameSimpan = $this->uploadMonthlyReport($request->file('file'));
            $monthlyReport->file = $fileNameSimpan;
        }

        $monthlyReport->save();

           
        $notification = array(  
            'message' => 'Laporan bulanan berhasil diupdate',
            'alert-type' => 'success'
        );
        
        return redirect()->route('monthly.report')->with($notification);
    }

        public function report() {
            $data['internships'] = InternshipSubmission::where('student_id', Auth::id())->where('status', 2)->get();
            $internship = InternshipSubmission::where('student_id', Auth::id())->where('status', 2)->get(); 
            $data['reports'] = InternshipReports::where('internship_submission_id', $internship[0]->id)->get();
            // dd($data['reports']);
            return view('student.internship-view.internship-report', $data);
        }

        public function storeReport(Request $request) {
            $validator = Validator::make($request->all(), [
                'file' => 'required|mimes:pdf|max:3072',
            ]);

            if($validator->fails()) {
                $errors = $validator->errors()->all(':message');
                return RedirectHelper::redirectBack(implode('', $errors), 'eror');
            }
            
            if($request->hasFile('file')) {
                $fileNameSimpan = $this->uploadReport($request->file('file'));
            }

            $data = new InternshipReports();
            $id_internship = InternshipSubmission::where('student_id', Auth::id())->where('status', 2)->get(); 
            $data->internship_submission_id = $id_internship[0]->id;
            $data->url_file = $fileNameSimpan;
            $data->save();

            $notification = array(
                'message' => 'Laporan akhir berhasil diupload',
                'alert-type' => 'success'
            );
    
            return redirect()->route('internship.report')->with($notification);

        }

        public function uploadReport(UploadedFile $uploadedFile) {
            $file = new FileHelper();
            $fileName = $file->handle($uploadedFile, InternshipReports::getUploadPath());
            return $fileName;
        }

        public function deleteReport($id) {

            $report = InternshipReports::find($id);
            Storage::disk('public')->delete('internship/report/'. $report->url_file);
            $report->delete();
            return redirect()->route('internship.report');            

        }

        public function updatePassword(Request $request, $id) {
            $validator = Validator::make($request->all(), [
                'oldPassword' => 'required',
                'newPassword' => 'required',
                ]);
    
            if($validator->fails()){
                    $errors = $validator->errors()->all(':message');
                    return RedirectHelper::redirectBack(implode(' ',$errors), 'error');
                }
    
            $data = Student::find($id);
            if(Hash::check($request->oldPassword, $data->password)) {
    
                $data->password = bcrypt($request->newPassword);
                $data->save();
    
                $notification = array(
                    'message' => 'Password berhasil diupdate',
                    'alert-type' => 'success'
                );
                return redirect()->back()->with($notification);
            }
            else {
                
                $data->password = $data->password;
                $data->save();
                $notification = array(
                    'message' => 'Konfirmasi password salah',
                    'alert-type' => 'error'
                );
                return redirect()->back()->with($notification);
            }
        }
}

 
