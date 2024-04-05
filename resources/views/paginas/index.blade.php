@extends('app')

@section('contenidoSlider')
    <div class="row" id="carousel">
        <div class="owl-carousel owl-theme">

            <div class="slide slide-1"></div>

            <div class="slide slide-2"></div>

            <div class="slide slide-3"></div>

        </div>
    </div>
@endsection


@section('contenido')
<div class="container">
    <h3 style="color: blue" class="mb-4">¿Qué deseas hacer?</h3>
    <div class="row">
        <!-- Botones para ver autos en venta y ver favoritos -->
        <div class="col-12 d-flex justify-content-center mb-5">
            <div class="d-flex flex-column align-items-center mx-3">
                <a href="{{ route('vehiculos.misVehiculos') }}" class="btn btn-lg  text-white">
                    <img src="./img/vermiautosenventa.png" alt="Ver mis autos en venta" class="img-fluid">
                </a>
                <p class="mt-2"></p>
            </div>

            <div class="d-flex flex-column align-items-center mx-3">
                <a href="{{ route('vehiculos.misFavoritos') }}" class="btn btn-lg  text-white">
                    <img src="./img/vermisfavoritos.png" alt="Ver mis favoritos" class="img-fluid">
                </a>
                <p class="mt-2"></p>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-12 d-flex justify-content-center">
            <div class="d-flex flex-column align-items-center mx-3">
                <a href="{{ route('vehiculos.index') }}">
                    <img src="./img/carss.png" alt="Ver todos los autos" class="img-fluid">
                </a>
                <p class="mt-2"></p>
            </div>

            <div class="d-flex flex-column align-items-center mx-3">
                <a href="{{ route('vehiculos.create') }}">
                    <img src="./img/1.png" alt="Agregar nuevo auto" class="img-fluid">
                </a>
                <p class="mt-2"></p>
            </div>
        </div>
    </div>
</div>

@endsection
