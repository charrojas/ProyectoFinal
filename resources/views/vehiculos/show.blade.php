@extends('app')

@section('contenido')
    <!-- Modal -->
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

    <!-- IMG PRINCIPAL -->
    <section class="bg-light">
        <div class="container pb-5">
            <div class="row">
                <div class="col-lg-5 mt-5">
                    <div class="card mb-3">
                        <a href="{{ $vehiculo->imagenes->first()->imagen_url }}" data-lightbox="mygallery">
                            <img class="card-img img-fluid" src="{{ $vehiculo->imagenes->first()->imagen_url }}"
                                alt="Card image cap" id="product-detail">
                        </a>
                    </div>
                    <!-- FIN IMG PRINCIPAL -->
                    <div class="row">
                        <div class="col-12">
                            <!-- Gallery -->
                            <div class="container">
                                <hr class="mt-2 mb-5">
                                <div class="row text-center text-lg-start">
                                    @foreach ($imagenes as $imagen)
                                        <div class="col-lg-6 col-md-4 col-6">
                                            <a href="{{ $imagen->imagen_url }}" data-lightbox="mygallery"
                                                class="d-block mb-4 h-100">
                                                <img src="{{ $imagen->imagen_url }}" class="img-fluid img-thumbnail"
                                                    style="width: 400px; height: 200px;">
                                            </a>
                                        </div>
                                    @endforeach
                                </div>
                            </div>
                            <!-- Gallery -->
                        </div>
                    </div>
                </div>

                <!-- FICHA DEL VEHICULO -->
                <div class="col-lg-7 mt-5">
                    <div class="card">
                        <div class="card-body ml-5">
                            <h1 class="h2" style="text-align: left; margin-left: 5%; margin-top: 2%">Marca:
                                {{ $vehiculo->marca->nombre }}</h1>
                            <p class="h3 py-2" style="text-align: left; margin-left: 5%">Precio: {{ $vehiculo->precio }}
                            </p>

                            <ul class="list-inline" style="text-align: left; margin-left: 5%">
                                <li class="">
                                    <p><strong>Dueño:</strong> dueno</p>
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
                                    <p><strong>Cilindraje:</strong> {{ $vehiculo->cilindraje }}</p>
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
                                    <p><strong>Recibe:</strong> {{ $vehiculo->recibe }}</p>
                                </li>
                            </ul>

                            <div class="row pb-3">
                                <div class="col-6">
                                    <div class="d-flex justify-content-start">
                                        <a href="#" class="btn btn-primary btn-sm rounded-pill mx-1">
                                            <i class="fab fa-facebook-f fa-fw"></i>
                                        </a>
                                        <a href="#" class="btn btn-info btn-sm rounded-pill mx-1">
                                            <i class="fab fa-twitter fa-fw text-white"></i>
                                        </a>
                                        <a href="#" class="btn btn-danger btn-sm rounded-pill mx-1">
                                            <i class="fab fa-google-plus-g fa-fw"></i>
                                        </a>
                                    </div>
                                </div>
                                <div class="col-6">
                                    <div class="d-flex justify-content-end">
                                        <a href="https://api.whatsapp.com/send?phone=62287717&text=Hola,%20quiero%20hacer%20una%20consulta"
                                            target="_blank">
                                            <button
                                                class="btn btn-success btn-lg fab fa-whatsapp text-white mx-1 contacto rounded-pill"
                                                name="submit" value="whatsapp">
                                                <!-- Agrega el icono de WhatsApp aquí si es necesario -->
                                                Enviar mensaje por WhatsApp
                                            </button>
                                        </a>

                                        <a href="{{ route('vehiculos.enviarCorreo', ['id' => $vehiculo->id_vehiculo]) }}">
                                            <button class="btn btn-primary" type="button">
                                                Enviar correo
                                            </button>
                                        </a>

                                        {{-- <button id="gmailButton" class="btn btn-primary">Enviar correo por Gmail</button> --}}

                                        <form id="favorito-form"
                                            action="{{ route('vehiculos.favoritos.agregar', ['vehiculo' => $vehiculo->id_vehiculo]) }}"
                                            method="POST">
                                            @csrf
                                            <button type="submit"
                                                class="btn btn-success btn-lg text-white mx-1 rounded-pill"
                                                style="background-color: transparent; border: none; height: 40px;"><i
                                                    class="far fa-heart rounded-pill"></i></button>

                                            <input class="btn btn-success text-white rounded-pill"
                                                style="background-color: transparent; border: none;" type="hidden"
                                                name="id_vehiculo" value="{{ $vehiculo->id_vehiculo }}">
                                        </form>
                                    </div>
                                    <a href="#"
                                        class="btn btn-danger btn-sm rounded-pill position-absolute top-0 end-0 mt-2 me-3">
                                        <i class="fa-solid fa-file-pdf" style="color: #ffffff;"></i>
                                        <span style="margin-left: 5px;">Descargar ficha del vehículo.</span>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- FICHA DEL VEHICULO -->
            </div>
        </div>
    </section>
    <section class="py-5">
        <div class="container">
            <div class="row text-left p-2 pb-3">
                <h4>Productos Relacionados</h4>
            </div>
            <div class="row">
                <div class="col-md-4">
                    <div class="card mb-4 product-wap rounded-0">
                        <div class="card rounded-0">
                            <a class="text-decoration-none text-center" href="#" style="color: black">Toyota</a>
                            <img class="card-img rounded-0 img-fluid" src="img/Tacoma1.jpeg">
                            <div
                                class="card-img-overlay rounded-0 product-overlay d-flex align-items-center justify-content-center">
                                <ul class="list-unstyled">
                                    <li><a class="btn btn-success text-white" href="#"><i
                                                class="far fa-heart"></i></a></li>
                                    <li><a class="btn btn-success text-white mt-2" href="shop-single.html"><i
                                                class="far fa-eye"></i></a></li>
                                </ul>
                            </div>
                        </div>
                        <div class="card-body">
                            <a href="shop-single.html" class="h3 text-decoration-none">Tacoma - 2022</a>
                            <ul class="w-100 list-unstyled d-flex justify-content-between mb-0">
                                <li class="pt-2">
                                    <span class="product-color-dot color-dot-red float-left rounded-circle ml-1"></span>
                                    <span class="product-color-dot color-dot-blue float-left rounded-circle ml-1"></span>
                                    <span class="product-color-dot color-dot-black float-left rounded-circle ml-1"></span>
                                    <span class="product-color-dot color-dot-light float-left rounded-circle ml-1"></span>
                                    <span class="product-color-dot color-dot-green float-left rounded-circle ml-1"></span>
                                </li>
                            </ul>
                            <p class="text-center mb-0">Automático</p>
                            <p class="text-center mb-0">Cilindraje: 4000c</p>
                            <p class="text-center mb-0">$15.000.000</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </section>
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
    </script>

    {{-- @include('js') --}}
@endsection
