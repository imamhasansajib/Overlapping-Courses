@extends('layouts.student')
@section('content')
<div class="row row-offcanvas row-offcanvas-right">
    <div class="content-wrapper">
        <div class="container shadow p-3 mb-4 bg-white rounded">
            <div class="container">
                <h1 class="text-center">Enrolled
                    Courses
                </h1>
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
                <div class="mainpage">
                    <div>

                    </div>
                    <hr>
                    <h2>
                        List of all Courses({{$data->count()}} Entries)
                        <h3 class="text-right">
                            <b>Total Credit:</b> {{ $data->enrolledcredit }}
                        </h3>
                    </h2>

                    <table class='table table-sm table-striped table-hover table-responsive-sm text-center list'
                        id='counterlist'>
                        <thead class="tableheader">
                            <th>No.</th>
                            <th>Title</th>
                            <th>Code</th>
                            <th>Course Type</th>
                            <th>Credit</th>
                            <th>Semester</th>
                            <th>Exam Type</th>
                            <th>Session</th>
                            <th>Status</th>
                            <th>Action</th>
                        </thead>
                        <tbody class="table-bordered">
                            @if($data->count())
                            @foreach($data as $key => $value)
                            <tr>
                                <td class='animate__animated animate__fadeIn animate__slower'>{{$loop->iteration}}</td>
                                <td class='animate__animated animate__fadeIn animate__slower text-left'>
                                    {{$value->title}}</td>
                                <td class='animate__animated animate__fadeIn animate__slower'>{{$value->code}}</td>
                                <td class='animate__animated animate__fadeIn animate__slower'>{{$value->coursetype}}
                                </td>
                                <td class='animate__animated animate__fadeIn animate__slower'>{{$value->credit}}</td>
                                <td class='animate__animated animate__fadeIn animate__slower'>{{$value->semester}}
                                </td>
                                <td class='animate__animated animate__fadeIn animate__slower'>{{$value->type}}</td>
                                <td class='animate__animated animate__fadeIn animate__slower'>{{$data->session_name}}
                                </td>
                                <td class='animate__animated animate__fadeIn animate__slower'>{{$value->status}}</td>
                                <td>
                                    <a href=""
                                        class="btn btn-danger btn-sm animate__animated animate__fadeIn animate__slower"
                                        data-toggle="modal" data-target="#myModal{{$value->id}}">Delete</a>
                                    <!-- Button to Open the Modal -->
                                    <!-- The Modal -->
                                    <div class="modal" id="myModal{{$value->id}}">
                                        <div class="modal-dialog">
                                            <div class="modal-content">
                                                <!-- Modal Header -->
                                                <div class="modal-header">
                                                    <h4 class="modal-title">Delete Confirmation</h4>
                                                    <button type="button" class="close"
                                                        data-dismiss="modal">&times;</button>
                                                </div>
                                                <!-- Modal body -->
                                                <div class="modal-body">Are you sure you want to delete
                                                    <b>{{$value->title}}</b>?
                                                </div>
                                                <!-- Modal footer -->
                                                <div class="modal-footer">
                                                    <a href="" class="btn btn-success">No</a>
                                                    <a href="{{ URL::to('deleteencourse/'.$value->id)}}"
                                                        class="btn btn-danger">Yes</a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </td>
                                @endforeach
                                @else
                            <tr class="text-center">
                                <td colspan="10"
                                    class="alert alert-danger animate__animated animate__fadeIn animate__slower">No
                                    Course Found</td>
                            </tr>
                            @endif
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
