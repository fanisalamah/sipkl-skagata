<?php

namespace App\Http\Controllers;

use App\Helper\RedirectHelper;
use App\Models\Advisor;
use Brian2694\Toastr\Facades\Toastr;
use App\Models\Departement;
use App\Models\Industry;
use App\Models\InternshipSubmission;
use App\Models\Student;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;



class AdminController extends Controller
{
    public function index() {
        
        $data['student'] = Student::all();
        $data['advisor'] = Advisor::all();
        $data['industry'] = Industry::all();
        $data['internship_submission'] = InternshipSubmission::where('status', '=', 1)->get();
        
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
        $validator = Validator::make($request->all(), [
            'name' => 'required',
            'nip' => 'required',
            'departement_id' => 'required',
            'email' => 'required|unique:users',
            'password' => 'required'
            ]);

            if($validator->fails()){
                $errors = $validator->errors()->all(':message');
                return RedirectHelper::redirectBack(implode(' ',$errors), 'error');
    
            }

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
        $validator = Validator::make($request->all(), [
            'name' => 'required',
            'nis' => 'required',
            'password' => 'required',
            'departement_id' => 'required',
            'email' => 'required|unique:users',
            
        ]);
        
        if($validator->fails()){
            $errors = $validator->errors()->all(':message');
            return RedirectHelper::redirectBack(implode(' ',$errors), 'error');

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
        $validator = Validator::make($request->all(), [
            'name' => 'required',
            'nip' => 'required',
            'departement_id' => 'required',
            'email' => 'required|unique:users',
            ]);

            if($validator->fails()){
                $errors = $validator->errors()->all(':message');
                return RedirectHelper::redirectBack(implode(' ',$errors), 'error');
    
            }

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
        $validator = Validator::make($request->all(), [
            'name' => 'required',
            'nis' => 'required',
            'departement_id' => 'required',
            'email' => 'required|unique:users',
            
        ]);
        
        if($validator->fails()){
            $errors = $validator->errors()->all(':message');
            return RedirectHelper::redirectBack(implode(' ',$errors), 'error');

        }
        $data = Student::find($id);
        $data->departement_id = $request->departement_id;
        $data->name = $request->name;
        $data->nis = $request->nis;
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

    public function updatePassword(Request $request, $id) {
        $validator = Validator::make($request->all(), [
            'oldPassword' => 'required',
            'newPassword' => 'required',
            ]);

        if($validator->fails()){
                $errors = $validator->errors()->all(':message');
                return RedirectHelper::redirectBack(implode(' ',$errors), 'error');
    
            }

        $data = User::find($id);
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

