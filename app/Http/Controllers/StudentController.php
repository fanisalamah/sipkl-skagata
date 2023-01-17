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
        return view('student.industry-view.industry-data', compact('$data'));
    }
    
    public function internshipSubmission () {
        $data['submissions'] = InternshipSubmission::with('students', 'advisors', 'industries')->get();
        $data['advisors'] = Advisor::all();
        $data['industries'] = Industry::all();
        return view('student.internship-view.internship-submission', compact('data'));
        
    }

    public function storeSubmission(Request $request) {
        $data = InternshipSubmission::with('students', 'advisors', 'industries')->get();
        $data->student()->attach($request->student_id);
     

        $notification = array(
            'message' => 'Pengajuan PKL berhasil ditetapkan',
            'alert-type' => 'success'
        );
        
        return redirect()->route('student.internship-submission')->with($notification);
    }

}
