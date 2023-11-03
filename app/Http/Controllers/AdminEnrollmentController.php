<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Course;
use App\Models\Session;
use App\Models\PreEnrollment;
use App\Models\CourseLimitation;
use DB;

class AdminEnrollmentController extends Controller
{
    public function courseLimit(){
        $limitations = CourseLimitation::all();
        return view('Admin.enrollment.course_limitation', compact('limitations'));
    }

    public function editLimit($id){
        $limit = CourseLimitation::find($id);
        return view('Admin.enrollment.edit_course_limit', compact('limit'));
    }

    public function updateLimit(Request $req, $id){
        $limit = CourseLimitation::find($id);
        $limit->max_student = $req->max_student;
        $limit->max_credit = $req->max_credit;
        $limit->save();
        return redirect('course-limit')->with('success', 'Course Limitations Successfully Updated');
    }

    public function overlap(){
        $session = Session::select('id', 'name')->where("status", "=", "Running")->get();
        return view('Admin.enrollment.overlap_list',compact('session'));
    }

    public function overlaplist(Request $req, $session)
    {
         $session = Session::select('id', 'name')->where("status", "=", "Running")->get();
         $sess_id = $session[0]->id;
         $sess_name = $session[0]->name;
         //dd($s, $s[0]->id, $sess_name);
        // $data3 = Course::all();
        // $course = array();
        // $semester = array();
        // foreach ($data3 as $d) {
        //     $course[$d->title] = $d->id;
        //     // array_push($course, $d->id);
        //     $semester[$d->id] = $d->semester;
        // }
        // dd($course);
        // dd($semester);
        // $coursenumber = count($data3);
        // $data2 = PreEnrollment::where('session_id', '=', $data[0]->id)->get();
        // $enrolled = array();
        // foreach ($data2 as $d) {
        //     $enrolled[$d->student_id][] = $d->course_id;
        // }
        // dd($enrolled);
        // $overlap = array();

        // foreach (array_values($course) as $i) {
        //     foreach (array_values($course) as $j) {
        //         if ($semester[$i] == $semester[$j]) {
        //             $overlap[$i][$j] = 'Same Semester';
        //         } else
        //             $overlap[$i][$j] = 0;
        //     }
        // }
        // dd($overlap);
        // foreach (array_keys($enrolled) as $e) {

        //     $taken = count($enrolled[$e]);
        //     // dd($taken);
        //     for ($i = 0; $i < $taken - 1; $i++) {
        //         for ($j = $i + 1; $j < $taken; $j++) {
        //             $course1 = $enrolled[$e][$i];
        //             $course2 = $enrolled[$e][$j];
        //             // dd($course1, $course2);
        //             if ($course1 > $course2) {
        //                 $course1 = $course1 + $course2;
        //                 $course2 = $course1 - $course2;
        //                 $course1 = $course1 - $course2;
        //             }
        //             // dd($course1, $course2);
        //             if ($overlap[$course1][$course2] == 'Same Semester')
        //                 continue;
        //             $overlap[$course1][$course2] += 1;
        //             $overlap[$course2][$course1] = 'Already Counted';
        //         }
        //     }
        // }
        // dd($overlap);
        // dd($enrolled);
        $course=DB::select('SELECT max(semester)as sem,student_id as sid from pre_enrollments where session_id='.$sess_id.' group by(student_id);');
        //$course = PreEnrollment::select(DB::raw('max(semester) as sem, student_id as sid'))->where("session_id", "=", $session[0]->id)->groupBy('student_id')->get();

        $problem= array(array());
        $real=array(array(array()));

        foreach($course as $c)
       {
        $over=DB::select('SELECT * FROM pre_enrollments join courses on pre_enrollments.course_id=courses.id where session_id='.$sess_id.' and student_id='.$c->sid.' and courses.semester!='.$c->sem.';');
        //dd($course, $over);
        foreach($over as $ov)
        {
            if(!isset($problem[$c->sem][$ov->course_id]))
            $problem[$c->sem][$ov->course_id]=0;
            $problem[$c->sem][$ov->course_id]=$problem[$c->sem][$ov->course_id]+1;
            //echo $c->sem.' '.$ov->course.'<br>';
        }
       }

       for($i=0;$i<10;$i++)
        {
            for($j=0;$j<1000;$j++)
            {
                if(isset($problem[$i][$j]))
                {
                    $over=DB::select('select * from courses where id='.$j.'');
                    $s=$over[0]->title.'#'.$over[0]->code."#".$over[0]->credit;
                    if(!isset( $real[$problem[$i][$j]][$s][$i]))
                    $real[$problem[$i][$j]][$s][$i]=0;
                    $real[$problem[$i][$j]][$s][$i]++;
                }

            }
        }
        //dd($real);
        //arsort($real);
       //dd($course, $over, $problem, $real);

        //return view('Admin.enrollment.overlap_list', compact('course', 'session', 'real'));

        return response()->json([
            'data'=>$real,
            'message'=>$course? 'course found' : 'course not found'
        ]);
    }

}
