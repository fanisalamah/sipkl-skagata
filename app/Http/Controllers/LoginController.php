<?php

namespace App\Http\Controllers;

use App\Models\Advisor;
use App\Models\Student;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class LoginController extends Controller
{       
    public function index() {
      $data['user'] = User::all();
      $data['advisor'] = Advisor::all();
      $data['student'] = Student::all();
      
        return view('admin.index', $data);
    }
   

    public function postLogin(Request $request) {
        if(Auth::guard('student')->attempt(['email' => $request->email, 'password' => $request->password])) {
            return redirect()->route('student.dashboard');
        } else if(Auth::guard('web')->attempt(['email' => $request->email, 'password' => $request->password])) {
            return redirect()->route('admin.dashboard');
        }
        else if(Auth::guard('advisor')->attempt(['email' => $request->email, 'password' => $request->password])) {
          return redirect()->route('advisor.dashboard');
      } else {
        $notification = array(
          'message' => 'Login gagal. Periksa data email dan password yang digunakan',
          'alert-type' => 'error'
      );
        return redirect()->route('login')->with($notification);
      }
    }

    public function logout() {
      if(Auth::guard('student')->check()) {
        Auth::guard('student')->logout();
      } else if(Auth::guard('web')->check()){
        Auth::guard('web')->logout();
      }
      else if(Auth::guard('advisor')->check()){
        Auth::guard('advisor')->logout();
      }
      return redirect('/');
    }

  }
 