@extends('app')

@section('contenido')
    <div class="container mt-5">
        <h1 class="mb-4">Tus vehículos</h1>

        @foreach ($vehiculos as $vehiculo)
            <div class="card mb-3 shadow">
                <div class="card-body">
                    <div class="row">
                        <div class="col-8">
                            <div class="row">
                                <div class="col-12">
                                    <div class="my-3 mx-3" style="width: 100%; height: 100%;">
                                    @if ($vehiculo->imagenes->first())
                                        <img src="{{ $vehiculo->imagenes->first()->imagen_url }}" alt="Imagen del vehículo"
                                            class="img-fluid" style="max-width: 100%; max-height: 100%;">
                                    @endif
                                    </div>
                                </div>

                            </div>
                        </div>
                        <div class="col-4">
                            <div class="col-12 mx-3">
                                <h5 class="card-title"><strong>Marca:</strong> {{ $vehiculo->marca->nombre }}</h5>
                                <p class="card-text"><strong>Modelo:</strong> {{ $vehiculo->modelo }}</p>
                                <p class="card-text"><strong>Precio:</strong> {{ $vehiculo->precio }}</p>
                            </div>
                            <div class="d-flex justify-content-end">

                                <a class="btn btn-sm btn-info text-white me-2 form-control" href="{{ route('vehiculos.marcar-vendido', ['id' => $vehiculo->id_vehiculo]) }}">Marcar como Vendido</a>
                                <div class="btn btn-sm btn-{{ $vehiculo->vendido ? 'danger' : 'success' }} form-control">
                                    {{ $vehiculo->vendido ? 'Vendido' : 'Disponible' }}
                                    <span class="bi {{ $vehiculo->vendido ? 'bi-check' : 'bi-x' }}"></span>
                                </div>
                            </div>
                            <a href="{{route('vehiculos.show', $vehiculo)}}" class="btn btn-secondary form-control my-2">Ver mi vehiculo</a>
                            <a href="{{route('vehiculos.edit', $vehiculo)}}" class="btn btn-warning form-control my-2 text-white">Editar mi vehiculo</a>
                            <form action="{{route('vehiculos.destroy', $vehiculo)}}" method="POST">
                                @csrf
                                @method('DELETE')
                                <button class="btn btn-danger form-control my-2">Eliminar Vehiculo</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            <hr>
        @endforeach
    </div>
@endsection
