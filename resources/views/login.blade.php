<!DOCTYPE html>
<html lang="en">


<!-- Mirrored from www.urbanui.com/salt/jquery/pages/samples/login.html by HTTrack Website Copier/3.x [XR&CO'2014], Wed, 13 Dec 2017 12:33:56 GMT -->

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>PUC Login</title>
    <!-- plugins:css -->
    <link rel="stylesheet" href="../../node_modules/mdi/css/materialdesignicons.min.css">
    <link rel="stylesheet" href="../../node_modules/perfect-scrollbar/dist/css/perfect-scrollbar.min.css">
    <!-- endinject -->
    <!-- plugin css for this page -->
    <link rel="stylesheet" href="../../node_modules/font-awesome/css/font-awesome.min.css" />
    <!-- End plugin css for this page -->
    <!-- inject:css -->
    <link rel="stylesheet" href="../../css/style.css">
    <!-- endinject -->
    <link rel="shortcut icon" href="../../images/favicon.html" />
</head>

<body class="sidebar-white">
    <div class="container-scroller">
        <div class="container shadow mt-2 bg-white rounded">
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
        <div class="container-fluid page-body-wrapper">
            <div class="row">
                <div class="content-wrapper full-page-wrapper d-flex align-items-center auth-pages">
                    <div class="card col-lg-4 mx-auto">
                        <div class="card-body px-5 py-5">
                            <h3 class="card-title text-center">Login</h3>
                            <form action="{{ url('login-store') }}" method="post">
                                {{ csrf_field() }}
                                <div class="form-group">
                                    <label>Email</label>
                                    <input type="eamil" class="form-control p_input" name="email" required>
                                </div>
                                <div class="form-group">
                                    <label>Password</label>
                                    <input type="password" class="form-control p_input" name="password" required>
                                </div>
                                <div class="form-group d-flex align-items-center justify-content-between">
                                    <div class="icheck-square">
                                        <input tabindex="1" type="checkbox" id="remember">
                                        <label for="remember">Remember me</label>
                                    </div>
                                    <a href="#" class="forgot-pass">Forgot password</a>
                                </div>
                                <div class="text-center">
                                    <button type="submit" class="btn btn-primary btn-block enter-btn">Login</button>
                                </div>
                                <div class="d-flex justify-content-center mb-4">
                                    <a href="#" class="facebook-login btn btn-facebook mr-2">Facebook</a>
                                    <a href="#" class="google-login btn btn-google">Google+</a>
                                </div>
                                <small class="text-center d-block">Don't have an Account?<a href="#"> Sign
                                        Up</a></small>
                            </form>
                        </div>
                    </div>
                </div>
                <!-- content-wrapper ends -->
            </div>
            <!-- row ends -->
        </div>
        <!-- page-body-wrapper ends -->
    </div>
    <!-- container-scroller -->
    <!-- plugins:js -->
    <script src="../../node_modules/jquery/dist/jquery.min.js"></script>
    <script src="../../node_modules/popper.js/dist/umd/popper.min.js"></script>
    <script src="../../node_modules/bootstrap/dist/js/bootstrap.min.js"></script>
    <script src="../../node_modules/perfect-scrollbar/dist/js/perfect-scrollbar.jquery.min.js"></script>
    <!-- endinject -->
    <!-- inject:js -->
    <script src="../../js/off-canvas.js"></script>
    <script src="../../js/hoverable-collapse.js"></script>
    <script src="../../js/misc.js"></script>
    <script src="../../js/settings.js"></script>
    <!-- endinject -->
</body>


<!-- Mirrored from www.urbanui.com/salt/jquery/pages/samples/login.html by HTTrack Website Copier/3.x [XR&CO'2014], Wed, 13 Dec 2017 12:33:56 GMT -->


</html>
