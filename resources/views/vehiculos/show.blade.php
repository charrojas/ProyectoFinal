@extends('app')

@section('contenido')
  
    <div class="modal fade bg-white" id="templatemo_search" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <div class="w-100 pt-1 mb-5 text-right">
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form action="" method="get" class="modal-content modal-body border-0 p-0">
                <div class="input-group mb-2">
                    <input type="text" class="form-control" id="inputModalSearch" name="q"
                        placeholder="Search ...">
                    <button type="submit" class="input-group-text bg-success text-light">
                        <i class="fa fa-fw fa-search text-white"></i>
                    </button>
                </div>
            </form>
        </div>
    </div>



    <div class="container">
        <div class="row">

          <div class="col-md-6">

            <div class="card mb-4">

              @if ($vehiculo->imagenes->isNotEmpty())
                <img src="{{ $vehiculo->imagenes->first()->imagen_url }}" class="card-img-top" alt="Imagen del vehículo">
              @else
   
                <img src="/img/carro_default.jpeg" class="card-img-top" alt="Imagen por defecto">
              @endif
            </div>

            <div class="card-group">
              @foreach ($vehiculo->imagenes as $imagen)
             <div class="col-4">
                <div class="card">
                    <a href="{{ $imagen->imagen_url }}" data-lightbox="mygallery"
                        class="d-block mb-4 h-100">
                        <img src="{{ $imagen->imagen_url }}" class="img-fluid img-thumbnail"
                            style="width: 400px; height: 200px;">
                    </a>
                </div>
             </div>
              @endforeach
            </div>

          </div>

          <div class="col-md-6">
            <div class="card shadow">

              <div class="card-body">
                <h5 class="card-title">Datos del vehiculo</h5>
              
                <div class="card">
                    <div class="card-body ml-5">
                        <div class="col-12">
                            <div class="">
                              <div class="position-relative">
                                <a href="{{ route('generarPDF', ['id' => $vehiculo->id_vehiculo]) }}"
                                  class="btn btn-danger btn-sm rounded-pill float-end">
                                  <i class="fa-solid fa-file-pdf" style="color: #ffffff;"></i>
                                  <span style="margin-left: 5px;">Descargar ficha del vehículo.</span>
                                </a>
                              </div>
                            </div>
                          </div>
                        <div class="col-12"> 
                        <h1 class="h2" style="text-align: left; margin-left: 5%; margin-top: 2%">Marca:
                            {{ $vehiculo->marca->nombre }}</h1>
                        <p class="h3 py-2" style="text-align: left; margin-left: 5%">Precio:  <span class="text-success">₡{{ $vehiculo->precio }}</span>
                        </p>

                        <ul class="list-inline" style="text-align: left; margin-left: 5%">
                            <li class="">
                                <p><strong>Dueño:</strong> {{$vehiculo->usuario->name}}</p>
                            </li>
                            
                            <li class="">
                                <p><strong>Modelo:</strong> {{ $vehiculo->modelo }}</p>
                            </li>
                            <li class="">
                                <p><strong>Año:</strong> {{ $vehiculo->año }}</p>
                            </li>
                            <li class="">
                                <p><strong>Estilo:</strong> {{ $vehiculo->estilo->nombre }}</p>
                            </li>
                            <li class="">
                                <p><strong>Transmision:</strong> {{ $vehiculo->transmision }}</p>
                            </li>
                            <li class="">
                                <p><strong>Cilindraje:</strong> {{ $vehiculo->cilindraje }}cc</p>
                            </li>
                            <li class="">
                                <p><strong>Combustible:</strong> {{ $vehiculo->combustible }}</p>
                            </li>
                            <li class="">
                                <p><strong>Cantidad Puertas:</strong> {{ $vehiculo->cantidad_puertas }}</p>
                            </li>
                            <li class="">
                                <p><strong>Color Exterior:</strong> {{ $vehiculo->colorExterior->nombre }}</p>
                            </li>
                            <li class="">
                                <p><strong>Color Interior:</strong> {{ $vehiculo->colorInterior->nombre }}</p>
                            </li>
                            <li class="">
                                <p><strong>Recibe:</strong>
                                    @if ($vehiculo->recibe)
                                        <span class="text-success">Sí</span> <i class="fas fa-check text-success"></i>
                                    @else
                                        <span class="text-danger">No</span> <i class="fas fa-times text-danger"></i>
                                    @endif
                                </p>
                            </li>
                            
                        </ul>

                        <div class="row pb-3">
                            <div class="col-6">
                                <div class="d-flex justify-content-start flex-wrap">

            <a href="https://www.facebook.com/sharer/sharer.php?u={{ urlencode(request()->fullUrl()) }}" class="btn btn-primary btn-sm rounded-pill mx-1">
                <i class="fab fa-facebook-f fa-fw"></i>
            </a>
                        <a href="https://twitter.com/intent/tweet?url={{ urlencode(request()->fullUrl()) }}" class="btn btn-info btn-sm rounded-pill mx-1">
                <i class="fab fa-twitter fa-fw text-white"></i>
            </a>
            <a href="https://plus.google.com/share?url={{ urlencode(request()->fullUrl()) }}" class="btn btn-danger btn-sm rounded-pill mx-1">
                <i class="fab fa-google-plus-g fa-fw"></i>
            </a>


                                </div>
                              </div>
                              <div class="col-6">
                                <div class="d-flex justify-content-end flex-wrap">
                                 

                                <?php $usuario = $vehiculo->usuario; ?>
                                <?php $numeroTelefono = optional($usuario)->telefono; ?>

                                @if ($numeroTelefono)
                                    <?php $mensaje = 'Hola, quiero hacer una consulta sobre el vehículo ' . $vehiculo->marca->nombre . ' en el modelo: ' . $vehiculo->modelo . '. Año: ' . $vehiculo->año . ', Precio: ' . $vehiculo->precio; ?>
                                    <a href="https://api.whatsapp.com/send?phone={{ $numeroTelefono }}&text={{ urlencode($mensaje) }}" target="_blank">
                                        <button class="btn btn-success btn-lg fab fa-whatsapp text-white float-end mx-1 contacto rounded-pill" name="submit" value="whatsapp">
                                            Enviar mensaje por WhatsApp
                                        </button>
                                    </a>
                                @else
                                    <p>No se ha proporcionado un número de teléfono para este vehículo.</p>
                                @endif

                                   


                                  {{-- Boton de Favoritos --}}
                                  @if (Auth::check())
                                    <a href="{{ route('vehiculos.enviarCorreo', ['id' => $vehiculo->id_vehiculo]) }}">
                                            <button class="btn btn-success btn-lg far fa-envelope text-white mx-1 contacto rounded-pill" type="button">
                                                Enviar correo
                                            </button>
                                        </a>
                                    <form id="favorito-form"
                                      action="{{ route('vehiculos.favoritos.agregar', ['vehiculo' => $vehiculo->id_vehiculo]) }}"
                                      method="POST">
                                      @csrf
                                      <button type="submit" class="btn btn-success btn-lg text-white mx-1 rounded-pill"
                                        style="background-color: transparent; border: none; height: 40px;">
                                        <i class="far fa-heart rounded-pill"></i>
                                      </button>
                                      <input class="btn btn-success text-white rounded-pill"
                                        style="background-color: transparent; border: none;" type="hidden" name="id_vehiculo"
                                        value="{{ $vehiculo->id_vehiculo }}">
                                    </form>
                                  @endif
                                  {{-- FIN Boton favoritos --}}
                                </div>
                                
                              </div>
                              
                        </div>

                    </div>

              </div>

            </div>

          </div>


        </div>
        </div>
    </div>



        <hr>
    <div>  
        <section class="py-5">
            <div class="container">
                <div class="row text-left p-2 pb-3">
                    <h4 style="font-family: 'serif', sans-serif;">Productos Relacionados</h4>
                </div>
                <div class="row">
                    {{-- Cargar Productos relacionados --}}
                    @foreach ($vehiculosRelacionados as $veh)
                    <div class="col-md-4">
                        <div class="card mb-4 product-wap rounded-0">
                            <div class="card rounded-0">
                                <a class="text-decoration-none text-center text-success" href="#">{{$veh->marca->nombre}}</a>
                                <img class="card-img rounded-0 img-fluid" src="{{$veh->imagenes->first()->imagen_url}}">
                                <div class="card-img-overlay rounded-0 product-overlay d-flex align-items-center justify-content-center">
                                    <ul class="list-unstyled">
                                        @if (Auth::check())
                                        <form id="favorito-form"
                                        action="{{ route('vehiculos.favoritos.agregar', ['vehiculo' => $vehiculo->id_vehiculo]) }}"
                                        method="POST">
                                        @csrf
                                        <button title="Agregar vehiculo a favoritos" type="submit" class="btn btn-success btn-lg text-white mx-1 rounded-pill"
                                            style="background-color: transparent; border: none; height: 40px;">
                                            <i class="far fa-heart rounded-pill"></i>
                                        </button>
                                        <input class="btn btn-success text-white rounded-pill"
                                            style="background-color: transparent; border: none;" type="hidden" name="id_vehiculo"
                                            value="{{ $vehiculo->id_vehiculo }}">
                                        </form>
                                        @endif
                                        <li><a title="Ver vehiculo" class="btn btn-success text-white mt-2" href="{{route('vehiculos.show', $veh)}}"><i
                                                    class="far fa-eye"></i></a></li>
                                    </ul>
                                </div>
                            </div>
                            <div class="card-body">
                                <a href="shop-single.html" class="h3 text-decoration-none">{{$veh->modelo}} - {{$veh->año}}</a>
                                <ul class="w-100 list-unstyled d-flex justify-content-between mb-0">
                                    <li class="pt-2">
                                        <span class="product-color-dot color-dot-red float-left rounded-circle ml-1"></span>
                                        <span class="product-color-dot color-dot-blue float-left rounded-circle ml-1"></span>
                                        <span class="product-color-dot color-dot-black float-left rounded-circle ml-1"></span>
                                        <span class="product-color-dot color-dot-light float-left rounded-circle ml-1"></span>
                                        <span class="product-color-dot color-dot-green float-left rounded-circle ml-1"></span>
                                    </li>
                                </ul>
                                <p class="text-center mb-0">{{$veh->transmision}}</p>
                                <p class="text-center mb-0">Cilindraje: {{$veh->cilindraje}}</p>
                                <p class="text-center mb-0 text-success">₡ {{$veh->precio}}</p>
                            </div>
                        </div>
                    </div>
                    @endforeach
                    {{-- Fin productos relacionados dinamico --}}
                </div>
            </div>
        </section>
    </div>

    <script>
        $('#carousel-related-product').slick({
            infinite: true,
            arrows: false,
            slidesToShow: 4,
            slidesToScroll: 3,
            dots: true,
            responsive: [{
                    breakpoint: 1024,
                    settings: {
                        slidesToShow: 3,
                        slidesToScroll: 3
                    }
                },
                {
                    breakpoint: 600,
                    settings: {
                        slidesToShow: 2,
                        slidesToScroll: 3
                    }
                },
                {
                    breakpoint: 480,
                    settings: {
                        slidesToShow: 2,
                        slidesToScroll: 3
                    }
                }
            ]
        });



        $(document).ready(function() {
  $('#btnContactarVendedor').click(function(event) {
    event.preventDefault(); 

    var vendedorId = $('#vendedorId').val();

    $.ajax({
      url: '/contactar-vendedor',
      method: 'POST',
      data: { vendedor_id: vendedorId },
      success: function(response) {
        alert(response.message);
      },
      error: function(xhr, status, error) {
        console.error(error);
      }
    });
  });
});





    </script>

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

@endsection
