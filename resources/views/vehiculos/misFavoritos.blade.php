@extends('app')

@section('contenido')
<div class="container mt-5">
    <h1 class="mb-4" style="font-family: 'Roboto', sans-serif;">Tus vehículos Favoritos</h1>

    <div class="row">
        @foreach ($vehiculos as $vehiculo)
        <div class="col-md-4">
            <div class="card mb-4 product-wap rounded-0">
                <div class="card-body">
                    <a class="text-decoration-none" href="#" style="color: black">
                        <h4>{{ $vehiculo->marca->nombre }}</h4>
                    </a>
                    @if ($vehiculo->imagenes->first())
                    <img src="{{ $vehiculo->imagenes->first()->imagen_url }}" alt="Imagen del vehículo"
                        class="img-fluid" style="max-width: 100%; max-height: 100%;">
                    @endif
                </div>
                <div class="card-footer bg-white">
                    <div class="row">
                        <div class="col-12">
                            <h5 class="card-title">{{ $vehiculo->marca->nombre }}</h5>
                            <p class="card-text"><strong>Modelo:</strong> {{ $vehiculo->modelo }}</p>
                            <p class="card-text"><strong>Precio:</strong> {{ $vehiculo->precio }}</p>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-12">
                            <form action="{{ route('vehiculos.favoritos.eliminar', $vehiculo) }}" method="POST">
                                @csrf
                                @method('DELETE')
                                <button class="btn btn-danger form-control my-2">Eliminar de Favoritos</button>
                            </form>
                            
                        </div>
                    </div>
                </div>
            </div>
        </div>
        @endforeach
    </div>
</div>
@endsection
