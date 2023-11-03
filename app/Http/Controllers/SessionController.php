<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Session;

class SessionController extends Controller
{
    public function createSession()
    {
        return view('Admin.session.create_session');
    }

    public function store(request $req)
    {
        $obj = new Session();
        $obj->name = $req->name;
        $obj->status = $req->status;
        // dd($obj1);
        $obj->save();
        if ($obj)
            return back()->with('success', 'Session Successfully Created');
        else
            return back()->with('err', 'Cannot Create Session');
    }

    public function sessionlist()
    {
        $sessions = Session::all();
        return view('Admin.session.all_sessions', compact('sessions'));
    }

    public function edit($id)
    {
        $session = Session::find($id);
        return view('Admin.session.edit_session', compact('session'));
    }

    public function update(Request $req, $id)
    {
        $session = Session::find($id);
        $session->name = $req->name;
        $session->status = $req->status;
        $session->save();
        return redirect('sessions')->with('success', 'Session Successfully Updated');
    }
}