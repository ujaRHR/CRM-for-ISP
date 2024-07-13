<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <link rel="shortcut icon" href="favicon.ico" type="image/x-icon">
    <title>Unauthorized | EarthLink</title>
    <link href="{{ asset('vendor/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet">
    <link href="{{ asset('css/error.css') }}" rel="stylesheet">
</head>

<body>
    <div class="wrapper">
        <div class="page vertical-align text-center">
            <div class="page-content vertical-align-middle">
                <header>
                    <h1 class="animation-slide-top">401</h1>
                    <p fw-bold>Unauthorized!</p>
                </header>
                <p class="error-advise">Oops! You don't have the necessary permissions to access this page.</p>
                <a class="btn btn-danger btn-round mb-4 fw-bold" href="{{ url('user-login') }}">Go To Login Page</a>
            </div>
        </div>
    </div>
    <script src="{{ asset('vendor/jquery/jquery.min.js') }}"></script>
    <script src="{{ asset('vendor/bootstrap/js/bootstrap.min.js') }}"></script>
</body>

</html>