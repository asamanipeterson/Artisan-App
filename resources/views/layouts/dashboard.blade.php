<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>@yield('title')</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" />
  <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" rel="stylesheet">
  <style>
    body {
      background-color:rgba(244, 246, 250, 0.78);
    }
    .sidebar {
      height: 100vh;
      background-color: #2e3c58;
      color: white;
    }
    .sidebar a {
      color: #cbd6e2;
      text-decoration: none;
    }
    .sidebar a:hover {
      color: #fff;
    }
    .card {
      border: none;
      border-radius: 15px;
    }
    .bg-accent {
      background-color: #4e73df;
      color: white;
    }
    .bg-accent-light {
      background-color: #dfe7fd;
    }
  </style>
</head>
<body>
  <div class="container-fluid">
    <div class="row">
      <!-- Sidebar -->
      <nav class="col-md-2 d-none d-md-block sidebar p-3">
        <h4 class="text-white mb-4">ServiceCo</h4>
        <ul class="nav flex-column">
          <li class="nav-item mb-2"><a href="/dashboard" class="nav-link"><i class="fas fa-home me-2"></i>Dashboard</a></li>
          <li class="nav-item mb-2"><a href="{{ route('services.index') }}" class="nav-link"><i class="fas fa-concierge-bell me-2"></i>Services</a></li>
          <li class="nav-item mb-2"><a href="#" class="nav-link"><i class="fas fa-users me-2"></i>Clients</a></li>
          <li class="nav-item mb-2"><a href="#" class="nav-link"><i class="fas fa-calendar-alt me-2"></i>Appointments</a></li>
          <li class="nav-item mb-2"><a href="#" class="nav-link"><i class="fas fa-cog me-2"></i>Settings</a></li>
        </ul>
      </nav>

      <!-- Main Content -->
      <main class="col-md-10 ms-sm-auto px-md-4">
        <!-- Header -->
        <div class="d-flex justify-content-between align-items-center py-3 mb-4 border-bottom">
          <h2 class="h4">@yield('header','ServiceCo')</h2>

          <p style="float: right;"> Welcome, <b>{{ auth()->user()->name }}</b></p>
          <div class="dropdown">
            <a href="#" class="d-block text-decoration-none text-dark dropdown-toggle" data-bs-toggle="dropdown">
              <i class="fas fa-user-circle fa-2x"></i>
            </a>
            <ul class="dropdown-menu dropdown-menu-end">
              <li><a class="dropdown-item" href="#">Profile</a></li>
              <li>
                <form action="{{ route('auth.logout') }}" method="POST">
                        @csrf
                        <button type="submit" class="nav-link">
                            Logout
                        </button>
                </form>
                </li>
            </ul>
          </div>
        </div>
        @if (Session::has('message'))
            <p class="alert alert-{{ Session::get('key', 'info') }}">{{ Session::get('message') }}</p>
        @endif
        @yield('content')
      </main>
    </div>
  </div>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
