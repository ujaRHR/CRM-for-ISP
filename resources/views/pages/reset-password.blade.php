<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Reset Password | EarthLink</title>
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
                    <h6 class="mb-4 text-danger fw-bold">Reset Your Password</h6>
                    <form id="reset-form">
                        @csrf
                        <div class="mb-3 text-start">
                            <label for="email" class="form-label text-muted fw-bold">Email Address</label>
                            <input type="email" class="form-control" id="email" required>
                        </div>
                        <button class="btn btn-warning shadow-2 mb-4 fw-bold">Reset Password</button>
                    </form>
                    <p class="mb-2 text-muted fw-bold">Already have an account? <a href="/user-login">Log In</a></p>
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
        document.getElementById('reset-form').addEventListener('submit', function(event) {
            event.preventDefault()
            let formData = {
                email: $('#email').val(),
            }

            axios.post('/send-otp', formData).then(function(response) {
                if (response.status == 200 && response.data.status == 'success') {
                    location.href = "/verify-otp"
                } else {
                    toastr.error("Incorrect Email Address!")
                }
            });
        });
    </script>
</body>

</html>