<?php

namespace App\Http\Controllers;

use App\Models\Advisor;
use App\Models\Industry;
use App\Models\InternshipSubmission;
use Illuminate\Http\Request;
use App\Models\Student;
use Illuminate\Contracts\Validation\Validator;
use Illuminate\Support\Facades\Validator as FacadesValidator;

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

        $validator = FacadesValidator::make($request->all(), [
            'student_id' => 'required',
            'industry_id' => 'required',
            'status' => 'required',
            'url_acceptance' => 'required|mimetypes:application/pdf|max:10000'
        ]);


        if($request->hasFile('file')) {
            
            $fileNameWithExt = $request->file('file')->getClientOriginalName();
            $fileName = pathinfo($fileNameWithExt, PATHINFO_FILENAME);
            $extension = $request->file('file')->getClientOriginalExtension();
            $fileNameSimpan = $fileName.'_'.time().'.'.$extension;
            $path = $request->file('file')->storeAs('LetterOfAcceptance', $fileNameSimpan);

        } else {
            $fileNameSimpan = 'nofile.pdf';
        }

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
        
        return redirect()->route('student.internship-submission')->with($notification);
    }

       
}

 
