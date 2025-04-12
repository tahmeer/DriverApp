<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Saam Log in</title>
    {{-- <link rel="shortcut icon" href="{{ $favicon }}"> --}}
    <!-- Tell the browser to be responsive to screen width -->
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <!-- Bootstrap 3.3.6 -->
    <link rel="stylesheet" href="{{ asset('admin/bootstrap/css/bootstrap.min.css') }}">
    <!-- Theme style -->
    <link rel="stylesheet" href="{{ asset('dist/css/adminlte.min.css') }}">
    <!-- Font Awesome -->
    {{-- <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css"> --}}

</head>

<body class="hold-transition login-page">
    <style>
        .btn-primary {
            background-color: #fdb040;
            border-color: #fdb040;
        }

        .btn-primary:hover {
            color: #fdb040;
            background-color: white;
            border-color: #fdb040;
        }

        .login-page,
        .register-page {
            background: #eee;
        }
    </style>
    <div class="flash-container" class="ml-15">
        @if (Session::has('message'))
            <div class="alert {{ Session::get('alert-class') }} text-center" role="alert">
                <a href="#" class="alert-close pull -right" data-dismiss="alert">&times;</a>
                {{ Session::get('message') }}
            </div>
        @endif
    </div>
    <div class="login-box">
        <div class="login-box-body">
            <div class="login-logo">
               
                <img style="width:100px;" src="{{ asset('images/logos/logo.png') }}" alt="logo" class="img-130x32">
            </div>
            <!--   <p class="login-box-msg">LOGIN TO<img  style="    width: 50px;
        margin-top: -3px;"  src="{{ asset('images/logos/logo.png') }}" alt="logo" class="img-130x32"></p> -->
            <form action="{{ url('admin/authenticate') }}" method="post" id="admin_login">

                {{ csrf_field() }}
                <input type="hidden" name="time_zone">
                <div class="form-group has-feedback mb-3">
                    <label for="username" class="mb-2">Email</label>
                    <input type="email" name="email" class="form-control" placeholder="Email" required>
                    <span class="form-control-feedback">
                        <i class="fas fa-envelope"></i>
                    </span>
                </div>
                <div class="form-group has-feedback">
                    <label for="password" class="mb-2">Password</label>
                    <input type="password" name="password" class="form-control" placeholder="Password" required>
                    <span class="form-control-feedback">
                        <i class="fas fa-lock"></i>
                    </span>
                </div>
                <div class="row">
                    <div class="col-xs-8">
                        <div class="checkbox icheck">
                            <label>
                            </label>
                        </div>
                    </div>
                    <div class="col-12">
                        <button type="submit" class="btn btn-primary btn-block btn-flat w-100">Sign In</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</body>

</html>
<script>
    // document.querySelector("input[name='time_zone']").value = Intl.DateTimeFormat().resolvedOptions().timeZone
</script>
