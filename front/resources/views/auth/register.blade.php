<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Register</title>
    <link rel="apple-touch-icon" sizes="57x57" href="http://placehold.it/57.png/000/fff">
    <link href="{{ asset('assets/back/css/lib/font-awesome.min.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/back/css/lib/themify-icons.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/back/css/lib/bootstrap.min.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/back/css/lib/helper.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/back/css/style.css') }}" rel="stylesheet">
</head>

<body class="bg-primary">

    <div class="container-fluid">
        <div class="row justify-content-center">
            <div class="col-lg-5">
                <div class="login-content">
                    <div class="login-form">
                        <h4>Register</h4>

                        @if (session('success'))
                            <div class="row">
                                <div class="col-12">
                                    <div class="alert alert-success text-center mt-2 mb-2" role="alert">
                                        <strong>{{ session('success') }}</strong>
                                    </div>
                                </div>
                            </div>
                        @endif

                        @if (session('status'))
                            <div class="row">
                                <div class="col-12">
                                    <div class="alert alert-danger text-center mt-2 mb-2" role="alert">
                                        <strong>{{ session('status') }}</strong>
                                    </div>
                                </div>
                            </div>
                        @endif

                        <form method="POST" action="{{ Route('register.submit') }}">
                            @csrf
                            <div class="form-group">
                                <label>Name</label>
                                <input type="text" class="form-control pl-3" name="name" required autofocus>
                            </div>
                            <div class="form-group">
                                <label>Email address</label>
                                <input type="email" class="form-control pl-3" name="email" required>
                            </div>
                            <div class="form-group">
                                <label>Password</label>
                                <input type="password" class="form-control pl-3" name="password" required>
                            </div>
                            <div class="form-group">
                                <label>Password Confirmation</label>
                                <input type="password" class="form-control pl-3" name="password_confirm" required>
                            </div>
                            <button type="submit" class="btn btn-primary btn-flat m-b-30 m-t-30">DAFTAR</button>
                        </form>

                        <div class="text-center">
                            <a class="text-primary" href="{{ Route("login") }}">Sudah mempunyai akun ?</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    
</body>

</html>
