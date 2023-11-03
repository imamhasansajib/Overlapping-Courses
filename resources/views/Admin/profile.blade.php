@extends('layouts.default')
@section('title')
<title>Dashboard - {{ Session::get('username') }}</title>
@endsection
@section('content')
<div class="row row-offcanvas row-offcanvas-right">
    <div class="content-wrapper">
        <div class="container shadow p-3 mb-4 bg-white rounded">
            <div class="container">
                @if(Session::has('msg'))
                <div class="alert alert-success my-2">
                    {{ Session::get('msg') }}
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span
                            aria-hidden="true">&times;</span></button>
                </div>
                @endif
                <div class="container mt-3">
                    <div class="row">
                        <div class="col-lg-12 my-2">
                            <div class="card w-100 p-1 rounded mb-4" style="width:400px">
                                <div class="card-header">
                                    <h4 class="text-center">Admin Profile</h4>
                                </div>
                                <div class="card-body text-center">
                                    <div class="container">
                                        <div class="row">
                                            <div class="col-lg-1 mt-1"> </div>
                                            <div class="col-lg-5  mt-1 dv pt-3">
                                                <i class="fa fa-user" aria-hidden="true"></i><br>
                                                <h5>{{ Session::get('username') }}</h5> <br>
                                            </div>
                                            <div class="col-lg-1  mt-1"> </div>
                                            <div class="col-lg-5 dv  mt-1 pt-3">
                                                <i class="fa fa-envelope" aria-hidden="true"></i><br>
                                                <h5>{{ Session::get('useremail') }}</h5> <br>
                                            </div>
                                            <div class="col-lg-1  mt-1"> </div>
                                            <div class="col-lg-5 dv mt-1 pt-3">
                                                <i class="fa fa-user-plus" aria-hidden="true"></i></br>
                                                <h5>Admin</h5> <br>
                                            </div>
                                            <div class="col-lg-1  mt-1"> </div>
                                            <div class="col-lg-5 dv  mt-1 pt-3">
                                                <i class="fa fa-university" aria-hidden="true"></i><br>
                                                <h5 class="text-center">Computer science and Engineering</h5><br>
                                            </div>
                                            <div class="col-lg-1  mt-1"> </div>
                                            <div class="col-lg-5 dv  mt-1 pt-3">
                                                <i class="fa fa-venus-mars" aria-hidden="true"></i><br>
                                                <h5 class="text-center">Male</h5><br>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

</div>
@endsection