<?php

namespace App\Http\Controllers;

use App\Models\Departement;
use App\Models\Student;
use Illuminate\Http\Request;

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
        
        return redirect()->route('advisor.student.data')->with($notification);
    }

    public function editStudent($id) {
        $editData['users']= Student::find($id);
        $editData['departements'] = Departement::all();
        return view('advisor.student-view.student-edit', compact('editData'));
    }

    public function updateStudent(Request $request, $id) {
        
    }


}
