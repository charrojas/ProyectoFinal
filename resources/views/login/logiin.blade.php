<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link href="https://fonts.googleapis.com/css?family=Roboto:300,400&display=swap" rel="stylesheet">

    <link rel="stylesheet" href="/libsLogin/fonts/icomoon/style.css">

    <link rel="stylesheet" href="/libsLogin/css/owl.carousel.min.css">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="/libsLogin/css/bootstrap.min.css">

    <!-- Style -->
    <link rel="stylesheet" href="/libsLogin/css/style.css">


    <link rel="stylesheet" href="{{ asset('css/style.css') }}">


    <title>Ingresar</title>
</head>

{{-- <body>
    <div class="content"
        style="   background: linear-gradient(to right, #3d3d3d, #928f99);
            width: 100vw; height: 120vh; position: relative; overflow: hidden;">

        <div class="container">
            <div class="row justify-content-center">
                <div class="col-sm-6">
                    <div class="card">
                        <div class="card-body">
                            <div class="mb-4">
                                <h3><strong>Mi crautos</strong></h3>
                                <p class="mb-4">Para ingresar a Micrautos debe registrarse primero en nuestro sitio
                                    web www.crautos.com Si ya se registró, por favor ingrese su correo electrónico y su
                                    clave de acceso a continuación:</p>
                            </div>
                            <form method="POST" action="{{ route('login') }}">
                                @csrf
                                <div class="form-group first">
                                    <label for="username">Usuario</label>
                                    <input type="text" class="form-control" id="username">
                                </div>
                                <div class="form-group last mb-4">
                                    <label for="password">Contraseña</label>
                                    <input type="password" class="form-control" id="password">
                                </div>
                                <div class="d-flex mb-5 align-items-center">
                                    <label class="control control--checkbox mb-0">
                                        <span class="caption">Recuérdame</span>
                                        <input type="checkbox" checked="checked" />
                                        <div class="control__indicator bg-dark"></div>
                                    </label>
                                    <span class="ml-auto"><a href="#" class="forgot-pass">Olvidé
                                            contraseña</a></span>
                                </div>
                                <input type="submit" value="Ingresar" class="btn text-white btn-block bg-dark">
                                <hr>
                                <span class="d-block text-left my-4 text-muted">O ingresar con:</span>
                                <div class="social-login">
                                    <a href="{{ route('login.provider', 'google') }}" class="google">
                                    <a href="{{ url('login-google') }}" class="google">
                                    <span class="icon-google mr-3"></span>
                                    </a>
                                </div>

                                <div class="row mx-gutters-2 mb-1 text-center">
                                    <div class="col-sm-12 mb-2">
                                        <a href="{{ route('login.provider', 'google') }}" class="btn btn-primary btn-lg btn-block"
                                            style="background-color: #dd4b39;width: 74%;;border: 0px;" >
                                            <i class="fab fa-google me-2"></i>Continue with google</button>
                                        </a>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>


    <script src="js/jquery-3.3.1.min.js"></script>
    <script src="js/popper.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/main.js"></script>
</body> --}}

</html>
