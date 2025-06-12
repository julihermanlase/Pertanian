<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Pertanian</title>
    <meta name="description" content="Sufee Admin - HTML5 Admin Template">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link rel="apple-touch-icon" href="apple-icon.png">
    <link rel="shortcut icon" href="favicon.ico">
    <link rel="stylesheet" href="{{asset('assets/css/normalize.css')}}">
    <link rel="stylesheet" href="{{asset('assets/css/bootstrap.min.css')}}">
    <link rel="stylesheet" href="{{asset('assets/css/font-awesome.min.css')}}">
    <link rel="stylesheet" href="{{asset('assets/css/themify-icons.css')}}">
    <link rel="stylesheet" href="{{asset('assets/css/flag-icon.min.css')}}">
    <link rel="stylesheet" href="{{asset('assets/css/cs-skin-elastic.css')}}">
    <link rel="stylesheet" href="{{asset('assets/scss/style.css')}}">
    <link href='https://fonts.googleapis.com/css?family=Open+Sans:400,600,700,800' rel='stylesheet' type='text/css'>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
</head>

<body>
    <!-- Sidebar -->
    <!-- Left Panel -->
    <aside id="left-panel" class="left-panel">
        <nav class="navbar navbar-expand-sm navbar-default">
            <div class="navbar-header">
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#main-menu"
                        aria-controls="main-menu" aria-expanded="false" aria-label="Toggle navigation">
                    <i class="fa fa-bars"></i>
                </button>
                <a class="navbar-brand" href=""><img src="{{asset('assets/images/logo.png')}}" alt="Logo"></a>
                <a class="navbar-brand hidden" href=""><img src="{{asset('assets/images/logo2.png')}}" alt="Logo"></a>
            </div>
            <!-- /.navbar-collapse -->
            <div id="main-menu" class="main-menu collapse navbar-collapse">
                <ul class="nav navbar-nav">
                    <li>
                    <li class="{{ request()->is('dashboard') ? 'active' : '' }}">
                        <a href="{{ route('dashboard.index') }}">
                            <i class="menu-icon fa fa-dashboard"></i>Dashboard
                        </a>
                    </li>
                    <li class="{{ request()->is('lahan*') ? 'active' : '' }}">
                        <a href="{{route('lands.index')}}">
                            <i class="menu-icon fa fa-tractor"></i>Lahan Pertanian
                        </a>
                    </li>
                    <li class="{{ request()->is('tanaman*') ? 'active' : '' }}">
                        <a href="{{route('crops.index')}}">
                            <i class="menu-icon fa fa-leaf"></i>Tanaman
                        </a>
                    </li>
                    <li class="{{ request()->is('Panen*') ? 'active' : '' }}">
                        <a href=""> <!-- Ini menggunakan route panen.index -->
                            <i class="menu-icon fa fa-pagelines"></i>Panen
                        </a>
                    </li>
                    <li class="{{ request()->is('laporan*') ? 'active' : '' }}">
                        <a href=""> <!-- Ini menggunakan route laporan.index -->
                            <i class="menu-icon fa fa-bar-chart"></i>Laporan
                        </a>
                    </li>
                </ul>
            </div>
        </nav>
    </aside>

    <!-- Right Panel -->
    <div id="right-panel" class="right-panel">
        <!-- Header-->
        <header id="header" class="header">
            <div class="header-menu">
                <div class="col-sm-7">
                    <a id="menuToggle" class="menutoggle pull-left"><i class="fa fa fa-tasks"></i></a>
                    <div class="header-left">
                        <div class="search-box d-flex align-items-center">
                            <button class="btn btn-light border-0 p-2" id="btn-search" type="submit">
                                <i class="fa fa-search"></i>
                            </button>
                            <input class="form-control border-0 ml-2" type="text" placeholder="Cari data..." aria-label="Search" id="search-input">
                        </div>
                    </div>
                </div>
                <div class="col-sm-5">
                    <div class="user-area dropdown float-right">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <img class="user-avatar rounded-circle" src="{{ asset('assets/images/admin.jpg') }}">
                        </a>
                        <div class="user-menu dropdown-menu dropdown-menu-right show-on-hover">
                            <a class="nav-link" href="{{ route('auth.login') }}"><i class="fa fa-sign-in"></i> Login</a>
                            <a class="nav-link" href="{{ route('auth.logout') }}"><i class="fa fa-power-off"></i> Logout</a>
                        </div>
                    </div>
                </div>
            </div>
        </header>

        @yield('content')
    </div>

    <!-- Scripts -->
    <script src="{{ asset('assets/js/vendor/jquery-2.1.4.min.js') }}"></script>
    <script src="{{ asset('assets/js/popper.min.js') }}"></script>
    <script src="{{ asset('assets/js/bootstrap.min.js') }}"></script>
    <script src="{{ asset('assets/js/plugins.js') }}"></script>
    <script src="{{ asset('assets/js/main.js') }}"></script>

</body>
</html>
