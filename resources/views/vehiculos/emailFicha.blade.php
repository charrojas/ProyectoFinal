@extends('app')

@section('contenido')
    <div class="container">
        <h4  class="mb-3" style="font-family: 'Roboto', sans-serif; color: #59ab6e">Contactar por correo.</h4>

        <form id="emailForm" action="{{ route('enviarCorreoPropietario') }}" method="POST">
            @csrf

            <div class="row mb-3">
                <div class="col-md-6 mb-3">
                    <div class="form-group">
                        <label for="name">Nombre:</label>
                        <input type="text" class="form-control" style="background-color: #f2f2f2;" id="name" name="name" required>
                    </div>
                </div>
                <div class="col-md-6 mb-3">
                    <div class="form-group">
                        <label for="email">Correo electrónico:</label>
                        <input type="email" class="form-control" style="background-color: #f2f2f2;" id="email" name="email" required>
                    </div>
                </div>
            </div>

            <div class="form-group mb-3">
                <label for="phone">Teléfono:</label>
                <input type="tel" class="form-control" style="background-color: #f2f2f2;" id="phone" name="phone" required>
            </div>
 
            <div class="form-group mb-3">
                <label for="description">Descripción:</label>
                <textarea class="form-control" style="background-color: #f2f2f2;" id="description" name="description" rows="5" style="resize: vertical;" required>
                    El usuario {{ $user->name }} está interesado en el vehículo {{ $vehiculo->nombre }} {{ $vehiculo->marca->nombre }}, {{ $vehiculo->modelo }}
                </textarea>
            </div>

            <input type="hidden" name="id_vehiculo" value="{{ $vehiculo->id_vehiculo }}">

            <button type="submit" class="btn btn-primary">Enviar</button>
        </form>
    </div>
@endsection
