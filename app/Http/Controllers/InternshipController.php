<?php

namespace App\Http\Controllers;

use App\Models\Advisor;
use App\Models\Industry;
use App\Models\InternshipSubmission;
use App\Models\Student;
use App\Models\User;
use Illuminate\Http\Request;

class InternshipController extends Controller
{
    public function internshipSubmission () {
        $data['allDataSub'] = InternshipSubmission::with('students', 'advisors', 'industries')->where('status', '1')->get();
        $data['advisors'] = Advisor::all();
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

    public function submissionReject(Request $request, $id) {
    
        // $data = InternshipSubmission::find($id);
        // $data->text_rejection = $request->text_rejection;
        // $data->save();

        // $notification = array(
        //     'message' => 'Catatan berhasil ditambahkan',
        //     'alert-type' => 'success'
        // );
        
        // return redirect()->route('internship.submission')->with($notification);

    }


    public function internshipData() {
        return view('internship.internship-data');
    }

    public function internshipReport() {
        return view('internship.internship-report');
    }
}
