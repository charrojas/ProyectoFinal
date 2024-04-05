@extends('app')

@section('contenido')
    <div class="container mt-5">
        <h1 class="mb-4" style="font-family: 'Roboto', sans-serif; color: #59ab6e">Tus vehículos</h1>

        @foreach ($vehiculos as $vehiculo)
            <div class="card mb-3 shadow">
                <div class="card-body">
                    <div class="row">
                        <div class="col-lg-8">
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
                        <div class="col-lg-4">
                            <div class="col-12 mx-3 mb-3">
                                <h5 class="card-title" style="color: #59ab6e"><strong>Marca:</strong> {{ $vehiculo->marca->nombre }}</h5>
                                <p class="card-text"><strong>Modelo:</strong> {{ $vehiculo->modelo }}</p>
                                <p class="card-text"><strong>Precio:</strong> <span class="text-success">₡{{ $vehiculo->precio }}</span></p>
                            </div>
                            <div class="d-flex flex-row mb-3">
                                <a class="btn btn-sm btn-info text-white w-100 me-2" href="{{ route('vehiculos.marcar-vendido', ['id' => $vehiculo->id_vehiculo]) }}">Marcar como Vendido</a>
                                <div class="btn btn-sm btn-{{ $vehiculo->vendido ? 'danger' : 'success' }} w-100" >
                                    {{ $vehiculo->vendido ? 'Vendido' : 'Disponible' }}
                                    <span class="bi {{ $vehiculo->vendido ? 'bi-check' : 'bi-x' }}"></span>
                                </div>
                            </div>
                            <div class="d-flex flex-row mb-3">
                                <div class="me-2" style="flex: 1;">
                                    <a href="{{route('vehiculos.show', $vehiculo)}}" class="btn btn-outline-primary w-100">Ver mi vehículo</a>
                                </div>
                                <div class="ms-2" style="">
                                    <a href="{{route('vehiculos.edit', $vehiculo)}}" class="btn btn-outline-warning w-100">Editar mi vehículo</a>
                                </div>
                            </div>
                            <form action="{{route('vehiculos.destroy', $vehiculo)}}" method="POST">
                                @csrf
                                @method('DELETE')
                                <button class="btn btn-outline-danger form-control my-2">Eliminar mi Vehiculo</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            <hr>
        @endforeach
    </div>
@endsection
