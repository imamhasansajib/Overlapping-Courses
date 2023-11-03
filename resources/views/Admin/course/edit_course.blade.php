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
                    <h2>Edit Course</h2>
                    <form action="{{ url('update-course/'.$course->id) }}" method="post">
                        {{ csrf_field() }}

                        <div class="row">
                            <div class="col">
                                <div class="form-group">
                                    <label>Course Code:</label>
                                    <input type="text" class="form-control" value="{{ $course->code }}" name="code">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col">
                                <div class="form-group">
                                    <label>Course Title:</label>
                                    <input type="text" class="form-control" value="{{ $course->title }}" name="title">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col">
                                <div class="form-group">
                                    <label>Semester:</label>
                                    <select name="semester" class="form-control">
                                        <option value="1st" @if ($course->semester == "1st")selected="selected"
                                            @endif>1st</option>
                                        <option value="2nd" @if ($course->semester == "2nd")selected="selected"
                                            @endif>2nd</option>
                                        <option value="3rd" @if ($course->semester == "3rd")selected="selected"
                                            @endif>3rd</option>
                                        <option value="4th" @if ($course->semester == "4th")selected="selected"
                                            @endif>4th</option>
                                        <option value="5th" @if ($course->semester == "5th")selected="selected"
                                            @endif>5th</option>
                                        <option value="6th" @if ($course->semester == "6th")selected="selected"
                                            @endif>6th</option>
                                        <option value="7th" @if ($course->semester == "7th")selected="selected"
                                            @endif>7th</option>
                                        <option value="8th" @if ($course->semester == "8th")selected="selected"
                                            @endif>8th</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col">
                                <div class="form-group">
                                    <label>Course Type:</label>
                                    <select name="type" class="form-control">
                                        <option value="Theory" @if ($course->type == "Theory")selected="selected"
                                            @endif>Theory</option>
                                        <option value="Lab" @if ($course->type == "Lab")selected="selected"
                                            @endif>Lab</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col">
                                <div class="form-group">
                                    <label>Course Credit:</label>
                                    <select name="credit" class="form-control">
                                        <option value="1.5" @if ($course->credit == "1.5")selected="selected"
                                            @endif>1.5</option>
                                        <option value="2" @if ($course->credit == "2")selected="selected"
                                            @endif>2</option>
                                        <option value="3" @if ($course->credit == "3")selected="selected"
                                            @endif>3</option>
                                        <option value="4" @if ($course->credit == "4")selected="selected"
                                            @endif>4</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <button type="submit" class="btn btn-success">Submit</button>
                        <a href="{{ url('courses') }}" class="btn btn-primary btn-sm">Back to Courses</a>
                    </form>
                </div>

            </div>
        </div>
    </div>
</div>

@endsection