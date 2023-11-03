@extends('layouts.default')
@section('content')
<div class="row row-offcanvas row-offcanvas-right">
    <div class="content-wrapper">
        <div class="container shadow p-3 mb-4 bg-white rounded">
            <div class="row">
                <div class="col-lg-3 col-sm-12 col-md-12"></div>
                <div class="col-lg-2 col-sm-6 col-md-5 mx-auto text-center">
                    <a href="" style="text-decoration:none;"><img src="{{ asset('img/puc_logo.png') }}"
                            class="img-fluid">
                    </a>
                </div>
                <div class="col-lg-4 col-sm-12 col-md-12 mt-3">
                    <a href="index.php" style="text-decoration:none; color : black; text-align:center">
                        <h1>Premier University</h1>
                        <h6>Center of Excellence for Quality Learning</h6>
                    </a>
                </div>
                <div class="col-lg-3 col-sm-12 col-md-12"></div>
            </div>
        </div>
        <div class="card">
            <div class="card-body">
                <div class="container shadow bg-white">
                    @if(Session::has('success'))
                    <div class="alert alert-success">
                        {{ Session::get('success') }}
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
                    <h2>Create Course</h2>
                    <form action="{{ url('store-course') }}" method="post">
                        {{ csrf_field() }}

                        <div class="row">
                            <div class="col">
                                <div class="form-group">
                                    <label>Course Code:</label>
                                    <input type="text" class="form-control" placeholder="Enter course code" name="code"
                                        required>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col">
                                <div class="form-group">
                                    <label>Course Title:</label>
                                    <input type="text" class="form-control" placeholder="Enter course title"
                                        name="title" required>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col">
                                <div class="form-group">
                                    <label>Semester:</label>
                                    <select name="semester" class="form-control" required>
                                        <option value="1">1st</option>
                                        <option value="2">2nd</option>
                                        <option value="3">3rd</option>
                                        <option value="4">4th</option>
                                        <option value="5">5th</option>
                                        <option value="6">6th</option>
                                        <option value="7">7th</option>
                                        <option value="8">8th</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col">
                                <div class="form-group">
                                    <label>Course Type:</label>
                                    <select name="type" class="form-control" required>
                                        <option value="Theory">Theory</option>
                                        <option value="Lab">Lab</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col">
                                <div class="form-group">
                                    <label>Course Credit:</label>
                                    <select name="credit" class="form-control" required>
                                        <option value="1">1</option>
                                        <option value="1.5">1.5</option>
                                        <option value="2">2</option>
                                        <option value="3">3</option>
                                        <option value="4">4</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <button type="submit" class="btn btn-success">Submit</button>
                    </form>
                </div>

            </div>
        </div>
    </div>
</div>

@endsection
