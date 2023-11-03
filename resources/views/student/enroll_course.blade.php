@extends('layouts.student')
@section('content')
<div class="row row-offcanvas row-offcanvas-right">
    <div class="content-wrapper">
        <div class="container shadow p-3 mb-4 bg-white rounded">
            <div class="container">
                @if($data->count())
                <form target="_self" enctype="multipart/form-data" method="get" id="form1"
                    class="animate__animated animate__zoomIn">
                    @csrf
                    <div class="form-group row">
                        <label for="" class="col-sm-2 col-form-label">Select Available Session </label>
                        <div class="col-sm-10">
                            <select type="text" class="form-control" id="session" name="session"
                                value="{{ old('session') }}" required>
                                <option value="" disabled selected>Select Session</option>
                                @foreach($data as $d)
                                @if (old('session')==$d->name)
                                <option value={{$d->name}} selected>{{$d->name }}</option>
                                @else
                                <option value="{{$d->name}}"> {{$d->name}}</option>
                                @endif
                                @endforeach
                            </select>

                        </div>
                    </div>
                    <div class="form-group row text-center">
                        <div class="col-sm-10">
                            <button type="submit" name="search" class="btn btn-outline-info">Submit</button>
                        </div>
                    </div>
                </form>
                @endif
                @if(isset($_GET['search']))
                <style>
                #form1 {
                    display: none;
                }
                </style>
                <h1 class="text-center">Enroll Courses
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
                <form target="_self" enctype="multipart/form-data" method="post" id="form2"
                    action="{{ URL::to('enrollmentfinal') }}">
                    @csrf
                    <h2>
                        List of All Courses({{$data2->count()}} Entries)
                        <h3 class="text-right">
                            <b>Session:</b> {{ $data[0]->name }}
                        </h3>
                    </h2>

                    <table class='table table-sm table-striped table-hover table-responsive-sm text-center list'
                        id='counterlist'>
                        <thead class="tableheader">
                            <th>No.</th>
                            <th></th>
                            <th>Title</th>
                            <th>Code</th>
                            <th>Type</th>
                            <th>Credit</th>
                            <th>Semester</th>
                            <th>Exam Type</th>
                            <th>Message</th>
                        </thead>
                        <tbody class="table-bordered">
                            @if($data2->count())
                            @foreach($data2 as $value)
                            <tr>
                                <td class='animate__animated animate__fadeIn animate__slower'>{{$loop->iteration}}</td>
                                <td><input id="check" type="checkbox" name="slectcourse[{{$value->id}}]"
                                        value="{{$value->id}}"></td>
                                <td class='animate__animated animate__fadeIn animate__slower text-left'>
                                    {{$value->title}}</td>
                                <td class='animate__animated animate__fadeIn animate__slower'>{{$value->code}}</td>
                                <td class='animate__animated animate__fadeIn animate__slower'>{{$value->type}}</td>
                                <td class='animate__animated animate__fadeIn animate__slower'>{{$value->credit}}</td>
                                <td class='animate__animated animate__fadeIn animate__slower'>{{$value->semester}}</td>
                                <td class='animate__animated animate__fadeIn animate__slower'>
                                    <select type="text" class="form-control" id="examtype"
                                        name="examtype[{{$value->id}}]" value="">
                                        <option value="" disabled selected> Select Type</option>
                                        <option value="Regular"> Regular </option>
                                        <option value="Recourse"> Recourse</option>
                                        <option value="Retake"> Retake</option>
                                    </select>
                                </td>
                                <td class='animate__animated animate__fadeIn animate__slower'>
                                    @if ($errors->has("examtype.$value->id"))
                                    <div class="text-danger"> {{ $errors->first("examtype.$value->id") }} </div>
                                    @endif
                                    @if ($errors->has("slectcourse.$value->id"))
                                    <div class="text-danger"> {{ $errors->first("slectcourse.$value->id") }} </div>
                                    @endif
                                    @if(Session::has("successmessage.$value->id"))
                                    <div class="text-success" role="alert">
                                        {{Session::get("successmessage.$value->id")}}
                                    </div>
                                    @endif
                                    @if(Session::has("errormessage.$value->id"))
                                    <div class="text-danger" role="alert">
                                        {{Session::get("errormessage.$value->id")}}
                                    </div>
                                    @endif
                            </tr>
                            @endforeach
                            @endif
                        </tbody>
                    </table>
                    <div class="form-group row text-center">
                        <div class="col-sm-10">
                            <button type="submit" name="submit" class="btn btn-outline-success">ENROLL</button>
                        </div>
                    </div>
                </form>
                @endif
            </div>
        </div>
    </div>

</div>
@endsection