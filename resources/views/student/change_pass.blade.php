@extends('layouts.student')
@section('content')
<div class="row row-offcanvas row-offcanvas-right">
    <div class="content-wrapper">
        <div class="container shadow p-3 mb-4 bg-white rounded">
            @if(Session::has('success'))
            <div class="alert alert-success">
                {{ Session::get('success') }}
                <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span
                        aria-hidden="true">&times;</span></button>
            </div>
            @endif
            @if(Session::has('error'))
            <div class="alert alert-danger">
                {{ Session::get('error') }}
                <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span
                        aria-hidden="true">&times;</span></button>
            </div>
            @endif
            @if(Session::has('err'))
            <div class="alert alert-danger">
                {{ Session::get('err') }}
                <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span
                        aria-hidden="true">&times;</span></button>
            </div>
            @endif
            <h2>Change Password</h2>
            <form action="{{ url('change-pass') }}" method="post" enctype="multipart/form-data">
                {{ csrf_field() }}
                <div class="row">
                    <div class="col-6">
                        <div class="form-group">
                            <label class="form-label">Old Password:</label>
                            <input type="password" name="oldpass" placeholder="Enter your old password"
                                class="form-control">
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-6">
                        <div class="form-group">
                            <label class="form-label">New Password:</label>
                            <input type="password" name="newpass" placeholder="Enter your new password"
                                class="form-control">
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-6">
                        <div class="form-group">
                            <label class="form-label">Confirm New Password:</label>
                            <input type="password" name="repeat" placeholder="Repeat your new password"
                                class="form-control">
                        </div>
                    </div>
                </div>
                <button type="submit" class="btn btn-success">Update</button>
            </form>
            </d iv>
        </div>
    </div>

    @endsection