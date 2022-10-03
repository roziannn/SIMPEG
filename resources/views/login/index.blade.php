<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Diskominfo Jabar | Login</title>
    <link rel="icon" href="img/jabar.png">
    <!-- Tell the browser to be responsive to screen width -->
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <!-- Bootstrap 3.3.7 -->
    <link rel="stylesheet" href="{{ asset('AdminLTE-2/bower_components/bootstrap/dist/css/bootstrap.min.css') }}">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="{{ asset('AdminLTE-2/bower_components/font-awesome/css/font-awesome.min.css') }}">
    <!-- Ionicons -->
    <link rel="stylesheet" href="{{ asset('AdminLTE-2/template/bower_components/Ionicons/css/ionicons.min.css') }}">
    <!-- Theme style -->
    <link rel="stylesheet" href="{{ asset('AdminLTE-2/dist/css/AdminLTE.min.css') }}">
    <!-- iCheck -->
    <link rel="stylesheet" href="{{ asset('AdminLTE-2/plugins/iCheck/square/blue.css') }}">


    <!-- Google Font -->
    <link rel="stylesheet"
        href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
</head>

<body class="hold-transition login-page">
    <div class="container">
        <div class="row">
            <div class="login-box">
                <div class="login-logo">
                    <img src="{{ asset('img/pertamina2.png') }}" class="center" style="width:120px">
                    <h3><b>SISTEM INFORMASI <br>MANAJEMEN KEPEGAWAIAN</b></h3>
                    <div class="title">
                        <h5 style="font-size:14px">PT. PERTAMINA PATRA NIAGA</h5>
                    </div>
                    <style>
                        .center {
                            display: block;
                            margin-left: auto;
                            margin-right: auto;
                            width: 70%;
                        }
                    </style>
                </div>

                <!-- /.login-logo -->
                <div class="login-box-body">
                    <p class="login-box-msg">Sign in to start your session</p>

                    @if (session()->has('success'))
                        <div class="alert alert-success alert-dismissible" role="alert">
                            {{ session('success') }}
                            <button type="button" class="close" data-dismiss="alert"
                                aria-hidden="true">&times;</button>
                        </div>
                    @endif

                    @if (session()->has('loginError'))
                        <div class="alert alert-danger alert-dismissible" role="alert">
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span
                                    aria-hidden="true">&times;</span></button>
                            {{ session('loginError') }}
                        </div>
                    @endif

                    <form action="/login" method="post">
                        @csrf
                        <div class="form-group has-feedback">
                            <input type="text" name="nip" class="form-control @error('nip') is-invalid @enderror"
                                placeholder="NIP" id="nip" autofocus required value="{{ old('nip') }}">
                            @error('nip')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                            <span class="glyphicon glyphicon-envelope form-control-feedback"></span>
                        </div>
                        <div class="form-group has-feedback">
                            <input type="password" name="password" class="form-control" placeholder="Password"
                                id="password" required>
                            <span class="glyphicon glyphicon-lock form-control-feedback"></span>
                        </div>

                        <div class="form-group">
                            <input type="checkbox" onclick="myFunction()"> Show Password
                        </div>

                        <script>
                            function myFunction() {
                                var x = document.getElementById("password");
                                if (x.type === "password") {
                                    x.type = "text";
                                } else {
                                    x.type = "password";
                                }
                            }
                        </script>

                        <div class="row">
                            <div class="col-xs-12">
                                <button type="submit" class="btn btn-danger btn-block btn-flat">Sign In</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>

            <!-- jQuery 3 -->
            <script src="AdminLte-2/bower_components/jquery/dist/jquery.min.js"></script>
            <!-- Bootstrap 3.3.7 -->
            <script src="AdminLte-2/bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
            <!-- FastClick -->
            <script src="AdminLte-2/bower_components/fastclick/lib/fastclick.js"></script>
            <!-- AdminLTE App -->
            <script src="AdminLte-2/dist/js/adminlte.min.js"></script>
            <!-- AdminLTE for demo purposes -->
            <script src="AdminLte-2/dist/js/demo.js"></script>
        </div>
    </div>
</body>

</html>
