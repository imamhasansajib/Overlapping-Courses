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
                <div class="alert alert-danger my-2">
                    {{ Session::get('msg') }}
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span
                            aria-hidden="true">&times;</span></button>
                </div>
                @endif
                <div class="container mt-3">
                    <div class="row">
                        <div class="col-md-4 mb-4">
                            <div class="card border-left-primary shadow h-100 py-2">
                                <div class="card-body">
                                    <div class="row no-gutters align-items-center">
                                        <div class="col mr-2">
                                            <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                                                Total Course
                                            </div>
                                            <div class="h5 mb-0 font-weight-bold text-gray-800">{{ $total_course }}
                                            </div>
                                        </div>
                                        <div class="col-auto">
                                            <i class="fa fa-book fa-2x text-success"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4 mb-4">
                            <div class="card border-left-info shadow h-100 py-2">
                                <div class="card-body">
                                    <div class="row no-gutters align-items-center">
                                        <div class="col mr-2">
                                            <div class="text-xs font-weight-bold text-info text-uppercase mb-1">
                                                Total student
                                            </div>
                                            <div class="h5 mb-0 font-weight-bold text-gray-800">{{ $total_student }}
                                            </div>
                                        </div>
                                        <div class="col-auto">
                                            <i class="fas fa-user-friends fa-2x text-info"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4 mb-4">
                            <div class="card border-left-secondary shadow h-100 py-2">
                                <div class="card-body">
                                    <div class="row no-gutters align-items-center">
                                        <div class="col mr-2">
                                            <div class="text-xs font-weight-bold text-info text-uppercase mb-1">
                                                Total enrollment
                                            </div>
                                            <div class="h5 mb-0 font-weight-bold text-gray-800">{{ $total_enrollment }}
                                            </div>
                                        </div>
                                        <div class="col-auto">
                                            <i class="fas fa-bell fa-2x text-danger "></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>


                    <div class="row">
                        <div class="col-lg-5 my-2">
                            <div class="card p-1 rounded" style="width:400px">
                                <div class="card-header">
                                    <h2>Welcome, {{ Session::get('username') }}</h2>

                                    <img class="card-img-top" src="thumbnail/{{ Session::get('userimage') }}"
                                        style="width:70%">
                                    <div class="card-body">
                                        <h4 class="card-title">{{ Session::get('username') }}</h4>
                                        <p class="card-text">Admin has access of <b>Students</b>, <b>Courses</b>,
                                            <b>Sessions</b>,
                                            <b>Limitations</b>, <b>Overlap List</b>
                                        </p>
                                        <a href="{{ url('admin-profile') }}" class="btn btn-primary">See Profile</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-7 my-2">
                            <div class="card w-100 p-1 rounded" style="width:400px">
                                <div class="card-header">
                                    <h4 class="text-center"> Basic Info </h4>
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