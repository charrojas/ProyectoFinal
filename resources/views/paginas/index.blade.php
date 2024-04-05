@extends('app')

@section('contenidoSlider')
    <div class="row" id="carousel">
        <div class="owl-carousel owl-theme">

            <div class="slide slide-1"></div>

            <div class="slide slide-2"></div>

            <div class="slide slide-3"></div>
            
            <div class="slide slide-4"></div>

        </div>
    </div>
@endsection


@section('contenido')
<div class="container">
    @if (Auth::check())
    <h3 style="color: blue; font-size: 170%; font-family: 'Roboto', sans-serif;" class="mb-4">¿Qué deseas hacer?</h3>
    @else
    <h3 style="color: blue" class="mb-4">Registrate para poder acceder a todas 
    las funciones de la página.</h3>
    @endif
    <div class="row">
       
        <div class="col-12 d-flex justify-content-center mb-5">
            @if (Auth::check())
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
            @endif
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
                @if (Auth::check())
                <a href="{{ route('vehiculos.create') }}">
                    <img src="./img/1.png" alt="Agregar nuevo auto" class="img-fluid">
                </a>
                @else
                <a href="{{ route('login') }}">
                    <img src="./img/1.png" alt="Agregar nuevo auto" class="img-fluid">
                </a>
                @endif
                <p class="mt-2"></p>
            </div>
        </div>
    </div>
</div>

@endsection
