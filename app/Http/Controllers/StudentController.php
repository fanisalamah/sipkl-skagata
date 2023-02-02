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
        $data = InternshipSubmission::with('students', 'advisors', 'industries')->get();
        $data->student()->attach($request->student_id);
        // $data->internshipSubmission =
        $data->save();
     

        $notification = array(
            'message' => 'Pengajuan PKL berhasil ditetapkan',
            'alert-type' => 'success'
        );
        
        return redirect()->route('student.internship-submission')->with($notification);
    }

       // create laravel function storeSubmission in controller 
}

 
