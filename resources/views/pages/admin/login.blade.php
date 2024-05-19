<!doctype html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Login | EarthLink</title>
  <link rel="stylesheet" href=" {{ 'vendor/bootstrap/css/bootstrap.min.css' }} ">
  <link rel="stylesheet" href=" {{ 'css/auth.css' }} ">
  <link rel="stylesheet" href="{{ 'css/toast.css' }}">
</head>

<body>
  <div class="wrapper">
    <div class="auth-content">
      <div class="card">
        <div class="card-body text-center">
          <div class="mb-4">
            <img class="brand" src=" {{ 'img/brand-logo.png' }} " alt="bootstraper logo">
          </div>
          <h6 class="mb-4 text-muted">Login to Admin account</h6>
          <form id="login-form">
            <div class="mb-3 text-start">
              <label for="email" class="form-label">Email adress</label>
              <input type="email" class="form-control" id="email" placeholder="Enter Email" required>
            </div>
            <div class="mb-3 text-start">
              <label for="password" class="form-label">Password</label>
              <input type="password" class="form-control" id="password" placeholder="Password" required>
            </div>
            <button type="submit" class="btn btn-success shadow-2 mb-4">Login</button>
          </form>
          <p class="mb-2 text-muted">Forgot password? <a href="/forgot-password">Reset</a></p>
          <p class="mb-0 text-muted">Don't have account yet? <a href="/admin-signup">Signup</a></p>
        </div>
      </div>
    </div>
  </div>
  <script src=" {{ 'vendor/jquery/jquery.min.js' }} "></script>
  <script src=" {{ 'vendor/bootstrap/js/bootstrap.min.js' }} "></script>
  <script src=" {{ 'js/axios.min.js' }} "></script>
  <script src=" {{ 'js/toast.js' }} "></script>
  <script>
    document.getElementById('login-form').addEventListener('submit', function (event) {
      event.preventDefault();
      let formData = {
        email: document.getElementById('email').value,
        password: document.getElementById('password').value
      }
      let res = axios.post('/admin-login', formData).then(function (response) {
        if (response.status == 200 && response.data.status == 'success') {
          location.href = "/admin-dashboard"
        } else {
          toastr.error("Incorrect Email or Password!");
        }
      });

    })
  </script>
</body>

</html>