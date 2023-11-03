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
                    <h2>Edit Session</h2>
                    <form action="{{ url('update-session/'.$session->id) }}" method="post">
                        {{ csrf_field() }}

                        <div class="row">
                            <div class="col">
                                <div class="form-group">
                                    <label>Name:</label>
                                    <input type="text" class="form-control" value="{{ $session->name }}" name="name"
                                        required>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col">
                                <div class="form-group">
                                    <label>Session Status:</label>
                                    <select name="status" class="form-control" required>
                                        <option value="Completed" @if ($session->status
                                            =="Completed")selected="selected"
                                            @endif>Completed</option>
                                        <option value="Running" @if ($session->status == "Running")selected="selected"
                                            @endif>Running</option>
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