@extends('app')

@section('contenido')
<div class="container mt-5">
    <h1 class="mb-4" style="font-family: 'Roboto', sans-serif; color: #59ab6e">Tus vehículos Favoritos</h1>

    <div class="row">
        @foreach ($vehiculos as $vehiculo)
        <div class="col-md-4">
            <div class="card mb-4 product-wap rounded-0 d-flex flex-column h-100">
                <div class="card-body">
                    <a class="text-decoration-none" href="#" style="color: #59ab6e">
                        <h4>{{ $vehiculo->marca->nombre }}</h4>
                    </a>
                    @if ($vehiculo->imagenes->first())
                    <div class="image-container">
                        <img class="card-img rounded-0 img-fluid"
                            src="{{ $vehiculo->imagenes->first()->imagen_url }}" alt="Imagen del vehículo">
                    </div>
                    @endif
                    </div>
                    <div class="card-footer bg-white">
                <div class="row">
                    <div class="col-12">
                        <div class="card-body">
                            <a href="#" class="h3 text-decoration-none">
                                <h5>{{ $vehiculo->modelo }} - {{$vehiculo->año}}</h5>
                            </a>
                            <p class="text-center mb-0">Transmisión: <span class="text-secondary">{{ $vehiculo->transmision }}</span></p>
                            <p class="text-center mb-0">Cilindraje: <span class="text-secondary">{{ $vehiculo->cilindraje }}</span></p>
                            <p class="text-center mb-0 text-success">
                                ₡ {{ $vehiculo->precio }}</p>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-12">
                        <a href="{{route('vehiculos.show', $vehiculo)}}" class="btn form-control text-white" style="background-color: #59ab6e">Ver vehículo</a>
                        <form action="{{ route('vehiculos.favoritos.eliminar', $vehiculo) }}" method="POST">
                            @csrf
                            @method('DELETE')
                            <button class="btn btn-danger form-control my-2">Eliminar de Favoritos</button>
                        </form>
                        <p><strong>Vendido:</strong>
                            @if ($vehiculo->vendido)
                                <span class="text-success">Sí</span> <i class="fas fa-check text-success"></i>
                            @else
                                <span class="text-danger">No</span> <i class="fas fa-times text-danger"></i>
                            @endif
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @endforeach
</div>
<style>
    .image-container {
        height: 200px; 
        display: flex;
        align-items: center;
        justify-content: center;
        overflow: hidden; 
    }

    .image-container img {
        width: 100%; 
        height: 100%; 
        object-fit: cover; 
    }
</style>

@endsection
