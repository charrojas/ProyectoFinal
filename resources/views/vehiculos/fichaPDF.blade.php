<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Ficha del Vehículo</title>
    <style>
        
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
        }
        .container {
            max-width: 800px;
            margin: 0 auto;
            padding: 20px;
        }
        h1 {
            text-align: center;
            margin-bottom: 20px;
        }
        .vehiculo-info {
            margin-top: 20px;
        }
        .vehiculo-info table {
            width: 100%;
            border-collapse: collapse;
        }
        .vehiculo-info table td {
            padding: 10px;
            border: 1px solid #ccc;
        }
        .imagen-vehiculo {
            max-width: 100%;
            display: block;
            margin-bottom: 20px;
        }
        ul {
            list-style-type: none;
            padding: 0;
        }
        li {
            margin-bottom: 10px;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>Ficha del Vehículo - CRAutos.com</h1>
        <hr>


        @foreach($imagenes as $imagen)
            <img src="{{ public_path($imagen->imagen_url) }}" alt="Imagen del vehículo" style="width: 200px; height: 200px; object-fit: cover; margin-top: 100px;">
        @endforeach

        <hr>

        <div class="vehiculo-info">
            <h2>Marca: {{ $vehiculo->marca->nombre }}</h2>
            <p>Precio: {{ $vehiculo->precio }}</p>

            <ul>
                <li><strong>Dueño:</strong> {{$vehiculo->usuario->name}}</li>
                <li><strong>Modelo:</strong> {{ $vehiculo->modelo }}</li>
                <li><strong>Año:</strong> {{ $vehiculo->año }}</li>
                <li><strong>Estilo:</strong> {{ $vehiculo->estilo->nombre }}</li>
                <li><strong>Transmisión:</strong> {{ $vehiculo->transmision }}</li>
                <li><strong>Cilindraje:</strong> {{ $vehiculo->cilindraje }}</li>
                <li><strong>Combustible:</strong> {{ $vehiculo->combustible }}</li>
                <li><strong>Cantidad de Puertas:</strong> {{ $vehiculo->cantidad_puertas }}</li>
                <li><strong>Color Exterior:</strong> {{ $vehiculo->colorExterior->nombre }}</li>
                <li><strong>Color Interior:</strong> {{ $vehiculo->colorInterior->nombre }}</li>
                <li><strong>Recibe:</strong> {{ $vehiculo->recibe }}</li>
            </ul>
        </div>
    </div>
</body>
</html>
