<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Student;
use App\Models\Session;
use App\Models\Course;
use App\Models\CourseLimitation;
use App\Models\PreEnrollment;
use DB;


class StudentEnrollmentController extends Controller
{
    public function enrollcourse(request $request)
    {
        $data = Session::select('name')->where("status", "=", "Running")->get();
        // dd($data);
            $data2 = Course::orderBy('semester', 'asc')->get();

        // session()->forget('successmessage');
        // session()->forget('errormessage');
        return view('student.enroll_course', compact('data2', 'data'));
    }

    public function enrollmentfinal(request $req)
    {
        $session_id = Session::select('id')->where("status", "=", "Running")->get();

        $student_id = Student::select('id')
                ->where('email', session('useremail'))
                ->first();

        $enrolledcredit = PreEnrollment::leftJoin('courses as c', 'course_id', 'c.id')
                ->where('student_id', '=', $student_id->id)->where('session_id', '=', $session_id[0]->id)->sum('c.credit');

        //dd($t);
        $course_id = $req->slectcourse;
        $m=max($req->slectcourse);
        $semester = DB::select('SELECT *
        FROM courses WHERE id='.$m.';');

        $examtype = $req->examtype;
        // dd(count($course_id));
        if (!$course_id) {
            return redirect()->back()->with('errormsg', 'Select at least One Course');
        }
        $limit = CourseLimitation::all()->first();
        // dd($limit);
        foreach ($course_id as $value) {
            // dd($examtype[$value]);
            $obj = new PreEnrollment;
            $obj->semester = $semester[0]->semester;
            $obj->course_id = $value;
            $obj->type = $examtype[$value];
            $obj->session_id = $session_id[0]->id;
            $obj->student_id = $student_id->id;
            $obj->status = 'Pending';
            // dd($obj);
            $credit = Course::where('id', '=', $value)->select('credit')->first();
            $enrolledcredit = $credit->credit + $enrolledcredit;
            $enrolledstudent = PreEnrollment::where('course_id', '=', $value)->where('session_id', '=', $session_id[0]->id)->count();
            // echo $credit->credit;
            if ($enrolledstudent < $limit->max_student) {
                if ($enrolledcredit <= $limit->max_credit) {
                    $obj->save();
                    session()->forget("errormessage.$value");
                    session()->put("successmessage.$value", "Successfully Added");
                } else {
                    $enrolledcredit = $enrolledcredit - $credit->credit;
                    session()->forget("successmessage.$value");
                    session()->put("errormessage.$value", "Maximum Credit Exceeded");

                }
            } else {
                $enrolledcredit = $enrolledcredit - $credit->credit;
                session()->forget("successmessage.$value");
                session()->put("errormessage.$value", "Maximum Student Already Enrolled");

            }
        }
        //return redirect('checkrequests')->with('success', 'Successfully Enrolled!');
        return back();
    }

     public function checkrequests()
    {
        $session_id = Session::select('id', 'name')->where("status", "=", "Running")->get();

        $student_id = Student::select('id')
                ->where('email', session('useremail'))
                ->first();

        $data = PreEnrollment::leftJoin('courses as c', 'pre_enrollments.course_id', 'c.id')
            ->leftJoin('sessions as s', 's.id', 'pre_enrollments.session_id')
            ->select('c.title as title', 'c.semester as semester', 'c.code as code', 'c.type as coursetype', 'c.credit as credit', 'session_id', 'pre_enrollments.status', 'pre_enrollments.type', 'pre_enrollments.id')
            ->where('student_id', '=', $student_id->id)
            ->where('s.status', '=', "Running")
            ->orderby('pre_enrollments.created_at')
            ->get();
        //dd($data);
        $enrolledcredit = 0;
        // $data1 = Course::leftJoin('semesters as s', 'semester_id', 's.id')
        //     ->leftJoin('pre_enrollments as e', 'courses.id', 'e.course_id')
        //     ->select('s.semester_no as semester', 's.id as id')->where('student_id', '=', $student_id->id)
        //     ->get();

        // $data1 = Course::leftJoin('pre_enrollments as e', 'courses.id', 'e.course_id')
        //     ->select('courses.semester')->where('student_id', '=', $student_id->id)->where('session_id', '=', $session_id[0]->id)
        //     ->get();
        //dd($data1);
        foreach ($data as $value) {
            $enrolledcredit += $value->credit;
        }
        $data->enrolledcredit = $enrolledcredit;
        // dd($enrolledcredit);
        $data->session_name = $session_id[0]->name;
        //dd($data);
        return view('student.check_request', compact('data'));
    }

    public function deleteencourse($id)
    {
        PreEnrollment::where('id', '=', $id)->delete();
        return redirect()->back()->with('success', 'Course Deleted Successfully');
    }
}