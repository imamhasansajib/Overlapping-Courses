<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Student;
use App\Models\Course;
use App\Models\PreEnrollment;
use DB;
use Session;

class AuthController extends Controller
{
    public function login(){
        return view('login');
    }

    public function loginstore(Request $req){
       $email = $req->email;
       $password = $req->password;
       // SELECT * from users where email='' AND password=''

       $user = DB::table('students')
          ->where('email', '=', $email)
          //->where('password', '=', $password)
          ->first();
        if($user){
                // set some values in session
            $req->session()->put('username', $user->name);
            $req->session()->put('useremail', $user->email);
            $req->session()->put('userimage', $user->image);
            return redirect('dashboard');
        }
        else{
            return redirect()->back()->with('wrong', 'Incorrect Email or Password');
        }
    }

    public function dashboard(Request $req){
        if(Session::has('useremail') && Session::get('useremail')=='admin@gmail.com'){

            $total_course = Course::count();
            $total_student = Student::count();
            $total_enrollment = PreEnrollment::count();
            //dd($total_course, $total_student, $total_enrollment);
            return view('Admin.home', compact('total_course', 'total_student', 'total_enrollment'));
        }
        else {
            return view('student.home');
        }
    }

    public function logout()
    {
        // session()->forget('username');
        session()->flush();
        return redirect('login')->with('succes', 'You have been successfully Logged Out.');
    }
}
