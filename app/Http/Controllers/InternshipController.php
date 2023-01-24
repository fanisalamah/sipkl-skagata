<?php

namespace App\Http\Controllers;

use App\Models\Advisor;
use App\Models\Departement;
use App\Models\Industry;
use App\Models\InternshipLogbooks;
use App\Models\InternshipMonthlyReport;
use App\Models\InternshipSubmission;
use App\Models\Student;
use App\Models\User;
use Illuminate\Http\Request;


class InternshipController extends Controller
{
    public function internshipSubmission (Request $request) {
        $data['allDataSub'] = InternshipSubmission::with('students', 'advisors', 'industries')->where('status', '1')->get();
        // $data['advisors'] = Advisor::all();
        // $data['departements'] = Departement::all();
        // $data['students'] = Student::with('departements');
        return view('internship.internship-submission', $data);
        
    }

    public function submissionAccept($id) {
        $data = InternshipSubmission::find($id);
        $data->status = '2';
        $data->save();
        // $data->advisors()->attach($request->advisor_id);
    
        // $notification = array(
        //     'message' => 'Advisor berhasil ditetapkan',
        //     'alert-type' => 'success'
        // );
        
        return redirect()->route('internship.submission');

    }

    public function submissionReject($id) {
    
        $data = InternshipSubmission::find($id);
        $data->status = '3';
        $data->save();
        
        return redirect()->route('internship.submission');
    }


    public function internshipData() {

        $data['internships'] = InternshipSubmission::with('students', 'advisors', 'industries')->where('status', '2')->get();
        $data['advisors'] = Advisor::all();
        // $data['departements'] = Departement::all();
        // $data['students'] = Student::with('departements');
        return view('internship.internship-data', $data);
    }

    public function internshipReport() {
        return view('internship.internship-report');
    }

    public function internshipLogbook($id) {
        $data['internships'] = InternshipSubmission::find($id);
        $data['logbooks'] = InternshipLogbooks::all()->where('internship_submission_id', $id);
        return view('internship.internship-logbooks', $data);

    }

    public function monthlyReport() {
        $data['monthlyReports'] = InternshipMonthlyReport::all();

        return view('internship.internship-monthly-report', $data);

    }
}
    