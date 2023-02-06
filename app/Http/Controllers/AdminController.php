<?php

namespace App\Http\Controllers;

use App\Models\Advisor;
use Brian2694\Toastr\Facades\Toastr;
use App\Models\Departement;
use App\Models\Industry;
use App\Models\InternshipSubmission;
use App\Models\Student;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;



class AdminController extends Controller
{
    public function index() {
        
        $data['student'] = Student::all();
        $data['advisor'] = Advisor::all();
        $data['industry'] = Industry::all();
        $data['internship_submission'] = InternshipSubmission::all();
        
        return view('admin.index', $data);
    }

    public function Logout() {

        Auth::logout();
        return Redirect()->route('login');
    }

    public function advisorData() {
        $data['allData'] = Advisor::all();
        return view('advisor.advisor-data', $data);
    }

    public function studentData() {
        $data['allData'] = Student::all();
        return view('student.student-data', $data);
    }

    public function addAdvisor() {
        $data['allData'] = Advisor::all();
        $data['departements'] = Departement::all();

        return view('advisor.advisor-add', $data );
    
    }

    public function addStudent() {
        $data['allData'] = Student::all();
        $data['departements'] = Departement::all();

        return view('student.student-add', $data );
    
    }

    public function storeAdvisor(Request $request) {
            $validatedData = $request->validate([
                'departement_id' => 'required',
                'email' => 'required|unique:users',
                'name' => 'required',

            ]);

        $data = new Advisor();
        $data->departement_id = $request->departement_id;
        $data->name = $request->name;
        $data->nip = $request->nip;
        $data->email = $request->email;
        $data->password = bcrypt($request->password);
        $data->assignRole('advisor');
        $data->save();

        $notification = array(
            'message' => 'Data Advisor berhasil diinput',
            'alert-type' => 'success'
        );
        
        return redirect()->route('advisor.data')->with($notification);

    }

    public function storeStudent(Request $request) {
        $validatedData = $request->validate([
            'departement_id' => 'required',
            'email' => 'required|unique:users',
            'name' => 'required',

        ]);

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
        
        return redirect()->route('student.data')->with($notification);

    }

    public function editAdvisor($id) {
        $editData['users']= Advisor::find($id);
        $editData['departements'] = Departement::all();


        return view('advisor.advisor-edit', compact('editData'));
    }

    public function editStudent($id) {
        $editData['users']= Student::find($id);
        $editData['departements'] = Departement::all();
        return view('student.student-edit', compact('editData'));
    }

    public function updateAdvisor(Request $request, $id) {

        $data = Advisor::find($id);
        $data->departement_id = $request->departement_id;
        $data->name = $request->name;
        $data->nip = $request->nip;
        $data->email = $request->email;
        $data->save();

        $notification = array(
            'message' => 'Data Advisor berhasil diupdate',
            'alert-type' => 'success'
        );
        return redirect()->route('advisor.data')->with($notification);
        
    }

    public function updateStudent(Request $request, $id) {

        $data = Student::find($id);
        $data->departement_id = $request->departement_id;
        $data->name = $request->name;
        $data->email = $request->email;
        $data->save();

        $notification = array(
            'message' => 'Data Siswa berhasil diupdate',
            'alert-type' => 'success'
        );
        return redirect()->route('student.data')->with($notification);
        
    }


    public function deleteAdvisor($id) {
        $user = Advisor::find($id);
        $user->delete();

        return redirect()->route('advisor.data');
    }
    
    public function deleteStudent($id) {
        $user = Student::find($id);
        $user->delete();

        return redirect()->route('student.data');
    }
}

