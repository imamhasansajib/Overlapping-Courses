@extends('layouts.default')
@section('content')
<div class="row row-offcanvas row-offcanvas-right">
    <div class="content-wrapper">
        <div class="container shadow p-3 mb-4 bg-white rounded">
            <div class="container">
                <h2>All Sessions</h2>
                <span><a class="btn btn-primary my-2" href="{{ url('create-session') }}">Create Session</a></span>
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
                <table class="table table-striped">
                    <thead>
                        <th>Session Name</th>
                        <th>Session Status</th>
                        <th>Action</th>
                    </thead>
                    <tbody>
                        @foreach($sessions as $s)
                        <tr>
                            <td>{{ $s->name }}</td>
                            <td>{{ $s->status }}</td>
                            <td>
                                <a class="btn btn-success btn-sm my-2" href="{{ url('edit-session/'.$s->id) }}">Edit</a>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
@endsection