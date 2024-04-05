<!DOCTYPE html>
<html lang="en">

</html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Inicio de Sesión</title>
    <meta name="csrf-token" content="6DFkLg62Bf65BWsbcIq1hSexBi6Ki5o5C4uy00HN">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta2/css/all.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/admin-lte/3.1.0/css/adminlte.min.css">
    <link rel="stylesheet" href="{{ asset('/css/styleLogin.css') }}">


</head>

<body class="hold-transition login-page">
    <div class="wrapper">
        <form class="login">
            <div>
                <p class="title">Mi Crautos</p>

                <input type="text" placeholder="Email" autofocus />
                <i class="fa fa-user"></i>
                <input type="password" placeholder="Contraseña" />
                <i class="fa fa-key"></i>
                <div class=" float-end">
                    <button class="btn btn-primary btn-login rounded-pill">
                        <span class="" role="status" aria-hidden="true"></span>
                        <span class="state">Ingresar</span>
                    </button>
                </div>
            </div>

            <hr>
            <span class="d-block text-left text-muted">O ingresar con:</span>
            <div class="social-login">
                <a href="{{ route('login.provider', 'google') }}" class="google">
                    <a href="{{ url('login-google') }}" class="google">
                        <span class="icon-google mr-3"></span>
                    </a>
            </div>

            <div class="row mx-gutters-2 mb-1 text-center">
                <div class="col-sm-12">
                    <a href="{{ route('login.provider', 'google') }}"
                        class="btn btn-primary btn-sm rounded-circle d-flex justify-content-center align-items-center"
                        style="background-color: #dd4b39; width: 40px; height: 40px; border: 0; color: white;">
                        <i class="fab fa-google"></i>
                    </a>


                </div>
            </div>
        </form>


    </div>
</body>


<script src="{{ asset('js/script.js') }}"></script>


</html>
