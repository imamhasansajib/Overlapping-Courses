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
                    @if(Session::has('err'))
                    <div class="alert alert-danger">
                        {{ Session::get('err') }}
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span
                                aria-hidden="true">&times;</span></button>
                    </div>
                    @endif
                    <h2>Student Register</h2>
                    <form action="{{ url('store-student') }}" method="post" enctype="multipart/form-data">
                        {{ csrf_field() }}

                        <div class="row">
                            <div class="col">
                                <div class="form-group">
                                    <label>Name:</label>
                                    <input type="name" class="form-control" placeholder="Enter name" name="name"
                                        required>
                                </div>
                            </div>
                            <div class="col">
                                <div class="form-group">
                                    <label>Email:</label>
                                    <input type="email" class="form-control" placeholder="Enter email" name="email"
                                        required>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col">
                                <div class="form-group">
                                    <label>Batch:</label>
                                    <input type="number" class="form-control" placeholder="Enter batch" name="batch"
                                        required>
                                </div>
                            </div>
                            <div class="col">
                                <div class="form-group">
                                    <label>Department:</label>
                                    <select name="department" class="form-control" required>
                                        <option value="">Select Department</option>
                                        <option value="CSE">Computer Science and Engineering</option>
                                        <option value="EEE">Electrical and Electronics Engineering</option>
                                        <option value="LLB">Bachelor of Laws</option>
                                        <option value="BBA">Bachelor of Business Administration</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col">
                                <div class="form-group">
                                    <label for="salary">Gender:</label><br>
                                    <div class="form-check-inline"><label class="form-check-label"><input type="radio"
                                                class="form-check-input" name="gender" value="Male"
                                                required>Male</label>
                                    </div>
                                    <div class="form-check-inline"><label class="form-check-label"><input type="radio"
                                                class="form-check-input" name="gender" value="Female">Female</label>
                                    </div>
                                    <div class="form-check-inline"><label class="form-check-label"><input type="radio"
                                                class="form-check-input" name="gender" value="Other">Other</label></div>
                                </div>
                            </div>
                            <div class="col">
                                <div class="form-group">
                                    <label>Password:</label>
                                    <input type="password" class="form-control" placeholder="Enter password"
                                        name="password" required>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col">
                                <div class="form-group">
                                    <label class="form-label">Address:</label>
                                    <textarea class="form-control" name="address" placeholder="Enter address" rows="2"
                                        cols="50" required></textarea>
                                </div>
                            </div>
                            <div class="col">
                                <div class="form-group">
                                    <label>Confirm Passowrd:</label>
                                    <input type="password" class="form-control" placeholder="Repeat password"
                                        name="repeat" required>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col">
                                <div class="form-group">
                                    <label>Upload Image</label>
                                    <div class="row">
                                        <div class="col-12">
                                            <img class="img" width="150px" hidden="true" id="blah" src="#" />
                                            <label class="btn btn-outline-primary btn-sm"><input type="file"
                                                    class="form-control-file" id="filename" name="image"><i
                                                    class="mdi mdi-upload btn-label btn-label-left"></i>Browse</label>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <button type="submit" class="btn btn-success">Register</button>
                    </form>
                </div>

                <script>
                filename.onchange = evt => {
                    const [file] = filename.files
                    if (file) {
                        blah.src = URL.createObjectURL(file)
                    }
                    $('.img').attr('hidden', false);

                }
                </script>
            </div>
        </div>
    </div>
</div>

@endsection
