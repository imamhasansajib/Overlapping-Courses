<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Course;

class CourseController extends Controller
{
    public function createCourse()
    {
        return view('admin.course.create_course');
    }

    public function store(request $req)
    {
        $obj = new Course();
        $obj->code = $req->code;
        $obj->title = $req->title;
        $obj->semester = $req->semester;
        $obj->type = $req->type;
        $obj->credit = $req->credit;
        //dd($obj);
        $obj->save();
        if ($obj)
            return back()->with('success', 'Course Successfully Created');
        else
            return back()->with('err', 'Cannot Create Course');
    }

    public function courselist()
    {
        $courses = Course::all();
        return view('admin.course.all_course', compact('courses'));
    }

    public function edit($id)
    {
        $course = Course::find($id);
        return view('admin.course.edit_course', compact('course'));
    }

    public function update(Request $req, $id)
    {
        $course = Course::find($id);
        $course->code = $req->code;
        $course->title = $req->title;
        $course->semester = $req->semester;
        $course->type = $req->type;
        $course->credit = $req->credit;
        $course->save();
        return back()->with('success', 'Course Successfully Updated');
    }

    public function delete($id)
    {
        Course::find($id)->delete();
        return redirect()->back()->with('success', 'Course Deleted Successfully');
    }
}
