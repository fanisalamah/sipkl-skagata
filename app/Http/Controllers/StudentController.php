<?php

namespace App\Http\Controllers;

use App\Models\Advisor;
use App\Models\Industry;
use App\Models\InternshipSubmission;
use Illuminate\Http\Request;
use App\Models\Student;

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

        // $validatedData = $request->validate([
        //     'student_id' => 'required',
        //     'industry_id' => 'required',
        //     'url_acceptance' => 'mimes: pdf'
        // ]);


        $data = $request->file('file');
        $url_acceptance = $data->getClientOriginalName();
        $data->move('LetterOfAcceptance', $url_acceptance);

        

        
                
        // $data = InternshipSubmission::with('students', 'advisors', 'industries');
        $data = new InternshipSubmission();
        $data->student_id = $request->student_id;
        $data->industry_id = $request->industry_id;
        $data->status = $request->status;
        
        $data->url_acceptance = $url_acceptance;
        
        
        
        $data->save();
        
        
        // $data->student()->attach($request->student_id);
        
        
        





        $notification = array(
            'message' => 'Pengajuan PKL berhasil ditetapkan',
            'alert-type' => 'success'
        );
        
        return redirect()->route('student.internship-submission')->with($notification);
    }

       
}

 
