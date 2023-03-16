<?php

namespace App\Http\Controllers;

use App\Helper\FileHelper;
use App\Helper\RedirectHelper;
use App\Models\Advisor;
use App\Models\Industry;
use App\Models\InternshipLogbooks;
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
        
        

            // ini query untuk semua student yang statusnya 2 (accepted), dan idnya sesuai id user yang login

        return view('student.internship-view.internship-logbook', $data);

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
            'file' => 'required|mimes:pdf,jpg,jpeg,png|max:1024',
        ]);

        if($validator->fails()) {
            $errors = $validator->errors()->all(':message');
            return RedirectHelper::redirectBack(implode(' ', $errors), 'error');
        }


        $logbooks = InternshipLogbooks::find($id);
        $logbooks->date = $request->date;
        $logbooks->activity = $request->activity;
        
        if($request->hasFile('file')) {
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


}

 
