<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Change Password | EarthLink</title>
    <link href=" {{ asset('vendor/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet">
    <link href="{{ asset('css/auth.css') }}" rel="stylesheet">
    <link href="{{ asset('css/toast.css') }}" rel="stylesheet">
    <link rel="shortcut icon" href="favicon.ico" type="image/x-icon">
</head>

<body>
    <div class="wrapper">
        <div class="auth-content">
            <div class="card">
                <div class="card-body text-center">
                    <div class="mb-4">
                        <a href="/"><img class="brand" src=" {{ asset('img/brand-logo.png') }} " alt="Brand Logo"></a>
                    </div>
                    <h6 class="mb-4 text-danger fw-bold">Change Your Password</h6>
                    <form id="change-form">
                        @csrf
                        <div class="mb-3 text-start">
                            <label for="password" class="form-label text-muted fw-bold">New Password</label>
                            <input type="password" class="form-control" id="password" required>
                        </div>
                        <div class="mb-3 text-start">
                            <label for="confirmpassword" class="form-label text-muted fw-bold">Confirm Password</label>
                            <input type="password" class="form-control" id="confirmpassword" required>
                        </div>
                        <button class="btn btn-danger shadow-2 mb-4 fw-bold">Change Password</button>
                    </form>
                    <p class="mb-0 text-muted fw-bold">Don't have an account? <a href="/user-signup">Sign Up</a></p>
                </div>
            </div>
        </div>
    </div>
    <script src=" {{ asset('vendor/jquery/jquery.min.js') }} "></script>
    <script src=" {{ asset('vendor/bootstrap/js/bootstrap.min.js') }} "></script>
    <script src=" {{ asset('js/axios.min.js') }} "></script>
    <script src=" {{ asset('js/toast.js') }} "></script>

    <script>
        document.getElementById('change-form').addEventListener('submit', function(event) {
            event.preventDefault()
            let password = $('#password').val()
            let confirmPassword = $('#confirmpassword').val()

            if (password == confirmPassword) {
                let formData = {
                    password: password,
                }

                axios.post('/change-password', formData).then(function(response) {
                    if (response.status == 200 && response.data.status == 'success') {
                        toastr.success("Password Change Successfully.")
                        location.href = "/user-login"
                    } else {
                        toastr.error("Something Went Wrong!")
                    }
                });
            } else {
                toastr.error("Password didn't match, Try Again.")
            }
        });
    </script>
</body>

</html>