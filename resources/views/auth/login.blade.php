<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Login | Aplikasi Pertanian</title>
    <meta name="description" content="Login - Aplikasi Pertanian">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Favicon & Styles -->
    <link rel="shortcut icon" href="{{ asset('favicon.ico') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/normalize.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/font-awesome.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/themify-icons.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/flag-icon.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/cs-skin-elastic.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/scss/style.css') }}">
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:400,600,700,800" rel="stylesheet">
</head>

<body class="bg-dark">
<div class="sufee-login d-flex align-content-center flex-wrap">
    <div class="container">
        <div class="login-content">
            <div class="login-logo">
                <a href="{{ route('auth.login') }}">
                    <img class="align-content" src="{{ asset('assets/images/logo.png') }}" alt="Logo Aplikasi">
                </a>
            </div>

            <div class="login-form">
                @if(session('status'))
                    <div class="alert alert-success alert-dismissible fade show" role="alert">
                        {{ session('status') }}
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                @endif

                @if(session('error'))
                    <div class="alert alert-danger alert-dismissible fade show" role="alert">
                        {{ session('error') }}
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                @endif

                @if ($errors->any())
                    <div class="alert alert-danger alert-dismissible fade show" role="alert">
                        <ul class="mb-0">
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                @endif

                    <div class="text-center mb-4">
                        <h2 class="text-dark font-weight-bold">Welcome Back 👋</h2>
                        <p class="text-muted mb-0">Silakan login untuk melanjutkan ke dashboard</p>
                    </div>

                <form method="POST" action="{{ route('auth.verify') }}">
                    @csrf
                    <div class="form-group">
                        <input type="email" name="email" value="{{ old('email') }}" class="form-control form-control-lg rounded-pill" placeholder="📧 Email" required autofocus>
                    </div>

                    <div class="form-group">
                        <input type="password" name="password" class="form-control form-control-lg rounded-pill" placeholder="🔒 Password" required>
                    </div>

                    <div class="form-group form-check">
                        <input type="checkbox" class="form-check-input" name="remember" {{ old('remember') ? 'checked' : '' }}>
                        <label class="form-check-label">Remember me</label>
                    </div>

                    <button type="submit" class="btn btn-primary btn-block rounded-pill font-weight-bold">
                        LOGIN
                    </button>
                </form>
            </div>

        </div>
    </div>
</div>

<!-- Scripts -->
<script src="{{ asset('assets/js/vendor/jquery-2.1.4.min.js') }}"></script>
<script src="{{ asset('assets/js/popper.min.js') }}"></script>
<script src="{{ asset('assets/js/plugins.js') }}"></script>
<script src="{{ asset('assets/js/main.js') }}"></script>

</body>
</html>
