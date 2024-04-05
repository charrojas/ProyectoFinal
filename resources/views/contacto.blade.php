@extends('app')

@section('contenido')
    <div class="container py-5">

        <h2 style="color: rgba(19, 160, 19, 0.7);font-family: 'Roboto';">Ponte en contacto con nosotros</h2>

        <div class="row py-5">
            <form method="POST" action="{{ route('enviar_correo') }}">
                @csrf {{-- Agrega el token CSRF para protección contra ataques de falsificación de solicitudes entre sitios --}}
                <div class="row">
                    <div class="form-group col-md-6 mb-3">
                        <label for="inputname">Nombre:</label>
                        <input type="text" class="form-control mt-1" id="name" name="name" placeholder="Nombre" style="background-color: #f2f2f2;">
                    </div>
                    <div class="form-group col-md-6 mb-3">
                        <label for="inputemail">Email:</label>
                        <input type="email" class="form-control mt-1" id="email" name="email" placeholder="Email" style="background-color: #f2f2f2;">
                    </div>                    
                </div>
                <div class="mb-3">
                    <label for="inputsubject">Asunto:</label>
                    <input type="text" class="form-control mt-1" id="subject" name="subject" placeholder="Asunto" style="background-color: #f2f2f2;">
                </div>
                <div class="mb-3">
                    <label for="inputmessage">Mensaje:</label>
                    <textarea class="form-control mt-1" id="message" name="message" placeholder="Mensaje" rows="8" style="background-color: #f2f2f2;"></textarea>
                </div>
                <div class="row">
                    <div class="col text-end mt-2">
                        <button type="submit" class="btn btn-success btn-lg px-3">Enviar.</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
@endsection
