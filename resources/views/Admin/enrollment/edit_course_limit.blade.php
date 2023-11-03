@extends('layouts.default')
@section('content')
<div class="row row-offcanvas row-offcanvas-right">
    <div class="content-wrapper">
        <div class="container shadow p-3 mb-4 bg-white rounded">
            <div class="container">
                <h2>Course Limitations</h2>
                @if(Session::has('success'))
                <div class="alert alert-success my-2">
                    {{ Session::get('success') }}
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span
                            aria-hidden="true">&times;</span></button>
                </div>
                @endif
                @if(Session::has('del'))
                <div class="alert alert-danger my-2">
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span
                            aria-hidden="true">&times;</span></button>
                    {{ Session::get('del') }}
                </div>
                @endif
                <form action="{{ url('update-courselimit/'.$limit->id) }}" method="post">
                    {{ csrf_field() }}

                    <div class="row">
                        <div class="col">
                            <div class="form-group">
                                <label>Maximum Student:</label>
                                <input type="number" class="form-control" value="{{ $limit->max_student }}"
                                    name="max_student">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col">
                            <div class="form-group">
                                <label>Maximum Credit:</label>
                                <input type="number" class="form-control" value="{{ $limit->max_credit }}"
                                    name="max_credit">
                            </div>
                        </div>
                    </div>
                    <button type="submit" class="btn btn-success">Submit</button>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection