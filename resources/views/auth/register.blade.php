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
    <form class="login" action="{{ route('registro.create') }}" method="POST">
    @csrf
            <div>
                <p class="title">Mi Crautos</p>

                <input type="text" placeholder="Nombre" autofocus name="nombre" />
                <i class="fa fa-user"></i>
                <input type="text" placeholder="Email" autofocus name="email" />
                <i class="fa fa-envelope"></i>
                <input type="password" placeholder="Contraseña" name="password" />
                <i class="fa fa-key"></i>
                <input type="text" placeholder="Teléfono" autofocus name="telefono" />
                <i class="fa fa-phone"></i>
                <input type="text" placeholder="Dirección" autofocus name="direccion" />
                <i class="fa fa-map-marker-alt"></i>

                <div class=" float-end">
                    <button class="btn btn-primary btn-login rounded-pill">
                        <span class="" role="status" aria-hidden="true"></span>
                        <span class="state">Registrar</span>
                    </button>
                </div>
            </div>

        </form>
    </div>
</body>


<script src="{{ asset('js/script.js') }}"></script>


</html>
