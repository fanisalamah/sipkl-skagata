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
                
        $data = new InternshipSubmission();
        $data->student_id = $request->student_id;
        $data->industry_id = $request->industry_id;
        $data->url_acceptance = $request->
        $data->status = $request->status;
        
        
        // $data->student()->attach($request->student_id);
        
        $data->save();
        

        $notification = array(
            'message' => 'Pengajuan PKL berhasil ditetapkan',
            'alert-type' => 'success'
        );
        
        return redirect()->route('student.internship-submission')->with($notification);
    }

       
}

 
