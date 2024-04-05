<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Bienvenido a nuestra aplicación</title>
</head>
<body>
    <h1>Bienvenido, {{ $user->name }}!</h1>
    
    <p>Gracias por registrarte en nuestra aplicación. Estamos encantados de tenerte como parte de nuestra comunidad.</p>
    
    <p>A continuación, encontrarás tus datos de inicio de sesión:</p>
    
    <ul>
        <li><strong>Nombre de usuario:</strong> {{ $user->name }}</li>
        <li><strong>Correo electrónico:</strong> {{ $user->email }}</li>
    </ul>
    
    <p>Para comenzar a utilizar la aplicación, visita nuestro sitio web en <a href="{{ route('paginas.index') }}">aquí</a>.</p>
    
    <p>Si tienes alguna pregunta o necesitas ayuda, no dudes en contactarnos. ¡Disfruta tu experiencia en nuestra aplicación!</p>
    
    <p>Saludos,</p>
    <p>El equipo de nuestra aplicación</p>
</body>
</html>
