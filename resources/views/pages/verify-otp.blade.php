<!doctype html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Verify OTP | EarthLink</title>
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
            <div class="container height-100 mb-3 d-flex justify-content-center align-items-center">
              <div class="position-relative">
                <p class="text-muted fw-semibold">An OTP code has been sent to {{ request()->header('email') }}. Please check your inbox and enter the code below to reset your password.</p>
                <div id="otp" class="inputs d-flex flex-row justify-content-center mt-2">
                  <input class="m-2 text-center form-control rounded fw-bold" type="text" id="first" maxlength="1" />
                  <input class="m-2 text-center form-control rounded fw-bold" type="text" id="second" maxlength="1" />
                  <input class="m-2 text-center form-control rounded fw-bold" type="text" id="third" maxlength="1" />
                  <input class="m-2 text-center form-control rounded fw-bold" type="text" id="fourth" maxlength="1" />
                  <input class="m-2 text-center form-control rounded fw-bold" type="text" id="fifth" maxlength="1" />
                  <input class="m-2 text-center form-control rounded fw-bold" type="text" id="sixth" maxlength="1" />
                </div>
              </div>
            </div>
            <button class="btn btn-danger shadow-2 mb-4 fw-bold">Validate OTP</button>
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
    document.addEventListener("DOMContentLoaded", function(event) {
      function OTPInput() {
        const inputs = document.querySelectorAll('#otp > *[id]');
        for (let i = 0; i < inputs.length; i++) {
          inputs[i].addEventListener('keydown', function(event) {
            if (event.key === "Backspace") {
              inputs[i].value = '';
              if (i !== 0) inputs[i - 1].focus();
            } else {
              if (i === inputs.length - 1 && inputs[i].value !== '') {
                return true;
              } else if (event.keyCode > 47 && event.keyCode < 58) {
                inputs[i].value = event.key;
                if (i !== inputs.length - 1) inputs[i + 1].focus();
                event.preventDefault();
              } else if (event.keyCode > 64 && event.keyCode < 91) {
                inputs[i].value = String.fromCharCode(event.keyCode);
                if (i !== inputs.length - 1) inputs[i + 1].focus();
                event.preventDefault();
              }
            }
          });
        }
      }
      OTPInput();
    });

    document.getElementById('reset-form').addEventListener('submit', function(event) {
      event.preventDefault()
      let formData = {
        email: $('#email').val(),
      }
      axios.post('/send-otp', formData).then(function(response) {
        if (response.status == 200 && response.data.status == 'success') {
          location.href = "/otp-verify"
        } else {
          toastr.error("Something Went Wrong!")
        }
      });
    });
  </script>

</body>

</html>