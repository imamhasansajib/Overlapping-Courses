<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Student;
use Image;
use Hash;

class StudentController extends Controller
{
    public function register(){
        return view('Admin.student.studentRegister');
    }

    public function store(Request $req){
        $name = $req->name;
        $email= $req->email;
        $department = $req->department;
        $batch = $req->batch;
        $password = $req->password;
        $repeat = $req->repeat;
        if($req->gender == 'Male'){
            $gender = 'Male';
        }
        else if($req->gender == 'Female'){
            $gender = 'Female';
        }
        else{
            $gender = "Other";
        }
        $originalImage= $req->file('image');

        $thumbnailImage = Image::make($originalImage);

        $thumbnailPath = public_path().'/thumbnail/';
        $originalPath = public_path().'/image/';

        $thumbnailImage->save($originalPath.time().$originalImage->getClientOriginalName());

        $thumbnailImage->resize(150,150);
        $thumbnailImage->save($thumbnailPath.time().$originalImage->getClientOriginalName());
        $address = $req->address;


        if($password != $repeat){
            return redirect()->back()->with('err', 'Password Mismatch');
        }
        else{
            $obj = new Student();
            $obj->name = $name;
            $obj->email = $email;
            $obj->department = $department;
            $obj->batch = $batch;
            $obj->password = Hash::make($password);
            $obj->gender = $gender;
            $obj->image=time().$originalImage->getClientOriginalName();
            $obj->address = $address;
            $obj->save();
            return redirect('students')->with('success', 'Student succesfully registered!');
        }
    }

    public function all(){
        $students = Student::all();
        return view('Admin.student.all', compact('students'));
    }

    public function edit($id){
        $student = Student::where('id', $id)->first();
        return view('Admin.student.edit', compact('student'));
    }

    public function update(Request $req, $id){
        $student = Student::find($id);

        $name = $req->name;
        $email= $req->email;
        $department = $req->department;
        $batch = $req->batch;
        if($req->gender == 'Male'){
            $gender = 'Male';
        }
        else if($req->gender == 'Female'){
            $gender = 'Female';
        }
        else{
            $gender = "Other";
        }
        $originalImage= $req->file('image');
        if($originalImage != null){
            $thumbnailImage = Image::make($originalImage);

            $thumbnailPath = public_path().'/thumbnail/';
            $originalPath = public_path().'/image/';

            $thumbnailImage->save($originalPath.time().$originalImage->getClientOriginalName());

            $thumbnailImage->resize(150,150);
            $thumbnailImage->save($thumbnailPath.time().$originalImage->getClientOriginalName());
            $image = time().$originalImage->getClientOriginalName();
        }else{
            $image = $student->image;
        }

        $address = $req->address;

        $student->name = $name;
        $student->email = $email;
        $student->department = $department;
        $student->batch = $batch;
        $student->gender = $gender;
        $student->image = $image;
        $student->address = $address;
        $student->save();
        return redirect()->back()->with('success', 'Student info succesfully updated!');
    }

    public function delete($id){
        $student = Student::find($id);
        $student->delete();
        return redirect()->back()->with('del', 'Student has been deleted');
    }

}
