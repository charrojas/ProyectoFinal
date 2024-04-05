@extends('app')

@section('contenidoSlider')
    <div class="contenedor"
        style="width: 100%; height: 500px; background-image: url('/img/deportivos.png'); background-size: cover; background-repeat: no-repeat; background-position: center; display: flex; align-items: center; justify-content: center;">
        @if (Auth::check())
            <a href="{{ route('vehiculos.create') }}" class="btn" style="font-family: 'serif', sans-serif;">
                <h2>ANUNCIA TU VEHÍCULO</h2>
                <h3>¡Haz click aquí!</h3>
            </a>
        @else
            <a href="{{ route('login') }}" class="btn" style="font-family: 'serif', sans-serif;">
                <h2>ANUNCIA TU VEHÍCULO</h2>
                <h3>¡Haz click aquí!</h3>
            </a>
        @endif
    </div>
@endsection
@section('contenido')

    <body>
        <div class="container py-1">
            <div class="row">
                <div class="col-lg-9 order-lg-2 order-1">

                    <div class="row">
                        <!--Inicio forEach Vehiculo--->
                        @foreach ($vehiculos as $vehiculo)
                            <div class="col-md-4">
                                <div class="card mb-4 product-wap rounded-0">
                                    <div class="card rounded-0">
                                        <a class="text-decoration-none" href="#" style="color: black">
                                            <h4>{{ $vehiculo->marca->nombre }}</h4>
                                        </a>
                                        @if ($vehiculo->imagenes->count() > 0)
                                            <img class="card-img rounded-0 img-fluid"
                                                src="{{ $vehiculo->imagenes->first()->imagen_url }}">
                                        @else
                                            <img class="card-img rounded-0 img-fluid" src="/img/Tacoma1.jpeg">
                                        @endif

                                        <div
                                            class="card-img-overlay rounded-0 product-overlay d-flex align-items-center justify-content-center">
                                            <ul class="list-unstyled">
                                                
                                                <form id="favorito-form"
                                                    action="{{ route('vehiculos.favoritos.agregar', ['vehiculo' => $vehiculo->id_vehiculo]) }}"
                                                    method="POST">
                                                    @csrf
                                                    <button type="submit" class="btn btn-success text-white"
                                                        style="background-color: transparent; border: none;"><i
                                                            class="far fa-heart"></i></button>

                                                    <input class="btn btn-success text-white"
                                                        style="background-color: transparent; border: none;" type="hidden"
                                                        name="id_vehiculo" value="{{ $vehiculo->id_vehiculo }}">
                                                </form>

                                                <li><a class="btn btn-success text-white mt-2"
                                                        href="{{ route('vehiculos.show', $vehiculo) }}"><i
                                                            class="far fa-eye"></i></a></li>
                                            </ul>
                                        </div>
                                    </div>
                                    <div class="card-body">
                                        <a href="#" class="h3 text-decoration-none">
                                            <h5>{{ $vehiculo->modelo }} - 2022</h5>
                                        </a>
                                        <p class="text-center mb-0">{{ $vehiculo->transmision }}</p>
                                        <p class="text-center mb-0">Cilindraje: {{ $vehiculo->cilindraje }}</p>
                                        <p class="text-center mb-0" style="color: rgb(6, 137, 224, 0.74)">
                                            {{ $vehiculo->precio }}</p>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                        <!--Fin forEach Vehiculo--->

                    </div>
                    <div class="row">
                        <div class="col-12">
                            <ul class="pagination pagination-lg justify-content-end">
                                <li class="page-item disabled">
                                    <a class="page-link active rounded-0 mr-3 shadow-sm border-top-0 border-left-0"
                                        href="#" tabindex="-1">1</a>
                                </li>
                                <li class="page-item">
                                    <a class="page-link rounded-0 mr-3 shadow-sm border-top-0 border-left-0 text-dark"
                                        href="#">2</a>
                                </li>
                                <li class="page-item">
                                    <a class="page-link rounded-0 shadow-sm border-top-0 border-left-0 text-dark"
                                        href="#">3</a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>

                <div class="col-lg-3 order-lg-1 order-2">
                                            <ul class="list-unstyled templatemo-accordion">
                                                <li class="pb-2">
                                                    <a class="collapsed d-flex justify-content-between h3 text-decoration-none"
                                                        href="#">Marcas</a>
                                                </li>
                                                <hr>
                                                @foreach ($marcas as $marca)
    <li>
                                
                                                        <div class="d-flex align-items-center">
                                                            <input class="form-check-input me-1" type="checkbox" value="{{ $marca->id_marca }}"
                                                                aria-label="...">
                                                            <span class="align-middle">{{ $marca->nombre }}</span>
                                                        </div>
                                                    </li>
    @endforeach
                                            </ul>
                                        </div>




            </div>
        </div>


    </body>


    <script>
        document.getElementById('filtroForm').addEventListener('submit', function(event) {
            event.preventDefault(); // Evita que se envíe el formulario de forma tradicional

            // Captura los valores seleccionados
            var checkboxes = document.getElementsByClassName('filtro-checkbox');
            var seleccionados = [];
            for (var i = 0; i < checkboxes.length; i++) {
                if (checkboxes[i].checked) {
                    seleccionados.push(checkboxes[i].value);
                }
            }

            // Agrega los valores seleccionados como parámetros de URL
            var url = this.getAttribute('action');
            url += '?marcas=' + seleccionados.join(',');

            // Realiza la solicitud al servidor
            window.location.href = url;
        });
    </script>
@endsection
