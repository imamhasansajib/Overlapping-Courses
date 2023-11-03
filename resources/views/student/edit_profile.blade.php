@extends('layouts.student')
@section('content')
<div class="row row-offcanvas row-offcanvas-right">
    <div class="content-wrapper">
        <div class="container shadow p-3 mb-4 bg-white rounded">
            @if(Session::has('success'))
            <div class="alert alert-success">
                {{ Session::get('success') }}
                <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span
                        aria-hidden="true">&times;</span></button>
            </div>
            @endif
            <h2>Update Profile</h2>
            <form action="{{ url('update-profile') }}" method="post" enctype="multipart/form-data">
                {{ csrf_field() }}
                <div class="row">
                    <div class="col">
                        <div class="form-group">
                            <label>Name:</label>
                            <input type="name" class="form-control" value="{{ $student->name }}" name="name">
                        </div>
                    </div>
                    <div class="col">
                        <div class="form-group">
                            <label>Email:</label>
                            <input type="email" class="form-control" value="{{ $student->email }}" name="email">
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col">
                        <div class="form-group">
                            <label for="salary">Gender:</label><br>
                            <div class="form-check-inline"><label class="form-check-label"><input type="radio"
                                        class="form-check-input" name="gender" value="Male"
                                        {{ ($student->gender=="Male")? "checked" : ""}}>Male</label>
                            </div>
                            <div class="form-check-inline"><label class="form-check-label"><input type="radio"
                                        class="form-check-input" name="gender" value="Female"
                                        {{ ($student->gender=="Female")? "checked" : ""}}>Female</label>
                            </div>
                            <div class="form-check-inline"><label class="form-check-label"><input type="radio"
                                        class="form-check-input" name="gender" value="Other"
                                        {{ ($student->gender=="Other")? "checked" : ""}}>Other</label></div>
                        </div>
                    </div>
                    <div class="col">
                        <div class="form-group">
                            <label class="form-label">Address:</label>
                            <input type="textarea" name="address" value="{{ $student->address }}" class="form-control">
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col">
                        <label>Image:</label>
                        <div class="col-md-2">
                            <img class="mb-3" src="{{ asset('/thumbnail/'.$student->image) }}" />
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col">
                        <div class="form-group">
                            <label>Update Image</label>
                            <div class="row">
                                <div class="col-12">
                                    <img class="file" width="150px" hidden="true" id="blah" src="#" />
                                    <label class="btn btn-outline-primary btn-sm"><input type="file"
                                            class="form-control-file" id="filename" name="image"><i
                                            class="mdi mdi-upload btn-label btn-label-left"></i>Browse</label>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <button type="submit" class="btn btn-success">Update</button>
            </form>
        </div>
    </div>
</div>
@endsection
@section('extraScript')
<script>
filename.onchange = evt => {
    const [file] = filename.files
    if (file) {
        blah.src = URL.createObjectURL(file)
    }
    $('.file').attr('hidden', false);
}
</script>
@endsection