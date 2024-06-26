<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>@yield('title')</title>

  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <link rel="stylesheet" href="{{ asset('plugins/fontawesome-free/css/all.min.css')}}">
  <link rel="stylesheet" href="{{ asset('dist/css/adminlte.min.css')}}">

  {{-- font awesome cdn link --}}
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css" integrity="sha512-SnH5WK+bZxgPHs44uWIX+LLJAJ9/2PkPKZ5QiAj6Ta86w+fsb2TkcmfRyVX3pBnMFcV7oQPJkl9QevSCWr3W6A==" crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>
<body class="hold-transition sidebar-mini">
<div class="wrapper">
  <nav class="main-header navbar navbar-expand navbar-white navbar-light">
    <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
      </li>
    </ul>
  </nav>
  <aside class="main-sidebar sidebar-dark-primary elevation-4">
    <a href="#" class="brand-link text-center">

      <h4 class="brand-text font-weight-bold">My Media App </h4>
    </a>
    <div class="sidebar">
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">

          <li class="nav-item">
            <a href="{{ route('dashboard')}}" class="nav-link">
              <i class="fas fa-user-circle mr-2"></i>
              <p>
                My Profile
              </p>
            </a>
          </li>

          <li class="nav-item">
            <a href="{{ route('admin#list')}}" class="nav-link">
                <i class="fas fa-users mr-2"></i>
              <p>
                Admin List
              </p>
            </a>
          </li>

          <li class="nav-item">
            <a href="{{ route('admin#category')}}" class="nav-link">
              <i class="fas fa-list mr-2"></i>
              <p>
                Category
              </p>
            </a>
          </li>

          <li class="nav-item">
            <a href="{{ route('admin#post')}}" class="nav-link">
              <i class="fas fa-pizza-slice ms-5 mr-2"></i>
              <p>
                Post
              </p>
            </a>
          </li>

         <li class="nav-item">
            <a href="{{ route('admin#trendPost')}}" class="nav-link">
            <i class="fas fa-users mr-2"></i>
              <p>
                Trend Post
              </p>
            </a>
          </li>

          <li class="nav-item">
            <form action="{{ route('logout')}}" method="POST">
                @csrf
                <button type="submit" class="btn btn-dark w-100 text-left bg-gradient-danger"><i class="fas fa-sign-out-alt mr-2 ml-1"></i>Log Out</button>
            </form>
          </li>
        </ul>
      </nav>
    </div>
  </aside>

  <div class="content-wrapper">
    <section class="content">
      <div class="container-fluid">
        <div class="row mt-4">
          @yield('content')
        </div>
      </div>
    </section>
  </div>

  <aside class="control-sidebar control-sidebar-dark">
  </aside>
</div>
<script src="{{ asset('plugins/jquery/jquery.min.js')}}"></script>
<script src="{{ asset('plugins/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
<script src="{{ asset('dist/js/adminlte.min.js')}}"></script>
<script src="{{ asset('dist/js/demo.js')}}"></script>
</body>
</html>
