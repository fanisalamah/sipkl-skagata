<?php

namespace App\Http\Controllers;

use App\Helper\RedirectHelper;
use App\Models\Advisor;
use App\Models\Departement;
use App\Models\InternshipLogbooks;
use App\Models\InternshipMonthlyReport;
use App\Models\InternshipReports;
use App\Models\InternshipSubmission;
use App\Models\Student;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class AdvisorController extends Controller
{
    public function index() {
        return view('advisor.index');
    }

    public function studentData() {
        $data['allData'] = Student::all();
        return view('advisor.student-view.student-data', $data);
    }

    public function addStudent() {
        $data['allData'] = Student::all();
        $data['departements'] = Departement::all();
        return view('advisor.student-view.student-add', $data );
    }

    public function storeStudent(Request $request) {
        $validator = Validator::make($request->all(), [
            'nis' => 'required',
            'name' => 'required',
            'email' => 'required|unique:users',
            'password' => 'required',
            'departement_id' => 'required',
        ]);

        if($validator->fails()) {
            $errors = $validator->errors()->all(':message');
            return RedirectHelper::redirectBack(implode(' ', $errors), 'error');
        }

        $data = new Student();
        $data->departement_id = $request->departement_id;
        $data->name = $request->name;
        $data->nis = $request->nis;
        $data->email = $request->email;
        $data->password = bcrypt($request->password);
        $data->assignRole('student');
        $data->save();

        $notification = array(
            'message' => 'Data Siswa berhasil diinput',
            'alert-type' => 'success'
        );
        
        return redirect()->route('advisor.student.data')->with($notification);
    }

    public function editStudent($id) {
        $editData['users']= Student::find($id);
        $editData['departements'] = Departement::all();
        return view('advisor.student-view.student-edit', compact('editData'));
    }

    public function updateStudent(Request $request, $id) {
        $validator = Validator::make($request->all(), [
            'nis' => 'required|unique:users',
            'name' => 'required',
            'email' => 'required|unique:users',
            'departement_id' => 'required',
        ]);

        if($validator->fails()) {
            $errors = $validator->errors()->all(':message');
            return RedirectHelper::redirectBack(implode(' ', $errors), 'error');
        }

        $data = Student::find($id);
        $data->departement_id = $request->departement_id;
        $data->name = $request->name;
        $data->email = $request->email;
        $data->save();

        $notification = array(
            'message' => 'Data Siswa berhasil diupdate',
            'alert-type' => 'success'
        );
        return redirect()->route('advisor.student.data')->with($notification);
    }

    public function deleteStudent($id)  {
        $user = Student::find($id);
        $user->delete();
        return redirect()->route('advisor.student.data');
    }

    public function internshipSubmission() {
        $data['allDataSub'] = InternshipSubmission::with('students', 'industries')
        ->whereHas('students', function ($query) {
            $query->where('status', '=', 2)->where('advisor_id', '=', null);
            
        })->get();
        $data['departements'] = Departement::all();
        
        
        return view('advisor.internship-view.internship-submission', $data);
    }

    public function filterJurusan($id) {
        $data['departements'] = Departement::all();
        
        switch($id) {
            case 1:
                $data['allDataSub'] = InternshipSubmission::whereHas('students.departement', function ($query) {
                    $query->where('id', '=', 1)->where('advisor_id', '=', null);
                })->get();
                break;

                case 2:
                    $data['allDataSub'] = InternshipSubmission::whereHas('students.departement', function ($query) {
                        $query->where('id', '=', 2)->where('advisor_id', '=', null);
                    })->get();
                    break;
                case 3:
                    $data['allDataSub'] = InternshipSubmission::whereHas('students.departement', function ($query) {
                        $query->where('id', '=', 3)->where('advisor_id', '=', null);
                    })->get();
                    break;    
                case 4:
                    $data['allDataSub'] = InternshipSubmission::whereHas('students.departement', function ($query) {
                        $query->where('id', '=', 4)->where('advisor_id', '=', null);
                    })->get();
                    break;
                default:
                    $data['allDataSub'] = InternshipSubmission::with('students', 'industries')
                    ->whereHas('students', function ($query) {
                    $query->where('status', '=', 2)->where('advisor_id', '=', null);
            
                    })->get();
                    

                    
        }

        return view('advisor.internship-view.internship-submission', $data);
    }
    
    public function updateSubmission(Request $request) {
        
        $selected = $request->input('selected');
        $value = Auth::user()->id;
        foreach ($selected as $id) {
            InternshipSubmission::where('id', $id)->update(['advisor_id' => $value ]);
        }
        $notification = array(
            'message' => 'Siswa berhasil ditambahkan ke daftar bimbingan',
            'alert-type' => 'success'
        );
        
        return redirect()->route('advisor.internship.monitoring')->with($notification);
    }

    public function internshipMonitoring() {
        $data['internships'] = InternshipSubmission::with('students', 'industries')
        ->whereHas('students', function ($query) {
            $query->where('status', '=', 2)->where('advisor_id', '=', Auth::user()->id );
        })->get();

        return view('advisor.internship-view.internship-monitoring', $data);
    }

    public function personalMonitoring($id) {
        $data['internship'] = InternshipSubmission::find($id);
        $data['logbooks'] = InternshipLogbooks::whereHas('internshipSubmission',
        function ($query) use ($id) {
            $query->where('id', $id);
        })->get();
        
        return view('advisor.internship-view.personal-monitoring', $data);
    }

    public function deleteMonitoring($id) {
        $data = InternshipSubmission::find($id);
        $data->advisor_id = null;
        $data->save();

        $notification = array(
            'message' => 'Siswa berhasil dihapus dari daftar bimbingan',
            'alert-type' => 'success'
        );
        return redirect()->route('advisor.internship.monitoring')->with($notification);        
    }

    public function updateNote(Request $request, $id) {
        $logbook = InternshipLogbooks::find($id);
        $logbook->note = $request->note;
        $logbook->save();

        $notification = array(
            'message' => 'Catatan berhasil ditambahkan',
            'alert-type' => 'success'
        );
        
        return redirect()->back()->with($notification);    
    }
    
    public function monthlyReport() {
        $id = Auth::user()->id;
        $data['monthlyReports'] = InternshipMonthlyReport::whereHas('internshipSubmission', function ($query) use ($id) {
            $query->where('advisor_id', $id);
        })->get();

       
        return view('advisor.internship-view.monthly-report', $data);
    }

    public function finalReport() {
        $id = Auth::user()->id;
        $data['reports'] = InternshipReports::whereHas('internshipSubmission', function ($query) use ($id) {
            $query->where('advisor_id', $id);
        })->get();
        return view('advisor.internship-view.final-report', $data);
    }

    public function updateScore(Request $request, $id) {
        $report = InternshipReports::find($id);
        $nilai_1 = $request->disiplin;
        $nilai_2 = $request->kerjasama;
        $nilai_3 = $request->inisiatif;
        $nilai_4 = $request->tanggungjawab;
        $nilai_5 = $request->kejujuran;
        $nilai_6 = $request->aspek1;
        $nilai_7 = $request->aspek2;
        $nilai_8 = $request->aspek3;
        $nilai_9 = $request->aspek4;
        $nilai_10 = $request->aspek5;

        $report->score_industry = ($nilai_1 + $nilai_2 + $nilai_3 + $nilai_4 + $nilai_5) / 5;
        $report->score_school = ($nilai_6 + $nilai_7 + $nilai_8 + $nilai_9 + $nilai_10) / 5;;
        $report->final_score = ($report->score_industry + $report->score_school)/2;
        $report->save();

        $notification = array(
            'message' => 'Nilai berhasil ditambahkan',
            'alert-type' => 'success'
        );
        //MASIH PR
        return redirect()->back()->with($notification); 
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

        $data = Advisor::find($id);
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
