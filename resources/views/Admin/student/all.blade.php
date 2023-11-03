@extends('layouts.default')
@section('content')
<div class="row row-offcanvas row-offcanvas-right">
    <div class="content-wrapper">
        <div class="container shadow p-3 mb-4 bg-white rounded">
            <div class="container">
                <h2>All Student</h2>
                <span><a class="btn btn-primary my-2" href="{{ url('student-register') }}">Insert Student</a></span>
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
                        <th>ID</th>
                        <th>Name</th>
                        <th>Email</th>
                        <th>Department</th>
                        <th>Batch</th>
                        <th>Gender</th>
                        <th>Address</th>
                        <th>Action</th>
                    </thead>
                    <tbody>
                        @foreach($students as $s)
                        <tr>
                            <td>{{ $s->id }}</td>
                            <td>{{ $s->name }}</td>
                            <td>{{ $s->email }}</td>
                            <td>{{ $s->department }}</td>
                            <td>{{ $s->batch }}</td>
                            <td>{{ $s->gender }}</td>
                            <td>{{ $s->address }}</td>
                            <td>
                                <a class="btn btn-primary btn-sm my-2" href="{{ url('edit-student/'.$s->id) }}">Edit</a>
                                <a class="btn btn-danger btn-sm my-2" data-toggle="modal"
                                    data-target="#id{{ $s->id }}">Delete</a>
                                <div class="modal" id="id{{ $s->id }}">
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h4 class="modal-title">Delete student?</h4>
                                                <button type="button" class="close"
                                                    data-dismiss="modal">&times;</button>
                                            </div>
                                            <div class="modal-body">
                                                Are you sure you want to delete <b>{{ $s->name }}</b>?
                                            </div>
                                            <div class="modal-footer">
                                                <a class="btn btn-danger"
                                                    href="{{ url('delete-student/'.$s->id) }}">Yes</a>
                                                <button type="button" class="btn btn-primary"
                                                    data-dismiss="modal">No</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
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