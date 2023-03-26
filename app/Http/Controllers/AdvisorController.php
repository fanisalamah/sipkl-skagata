<?php

namespace App\Http\Controllers;

use App\Helper\RedirectHelper;
use App\Models\Departement;
use App\Models\InternshipSubmission;
use App\Models\Student;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
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
        
        return redirect()->route('advisor.internship.submission')->with($notification);
    }

    public function internshipMonitoring() {
        $data['internships'] = InternshipSubmission::with('students', 'industries')
        ->whereHas('students', function ($query) {
            $query->where('status', '=', 2)->where('advisor_id', '=', Auth::user()->id );
        })->get();

        return view('advisor.internship-view.internship-monitoring', $data);
    }

}
