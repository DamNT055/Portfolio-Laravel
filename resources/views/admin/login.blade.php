<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>AdminPage Login</title>

    <!-- Google Font: Source Sans Pro -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="{{asset('backend/plugins/fontawesome-free/css/all.min.css')}}">
    <!-- icheck bootstrap -->
    <link rel="stylesheet" href="{{asset('backend/plugins/icheck-bootstrap/icheck-bootstrap.min.css')}}">
    <!-- Theme style -->
    <link rel="stylesheet" href="{{asset('backend/css/adminlte.min.css')}}">

</head>
<body class="hold-transition login-page">
    <div class="login-box">
        <!-- /.login-logo -->
        <div class="card card-outline card-primary">
            <div class="card-header text-center">
                <a href="{{URL::to('/login')}}" class="h1"><b>Admin</b>Page</a>
            </div>
            <div class="card-body">
                <p class="login-box-msg">Sign in to start your session</p>

                <form id="login_form_id" method="post">
                    {{ csrf_field() }}
                    <div class="alert-group">
                        <div id="danger_id" class="alert alert-danger" role="alert" style="display:none">
                            A simple danger alert—check it out!
                        </div>
                        <div id="success_id" class="alert alert-success" role="alert" style="display:none">
                            A simple success alert—check it out!
                        </div>
                    </div>
                    <div class="input-group mb-3">
                        <input name="username" type="email" class="form-control" placeholder="Email">
                        <div class="input-group-append">
                            <div class="input-group-text">
                                <span class="fas fa-envelope"></span>
                            </div>
                        </div>
                    </div>
                    <div class="input-group mb-3">
                        <input name="password" type="password" class="form-control" placeholder="Password">
                        <div class="input-group-append">
                            <div class="input-group-text">
                                <span class="fas fa-lock"></span>
                            </div>
                        </div>
                    </div>
                    <div class="row justify-content-center">
                        <!-- /.col -->
                        <div class="col-6">
                            <button type="button" onclick="sendLogin()" class="btn btn-primary btn-block">Sign In</button>
                        </div>
                        <!-- /.col -->
                    </div>
                </form>
            </div>
            <!-- /.card-body -->
        </div>
        <!-- /.card -->
    </div>
    <!-- /.login-box -->

    <!-- jQuery -->
    <script src="{{asset('backend/plugins/jquery/jquery.min.js')}}"></script>
    <!-- Bootstrap 4 -->
    <script src="{{asset('backend/plugins/bootstrap/js/bootstrap.bundle.min.js')}}"></script>

    <!-- AdminLTE App -->
    <script src="{{asset('backend/js/adminlte.min.js')}}"></script>

    <script>
        function sendLogin() {
            let URL = "{{ URL::to('/auth-pass') }}";
            $("#danger_id").hide();
            $("#success_id").hide();
            $.ajax({
                type: "POST"
                , url: URL
                , data: $("#login_form_id").serialize()
                , dataType: 'json'
                , success: function(json) {
                    if (!json.error) {
                        $("#success_id").html(json.msg);
                        $("#success_id").show();
                        setTimeout(() => {
                            window.location.href = json.data;
                        }, 1000);
                    } else {
                        $("#danger_id").html(json.msg);
                        $("#danger_id").show();
                    }
                }
            })
        }

    </script>


</body>
</html>
