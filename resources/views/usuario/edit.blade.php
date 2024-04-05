@extends('app')

<link rel="stylesheet" href="{{ asset('/css/stylePerfil.css') }}">

@section('contenido')
    <div class="container py-5 h-100">
        <div class="row d-flex justify-content-center align-items-center h-100">
            <div class="col col-lg-6 mb-4 mb-lg-0">
                <div class="card mb-3" style="border-radius: .5rem;">
                    <form action="{{ route('perfil.update', $perfil->id) }}" method="POST">
                        @csrf
                        @method('PUT')
                        <div class="row g-0">
                            <div class="col-md-4 gradient-custom text-center text-white"
                                style="border-top-left-radius: .5rem; border-bottom-left-radius: .5rem;">
                                <img src="{{ Auth::user()->avatar }}" alt="Avatar" class="img-fluid my-5 rounded-circle"
                                    style="width: 120px;" />
                                <h5>
                                    <input type="text" class="form-control transparent-input text-center" id="name"
                                        name="name" value="{{ Auth::user()->name }}">
                                </h5>


                            </div>
                            <div class="col-md-8">
                                <div class="card-body p-4">
                                    <h6>Editar perfil</h6>

                                    <hr class="mt-0 mb-4">
                                    <div class="row pt-1">
                                        <div class="col-6 mb-3">
                                            <h6>Email</h6>
                                            <p class="text-muted">
                                                {{ Auth::user()->email }}
                                            </p>
                                        </div>
                                        <div class="col-6 mb-3">
                                            <h6>Teléfono</h6>
                                            <p class="text-muted">
                                                <input type="text" class="form-control" id="telefono" name="telefono"
                                                    value="{{ $perfil->telefono }}">
                                            </p>
                                        </div>
                                    </div>
                                    <hr class="mt-0 mb-4">
                                    <div class="row pt-1">
                                        <div class="col-6 mb-3">
                                            <h6>Dirección</h6>
                                            <p class="text-muted">
                                                <input type="text" class="form-control" id="direccion" name="direccion"
                                                    value="{{ $perfil->direccion }}">
                                            </p>
                                        </div>
                                        <div class="col-6 mb-3">

                                            <h6>Actualizar perfil</h6>
                                            <button type="submit" class="btn btn-link">
                                                <i class="fas fa-edit fa-lg me-3 mb-3 text-decoration-none"></i>
                                            </button>

                                        </div>
                                    </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    </div>
    </div>
    </div>
@endsection
