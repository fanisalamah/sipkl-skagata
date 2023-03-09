<?php

namespace App\Http\Controllers;

use App\Models\Advisor;
use App\Models\Industry;
use App\Models\InternshipSubmission;
use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;
use App\Models\Student;
use Facade\FlareClient\Http\Response;
use Illuminate\Http\Response as HttpResponse;
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

    public function storeSubmission(Request $request, $id) {

        // $validator = Validator::make($request->all(), [
        //     'student_id' => 'required',
        //     'industry_id' => 'required',
        //     'status' => 'required',
        //     'url_acceptance' => 'required|mimes:application/pdf|max:1024'
        // ]);


        if($request->hasFile('file')) {
            
            $fileNameWithExt = $request->file('file')->getClientOriginalName();
            // $fileName = pathinfo($fileNameWithExt, PATHINFO_FILENAME);
            
            $extension = $request->file('file')->getClientOriginalExtension();
            $fileSize = $request->file('file')->getSize();


            if($extension === 'pdf') {
                
                    $fileNameSimpan = Str::random(32).'.'.$extension;
                    $path = $request->file('file')->storeAs('/public/LetterOfAcceptance', $fileNameSimpan);    

            }

            else {
                $notification = array(
                    'message' => 'Pilih dokumen PDF dengan maksimal ukuran 1MB',
                    'alert-type' => 'error'
                );
                return redirect()->back()->with($notification);
            }


        } else {
            $notification = array(
                'message' => 'Pengajuan gagal! Lampirkan Dokumen Penerimaan',
                'alert-type' => 'error'
            );
            return redirect()->back()->with($notification);
        }

        if(isset($request->industry_id)) {
            $data = new InternshipSubmission();
            $data->student_id = $request->student_id;
            $data->industry_id = $request->industry_id;
            $data->status = $request->status;
            $data->url_acceptance = $fileNameSimpan;                           
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

    public function internshipStatus() {
        
        $data['internshipSubmissions'] = InternshipSubmission::where('student_id', Auth::id())->get();
        return view('student.internship-view.internship-status', $data);

    }

    public function deleteSubmission($id) {
        
        $submission = InternshipSubmission::find($id);
        Storage::disk('public')->delete('LetterOfAcceptance/'. $submission->url_acceptance);
        $submission->delete();

        

        return redirect()->route('student.internship-status');

    }
}

 
