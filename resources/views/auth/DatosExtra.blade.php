<!DOCTYPE html>
<html lang="en">

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
        <form action="/guardar-informacion" method="POST" class="login">
            @csrf
            <div>
                <p class="title">Bienvenido a CRautos. Para continuar, ingresa los siguientes datos.</p>
        
                <input type="text" name="telefono" placeholder="Teléfono" autofocus />
                <i class="fa fa-phone"></i>
                <input type="text" name="direccion" placeholder="Dirección" autofocus />
                <i class="fa fa-map-marker-alt"></i>
        
                <input type="hidden" name="provider_id" value="{{ $providerId }}">
        
                <div class="float-end">
                    <button class="btn btn-primary btn-login rounded-pill" type="submit">
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
