@extends('app')

<link rel="stylesheet" href="{{ asset('/css/stylePerfil.css') }}">

@section('contenido')
    <div class="container py-5 h-100">
        <div class="row d-flex justify-content-center align-items-center h-100">
            <div class="col col-lg-6 mb-4 mb-lg-0">
                <div class="card mb-3" style="border-radius: .5rem;">
                    <div class="row g-0">
                        <div class="col-md-4 gradient-custom text-center text-white"
                            style="border-top-left-radius: .5rem; border-bottom-left-radius: .5rem;">
                            <img src="{{ Auth::user()->avatar }}" alt="Avatar" class="img-fluid my-5 rounded-circle"
                                style="width: 120px;" />

                            <h5>{{ Auth::user()->name }}</h5>
                        </div>
                        <div class="col-md-8">
                            <div class="card-body p-4">
                                <h6>Información</h6>
                                <hr class="mt-0 mb-4">
                                <div class="row pt-1">
                                    <div class="col-6 mb-3">
                                        <h6>Email</h6>
                                        <p class="text-muted">{{ Auth::user()->email }}</p>
                                    </div>
                                    <div class="col-6 mb-3">
                                        <h6>Teléfono</h6>
                                        <p class="text-muted"> {{ Auth::user()->telefono }}</p>
                                    </div>
                                </div>
                                <hr class="mt-0 mb-4">
                                <div class="row pt-1">
                                    <div class="col-6 mb-3">
                                        <h6>Dirección</h6>
                                        <p class="text-muted">{{ Auth::user()->direccion }}</p>
                                    </div>
                                    <div class="col-6 mb-3">
                                        <div>
                                            <h6>Editar perfil</h6>
                                            <form action="{{ route('perfil.edit', ['perfil' => Auth::user()->id]) }}"
                                                method="GET">
                                                @csrf
                                                <button type="submit" class="btn btn-link">
                                                    <i class="fas fa-edit fa-lg me-3 mb-3 text-decoration-none"></i>
                                                </button>
                                            </form>
                                        </div>
                                        <div>
                                            <h6>Eliminar perfil</h6>
                                            <form action="{{ route('perfil.destroy', ['perfil' => Auth::user()->id]) }}"
                                                method="POST">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-link">
                                                    <i class="fas fa-trash fa-lg me-3 text-decoration-none"></i>
                                                </button>
                                            </form>
                                        </div>
                                    </div>
                                </div>

                               
                               
                                <div class="row">
                                    <div class="col-6">
                                        <a href="{{route('vehiculos.misFavoritos')}}" class="btn btn-mis-favoritos text-white" style="background-color: rgb(82, 151, 248);">Mis
                                            favoritos</a>
                                    </div>
                                    <div class="col-6">
                                        <a href="{{route('vehiculos.misVehiculos')}}" class="btn btn-mis-vehiculos text-white" style="background-color: rgb(109, 113, 153);">Mis vehículos</a>
                                    </div>
                                </div>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
