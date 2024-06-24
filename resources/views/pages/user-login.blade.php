<!doctype html>
<html lang="en">

<strong>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Login | EarthLink</title>
  <link rel="stylesheet" href=" {{ 'vendor/bootstrap/css/bootstrap.min.css' }} ">
  <link rel="stylesheet" href=" {{ 'css/auth.css' }} ">
  <link rel="stylesheet" href="{{ 'css/toast.css' }}">

  <style>
    .nav-item .nav-link {
      height: 30px;
      line-height: 30px;
      padding: 0 15px;
    }

    .nav-item .active {
      background-color: #0d6efd !important;
    }
  </style>
  </head>

  <body>
    <div class="wrapper">
      <div class="auth-content">
        <div class="card">
          <div class="card-body text-center">
            <div class="mb-4">
              <img class="brand" src=" {{ 'img/brand-logo.png' }} " alt="bootstraper logo">
            </div>
            <h6 class="mb-3 text-muted fw-bold">Login to <span id="userType">Customer</span> Account</h6>

            <ul class="nav nav-pills nav-tabs border-0 justify-content-center" id="loginTab" role="tablist">
              <li class="nav-item m-1">
                <a class="nav-link bg-success text-white active" id="customerTab" data-bs-toggle="tab" href="#customer" role="tab" aria-controls="admin" aria-selected="true" tabindex="-1">Customer</a>
              </li>
              <li class="nav-item m-1">
                <a class="nav-link bg-danger text-white" id="adminTab" data-bs-toggle="tab" href="#admin" role="tab" aria-controls="admin" aria-selected="false" tabindex="-1">Admin</a>
              </li>
              <li class="nav-item m-1">
                <a class="nav-link bg-secondary text-white" id="staffTab" data-bs-toggle="tab" href="#staff" role="tab" aria-controls="staff" aria-selected="false" tabindex="-1">Staff</a>
              </li>
            </ul>

            <div class="tab-content" id="loginTabContent">
              <div class="tab-pane fade active show" id="customer" role="tabpanel" aria-labelledby="customer-tab">
                <form id="customerLoginForm" class="m-1 mt-4">
                  <div class="mb-3 text-start">
                    <label for="email" class="form-label fw-semibold">Email Address</label>
                    <input type="email" class="form-control" id="customerEmail" placeholder="your@email.com" required>
                  </div>
                  <div class="mb-3 text-start">
                    <label for="password" class="form-label fw-semibold">Password</label>
                    <input type="password" class="form-control" id="customerPassword" placeholder="" required>
                  </div>
                  <button onclick="customerLogin()" type="button" class="btn btn-sm btn-primary shadow-2 mb-4 fw-semibold">Login</button>
                </form>
              </div>
              <div class="tab-pane fade" id="admin" role="tabpanel" aria-labelledby="admin-tab">
                <form id="adminLoginForm" class="m-1 mt-4">
                  <div class="mb-3 text-start">
                    <label for="email" class="form-label fw-semibold">Email Address</label>
                    <input type="email" class="form-control" id="adminEmail" placeholder="email@admin.com" required>
                  </div>
                  <div class="mb-3 text-start">
                    <label for="password" class="form-label fw-semibold">Password</label>
                    <input type="password" class="form-control" id="adminPassword" placeholder="" required>
                  </div>
                  <button onclick="adminLogin()" type="button" class="btn btn-primary shadow-2 mb-4 fw-semibold">Login</button>
                </form>
              </div>
              <div class="tab-pane fade" id="staff" role="tabpanel" aria-labelledby="staff-tab">
                <form id="staffLoginForm" class="m-1 mt-4">
                  <div class="mb-3 text-start">
                    <label for="email" class="form-label fw-semibold">Email Address</label>
                    <input type="email" class="form-control" id="staffEmail" placeholder="email@company.com" required disabled>
                  </div>
                  <div class="mb-3 text-start">
                    <label for="password" class="form-label fw-semibold">Password</label>
                    <input type="password" class="form-control" id="staffPassword" placeholder="" required disabled>
                  </div>
                  <button onclick="staffLogin()" type="button" class="btn btn-primary shadow-2 mb-4 disabled fw-semibold">Login</button>
                </form>
              </div>
            </div>

            <p class="mb-2 text-muted">Forgot password? <a href="/forgot-password">Reset</a></p>
            <p class="mb-0 text-muted">Don't have account yet? <a href="/customer-signup">Signup</a></p>
          </div>
        </div>
      </div>
    </div>
    <script src=" {{ 'vendor/jquery/jquery.min.js' }} "></script>
    <script src=" {{ 'vendor/bootstrap/js/bootstrap.min.js' }} "></script>
    <script src=" {{ 'js/axios.min.js' }} "></script>
    <script src=" {{ 'js/toast.js' }} "></script>
    <script>
      $(document).ready(function() {
        $('.nav-item.m-1').click(function() {
          $('#userType').text($(this).text());
        });
      });

      function customerLogin() {
        let formData = {
          email: $('#customerEmail').val(),
          password: $('#customerPassword').val()
        }
        let res = axios.post('/customer-login', formData).then(function(response) {
          if (response.status == 200 && response.data.status == 'success') {
            location.href = "/customer-dashboard"
          } else {
            toastr.error("Incorrect Email or Password!");
          }
        });
      }

      function adminLogin() {
        let formData = {
          email: $('#adminEmail').val(),
          password: $('#adminPassword').val()
        }
        axios.post('/admin-login', formData).then(function(response) {
          if (response.status == 200 && response.data.status == 'success') {
            location.href = "/admin-dashboard"
          } else {
            toastr.error("Incorrect Email or Password!");
          }
        });
      }
    </script>
  </body>

</html>