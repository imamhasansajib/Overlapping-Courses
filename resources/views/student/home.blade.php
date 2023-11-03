@extends('layouts.student')
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
                    <h2>Welcome</h2>
                    
                    <div class="card" style="width:400px">
                        <img class="card-img-top" src="thumbnail/{{ Session::get('userimage') }}" style="width:70%">
                        <div class="card-body">
                            <h4 class="card-title">{{ Session::get('username') }}</h4>
                            <p class="card-text">You Can Pre-Enroll in your Desired Course,Check the Chart and Update your Profile</p>
                            <a href="#" class="btn btn-primary">See Profile</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection