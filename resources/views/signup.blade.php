<!doctype html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Sign up | EarthLink</title>
  <link href=" {{ asset('vendor/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet">
  <link href="{{ asset('css/auth.css') }}" rel="stylesheet">
</head>

<body>
  <div class="wrapper">
    <div class="auth-content">
      <div class="card">
        <div class="card-body text-center">
          <div class="mb-4">
            <img class="brand" src=" {{ 'img/brand-logo.png' }} " alt="bootstraper logo">
          </div>
          <h6 class="mb-4 text-muted">Create new Admin account</h6>
          <form id="signup-form">
            @csrf
            <div class="mb-3 text-start">
              <label for="name" class="form-label">Full Name</label>
              <input type="text" class="form-control" id="fullname" required>
            </div>
            <div class="mb-3 text-start">
              <label for="email" class="form-label">Email Address</label>
              <input type="email" class="form-control" id="email" required>
            </div>
            <div class="mb-3 text-start">
              <label for="phone" class="form-label">Phone</label>
              <input type="tel" class="form-control" id="phone" required>
            </div>
            <div class="mb-3 text-start">
              <label for="password" class="form-label">Password</label>
              <input type="password" class="form-control" id="password" required>
            </div>
            <!--
              <div class="mb-3">
                <input type="password" class="form-control" placeholder="Confirm password" required>
              </div> 
            -->
            <div class="mb-3 text-start">
              <div class="form-check">
                <input class="form-check-input" name="confirm" type="checkbox" value="" id="check1">
                <label class="form-check-label" for="check1">
                  I agree to the <a href="#" tabindex="-1">terms and policy</a>.
                </label>
              </div>
            </div>
            <button class="btn btn-success shadow-2 mb-4">Register</button>
          </form>
          <p class="mb-0 text-muted">Allready have an account? <a href="/admin-login">Log in</a></p>
        </div>
      </div>
    </div>
  </div>
  <script src=" {{ 'vendor/jquery/jquery.min.js' }} "></script>
  <script src=" {{ 'vendor/bootstrap/js/bootstrap.min.js' }} "></script>
  <script src=" {{ 'js/axios.min.js' }} "></script>

  <script>

    document.getElementById('signup-form').addEventListener('submit', function (event) {
      event.preventDefault()
      let formData = {
        fullname: document.getElementById('fullname').value,
        email: document.getElementById('email').value,
        phone: document.getElementById('phone').value,
        password: document.getElementById('password').value
      }
      axios.post('/admin-signup', formData).then(function (response) {
        if (response.status == 200 && response.data.status == 'success') {
          location.href = "/admin-login"
        }
      });
    });

  </script>


</body>

</html>