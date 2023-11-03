<?php

namespace App\Http\Controllers;

use App\Models\Student;
use Illuminate\Http\Request;
use Image;
use Hash;

class ProfileController extends Controller
{
    public function studentprofile(Request $request)
    {
        $student = Student::where('email', '=', session('useremail'))->first();
        return view('student.edit_profile', compact('student'));
    }
    public function updatestudentprofile(Request $req)
    {
        $obj = Student::where('email', '=', session('useremail'))->first();

        $name = $req->name;
        $email= $req->email;
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
            $image = $obj->image;
        }

        $address = $req->address;

        $obj->name = $name;
        $obj->email = $email;
        $obj->gender = $gender;
        $obj->image= $image;
        $obj->address = $address;
        $obj->save();
        return redirect()->back()->with('success', 'Profile succesfully updated!');
    }

    public function editpass(){
        return view('student.change_pass');
    }

    public function changepass(Request $req)
    {
        $obj2 = Student::where('email', '=', session('useremail'))->first();
        $data = Student::where('email', "=", session('useremail'))->first();

        $oldpass = $req->oldpass;
        $newpass = $req->newpass;
        $repeat = $req->repeat;

        if(Hash::check($oldpass, $data->password)){
            if($newpass != $repeat){
                return redirect()->back()->with('err', 'Password Mismatch');
            }
            else{
                $obj2->password = Hash::make($newpass);
                $obj2->save();
                return redirect()->back()->with('success', 'Password succesfully changed!');
            }
        }
        else{
            return redirect()->back()->with('error', 'Old password does not match!');
        }
    }
}