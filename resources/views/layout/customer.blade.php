<!doctype html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>@yield('title')</title>
  <link rel="shortcut icon" href=" {{ asset('img/favicon.ico') }}" type="image/x-icon">
  <link rel="stylesheet" href=" {{ asset('vendor/fontawesome/css/fontawesome.min.css') }} ">
  <link rel="stylesheet" href=" {{ asset('vendor/fontawesome/css/solid.min.css') }} ">
  <link rel="stylesheet" href=" {{ asset('vendor/fontawesome/css/brands.min.css') }} ">
  <link rel="stylesheet" href=" {{ asset('vendor/bootstrap/css/bootstrap.min.css') }} ">
  <link rel="stylesheet" href=" {{ asset('css/master.css') }} ">
  <link rel="stylesheet" href=" {{ asset('vendor/flagiconcss/css/flag-icon.min.css') }} ">
  <link rel="stylesheet" href="{{ asset('css/toast.css') }}">
  <link rel="stylesheet" href="{{ asset('vendor/datatables/datatables.min.css') }}">

  <style>
    .table td,
    .table th {
      text-align: center;
    }
  </style>
</head>

<body>
  <div class="wrapper">
    <div id="progress"></div>
    <nav id="sidebar" class="">
      <div class="sidebar-header">
        <img src=" {{ asset('img/brand-logo.png') }} " alt="brand logo" class="app-logo">
      </div>
      <ul class="list-unstyled components text-secondary">
        <li>
          <a href="customer-dashboard"><i class="fas fa-home"></i> Dashboard</a>
        </li>
        <li>
          <a href="customer-profile"><i class="fas fa-user-check"></i> Profile</a>
        </li>
        <li>
          <a href="customer-subscriptions"><i class="fas fa-paper-plane"></i> Subscriptions</a>
        </li>
        <li>
          <a href="customer-notices"><i class="fas fa-bell"></i> Notices</a>
        </li>
        <li>
          <a href="customer-tickets"><i class="fas fa-bug"></i> Tickets</a>
        </li>
      </ul>
    </nav>

    <div id="body" class="active">
      <nav class="navbar navbar-expand-lg navbar-white bg-white">
        <button type="button" id="sidebarCollapse" class="btn btn-light">
          <i class="fas fa-bars"></i><span></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
          <ul class="nav navbar-nav ms-auto">
            <li class="nav-item dropdown">
              <div class="nav-dropdown">
                <a href="#" id="nav1" class="nav-item nav-link dropdown-toggle text-secondary" data-bs-toggle="dropdown" aria-expanded="false">
                  <i class="fas fa-link"></i> <span>Quick Links</span> <i style="font-size: .8em;" class="fas fa-caret-down"></i>
                </a>
                <div class="dropdown-menu dropdown-menu-end nav-link-menu" aria-labelledby="nav1">
                  <ul class="nav-list">
                    <li><a href="" class="dropdown-item"><i class="fas fa-list"></i> Access Logs</a>
                    </li>
                    <div class="dropdown-divider"></div>
                    <li><a href="" class="dropdown-item"><i class="fas fa-database"></i> Back
                        ups</a></li>
                    <div class="dropdown-divider"></div>
                    <li><a href="" class="dropdown-item"><i class="fas fa-cloud-download-alt"></i>
                        Updates</a></li>
                    <div class="dropdown-divider"></div>
                    <li><a href="" class="dropdown-item"><i class="fas fa-user-shield"></i>
                        Roles</a></li>
                  </ul>
                </div>
              </div>
            </li>
            <li class="nav-item dropdown">
              <div class="nav-dropdown">
                <a href="#" id="nav2" class="nav-item nav-link dropdown-toggle text-secondary" data-bs-toggle="dropdown" aria-expanded="false">
                  <i class="fas fa-user"></i> <span>{{ $customer->fullname }}</span> <i style="font-size: .8em;" class="fas fa-caret-down"></i>
                </a>
                <div class="dropdown-menu dropdown-menu-end nav-link-menu">
                  <ul class="nav-list">
                    <li><a href="/customer-profile" class="dropdown-item"><i class="fas fa-address-card"></i>
                        Profile</a></li>
                    <li><a href="" class="dropdown-item"><i class="fas fa-envelope"></i>
                        Messages</a></li>
                    <div class="dropdown-divider"></div>
                    <li><a href="/logout" class="dropdown-item"><i class="fas fa-sign-out-alt"></i>
                        Logout</a></li>
                  </ul>
                </div>
              </div>
            </li>
          </ul>
        </div>
      </nav>

      @yield('content')

    </div>
  </div>
  <script src=" {{ asset('vendor/jquery/jquery.min.js') }} "></script>
  <script src=" {{ asset('js/axios.min.js') }} "></script>
  <script src=" {{ asset('js/toast.js') }} "></script>
  <script src=" {{ asset('vendor/bootstrap/js/bootstrap.bundle.min.js') }} "></script>
  <script src=" {{ asset('vendor/chartsjs/Chart.min.js') }} "></script>
  <script src=" {{ asset('vendor/datatables/datatables.min.js') }}"></script>
  <script src=" {{ asset('js/dashboard-charts.js') }} "></script>
  <script src=" {{ asset('js/script.js') }} "></script>

  @stack('other-scripts')
</body>

</html>