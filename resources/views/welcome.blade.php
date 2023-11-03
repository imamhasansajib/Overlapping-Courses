<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>PUC</title>

    <!-- Fonts -->
    <link href="https://fonts.bunny.net/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous" />
    <style>
    .container {
        border-radius: 20px;
        box-shadow: 1px 1px 10px gray;
    }
    </style>
    <title>PUC</title>
    <!-- Styles -->
    <style>
    /*! normalize.css v8.0.1 | MIT License | github.com/necolas/normalize.css */
    html {
        line-height: 1.15;
        -webkit-text-size-adjust: 100%
    }

    html {
        font-family: system-ui, -apple-system, BlinkMacSystemFont, Segoe UI, Roboto, Helvetica Neue, Arial, Noto Sans, sans-serif, Apple Color Emoji, Segoe UI Emoji, Segoe UI Symbol, Noto Color Emoji;
        line-height: 1.5
    }
    </style>

    <style>
    body {
        font-family: 'Nunito', sans-serif;
    }
    </style>
</head>

<body class="bg-dark">
    <div class="container p-4" style="margin-top:80px;">
        <div class="row text-center">
            <div class="col-lg-2"></div>
            <div class="col-lg-3 my-1 text-left">
                <img src="{{ asset('img/puc_logo.png') }}" class="img-fluid">
            </div>
            <div class="col-lg-4">
                <div class="row">
                    &nbsp; &nbsp;
                </div>
                <div class="row">
                    &nbsp; &nbsp;
                </div>
                <div class="row">
                    &nbsp; &nbsp;
                </div>
                <div class="row">
                    <a href="" style="text-decoration: none;">
                        <h1 class="text-left text-white">Premier University </h1>
                        <h6 class="text-white">Center of Excellence for Quality Learning</h6>
                    </a>
                </div>
            </div>
            <div class="col-lg-3"></div>
        </div>
    </div>
    <div class="row my-3">
        <div class="col-lg-12">
            <div class="display-1 text-center">
                <a href="index.php" style="text-decoration: none;color: rgb(5, 2, 12);" class="text-white">P
                    U C
                </a>
                <hr>
            </div>
        </div>
        <div class="col-lg-12 text-center my-4">
            <div class="row">
                <div class="col-lg-4"></div>
                <div class="col-lg-2">
                    <a href="{{url('login')}}" class="btn btn-outline-secondary" style="width:14rem;">
                        <h4 class="text-white text-left">Admin</h4>
                    </a>
                </div>
                <div class="col-lg-2">
                    <a href="{{url('login')}}" class="btn btn-outline-secondary" style="width:11rem;">
                        <h4 class="text-white text-left">Student</h4>
                    </a>
                </div>
                <div class="col-lg-4"></div>
            </div>
        </div>
    </div>


    </div>


</body>


</html>