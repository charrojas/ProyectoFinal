<!DOCTYPE html>
<html lang="en">

<head>
    <title>CR Autos</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link rel="apple-touch-icon" href="/assets/img/apple-icon.png">
    <link rel="shortcut icon" type="image/x-icon" href="/assets/img/">

    <link rel="stylesheet" href="libs/DataTables/datatables.min.css">

    <link rel="stylesheet" href="/assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="/assets/css/templatemo.css">
    <link rel="stylesheet" href="/assets/css/custom.css">
    <link rel="stylesheet" href="/css/style.css">

    <link rel="stylesheet" href="../assets/js/jquery-1.11.0.min.js">
    <!-- Load fonts style after rendering the layout styles -->
    <link rel="stylesheet"
        href="https://fonts.googleapis.com/css2?family=Roboto:wght@100;200;300;400;500;700;900&display=swap">
    <link rel="stylesheet" href="/assets/css/fontawesome.min.css">
    <link rel="stylesheet" href="/assets/css/styles.css">
    <!-- Font Awesome icons (free version)-->
    <script src="https://use.fontawesome.com/releases/v6.3.0/js/all.js" crossorigin="anonymous"></script>

    <!-- Owl Carousel -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.carousel.min.css">
    <link rel="stylesheet"
        href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.theme.default.min.css">
    <link rel="stylesheet" href="/lightbox2-2.11.4/src/css/lightbox.css">

    <!--Links para poder usar DROPZONE
    <script src="https://unpkg.com/dropzone@5/dist/min/dropzone.min.js"></script>
    <link rel="stylesheet" href="https://unpkg.com/dropzone@5/dist/min/dropzone.min.css" type="text/css" />-->





<!-- CSS de Owl Carousel -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.carousel.min.css">
<!-- JS de Owl Carousel -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/owl.carousel.min.js"></script>



    <link rel="apple-touch-icon" href="/assets/img/apple-icon.png">
    <link rel="shortcut icon" type="image/x-icon" href="/img/carro.png">

    <link rel="stylesheet" href="/assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="/assets/css/templatemo.css">
    <link rel="stylesheet" href="/assets/css/custom.css">

    <!-- Load fonts style after rendering the layout styles -->
    <link rel="stylesheet"
        href="https://fonts.googleapis.com/css2?family=Roboto:wght@100;200;300;400;500;700;900&display=swap">
    <link rel="stylesheet" href="/assets/css/fontawesome.min.css">

    <!-- Slick -->
    <link rel="stylesheet" type="text/css" href="/assets/css/slick.min.css">
    <link rel="stylesheet" type="text/css" href="/assets/css/slick-theme.css">

</head>

<body>
    <!-- Start Top Nav -->
    <nav class="navbar navbar-expand-lg bg-dark navbar-light" id="templatemo_nav_top">
        <div class="container text-light">
            <div class="w-100 d-flex justify-content-between" style="font-size: 1.1em!important;">
                <div>
                </div>
                <div>
                </div>


                @if (Auth::check())
                    <div class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="avatarDropdown" role="button"
                            data-bs-toggle="dropdown" aria-expanded="false">
                            <img src="{{ Auth::user()->avatar }}" alt="Avatar" class="nav-avatar rounded-circle"
                                style="width: 40px; height: 40px;">
                        </a>
                        <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="avatarDropdown"
                            style="width: 250px;">
                            <li class="dropdown-header">
                                <div class="user-profile text-center">
                                    <img src="{{ Auth::user()->avatar }}" alt="Avatar"
                                        class="profile-avatar rounded-circle">
                                    <div class="profile-details mt-20">
                                        <h5 class="fs-4 fw-bold mt-4" style="font-size: 1.35em !important;">
                                            {{ Auth::user()->name }}</h5>
                                        <p class="fs-5" style="font-size: 1.30em !important;">
                                            {{ Auth::user()->email }}</p>
                                        <!-- <p class="fs-5" style="font-size: 1.25em !important;">
                                            <strong>Teléfono:</strong> {{ Auth::user()->telefono }}
                                        </p>
                                        <p class="fs-5" style="font-size: 1.25em !important;">
                                            <strong>Dirección:</strong> {{ Auth::user()->direccion }}
                                        </p> -->
                                    </div>
                                </div>
                            </li>
                            <li class="d-flex justify-content-between text-center">
                                <a class="dropdown-item btn btn-sm" href="{{route('perfil.index')}}" style="font-size: 1.30em;">
                                    <i class="fas fa-eye"></i> Ver perfil
                                </a>
                            </li>


                            <li>
                                <hr class="dropdown-divider">
                            </li>
                            <li class="text-center">
                                <a class="dropdown-item" href="http://127.0.0.1:8000/logout"
                                    onclick="event.preventDefault(); document.getElementById('logout-form').submit();"
                                    style="font-size: 1.4em;">
                                    <i class="fas fa-sign-out-alt"></i> Salir
                                </a>
                                <form id="logout-form" action="{{ route('logout') }}" method="POST"
                                    style="display: none;">
                                    @csrf
                                </form>
                            </li>

                        </ul>
                        <a class="text-light text-decoration-none mx-2" href="#" target="_blank" rel="sponsored">
                            <i class="fa-solid fa-user fa-sm fa-fw me-2"></i>Visitar miCRAuto
                        </a>
                    </div>
                @else
                    <a class="text-light text-decoration-none mx-2" href="{{ route('login') }}" target="_blank">
                        <i class="fab fa-google fa-sm fa-fw me-2"></i>Ingresar con Google
                    </a>
                    <a class="text-light text-decoration-none mx-2" href="{{ route('register') }}" target="_blank">
                        <i class="fas fa-edit fa-sm fa-fw me-2"></i>Registrarse
                    </a>
                @endif

            </div>
        </div>

    </nav>


    <!-- Close Top Nav -->


    <!-- Header -->
    <nav class="navbar navbar-expand-lg navbar-light shadow">
        <div class="container d-flex justify-content-between align-items-center">

            <a class="navbar-brand text-success logo h1 align-self-center" href="index.html">
                <a class="text-light text-decoration-none mx-2" href="#" target="_blank" rel="sponsored"><i
                        class="fa-solid fa-circle-arrow-left fa-lg" style="color: red"></i></a>
                <img src="/img/crautoslogob.png" class="img-fluid ml-5" style="display: inline-block;">
            </a>

            <button class="navbar-toggler border-0" type="button" data-bs-toggle="collapse"
                data-bs-target="#templatemo_main_nav" aria-controls="navbarSupportedContent" aria-expanded="false"
                aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="align-self-center collapse navbar-collapse flex-fill  d-lg-flex justify-content-lg-between"
                id="templatemo_main_nav">
                <div class="flex-fill">
                    <ul class="nav navbar-nav d-flex justify-content-between mx-lg-auto">
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('paginas.index') }}">INICIO</a>
                        </li>
                        <li class="nav-item">
                        <li class="nav-item">
                            @if (Auth::check())
                                <a class="nav-link" href="{{ route('vehiculos.create') }}">PUBLICAR
                                    VEHICULO</a>
                                <!-- Botón para usuarios autenticados -->
                            @else
                                <a class="nav-link" href="{{ route('login') }}">PUBLICAR VEHICULO</a>
                            @endif
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('vehiculos.index') }}">AUTOS EN VENTA</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('contacto') }}">CONTACTO</a>
                        </li>
                    </ul>

                </div>
                <div class="navbar align-self-center d-flex">
                    <div class="d-lg-none flex-sm-fill mt-3 mb-4 col-7 col-sm-auto pr-3">
                        <div class="input-group">
                            <input type="text" class="form-control" id="inputMobileSearch"
                                placeholder="Search ...">
                            <div class="input-group-text">
                                <i class="fa fa-fw fa-search"></i>
                            </div>
                        </div>
                    </div>
                    <a class="nav-icon d-none d-lg-inline" href="#" data-bs-toggle="modal"
                        data-bs-target="#templatemo_search">
                        <i class="fa fa-fw fa-search text-dark mr-2"></i>
                    </a>
                </div>
            </div>
        </div>
    </nav>
    <!-- Close Header -->

    <!-- Modal -->
    <div class="modal fade bg-white" id="templatemo_search" tabindex="-1" role="dialog"
        aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <div class="w-100 pt-1 mb-5 text-right">
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <!-- PONER EL FORMULARIO PARA BUSQUEDAS DE VEHICULOS -->
            <!-- <form action="" method="get" class="modal-content modal-body border-0 p-0"> -->
                <div class="input-group mb-2">
                    <div class="container shadow">
                        <div class="row">
                            <div class="col-sm-6 px-5 py-5">
                                <div class="form-group mx-2 my-2">
                                    <label for="marca"><b>Marca</b></label>
                                    <select class="form-control form-select" id="marca">
                                        <option value="">No Importa</option>
                                        <option value="">Cargar demás datos</option>
                                    </select>
                                </div>

                                <div class="form-group mx-2 my-2">
                                    <label for="modelo"><b>Modelo</b></label>
                                    <input type="text" class="form-control" id="modelo">
                                </div>

                                <div class="form-group mx-2 my-2">
                                    <label for="estilo"><b>Estilo</b></label>
                                    <select class="form-control form-select" id="estilo">
                                        <option value="">No Importa</option>
                                        <option value="">Demás</option>
                                    </select>
                                </div>

                                <div class="form-group mx-2 my-2">
                                    <label for="combustible"><b>Combustible</b></label>
                                    <select class="form-control form-select" id="combustible">
                                        <option value="">No Importa</option>
                                        <option value="">Demás</option>
                                    </select>
                                </div>

                                <div class="form-group mx-2 my-2">
                                    <label for="transmision"><b>Transmisión</b></label>
                                    <select class="form-control form-select" id="transmision">
                                        <option value="">No Importa</option>
                                        <option value="">Demás</option>
                                    </select>
                                </div>

                                <div class="form-group mx-2 my-2">
                                    <label for="financiado"><b>Financiado</b></label>
                                    <select class="form-control form-select" id="financiado">
                                        <option value="">No Importa</option>
                                        <option value="">Demás</option>
                                    </select>
                                </div>

                                <div class="form-group mx-2 my-2">
                                    <label for="se-recibe"><b>Se recibe</b></label>
                                    <select class="form-control form-select" id="se-recibe">
                                        <option value="">No Importa</option>
                                        <option value="">Demás</option>
                                    </select>
                                </div>

                                <div class="form-group mx-2 my-2">
                                    <label for="provincia"><b>Provincia</b></label>
                                    <select class="form-control form-select" id="provincia">
                                        <option value="">No Importa</option>
                                        <option value="">Demás</option>
                                    </select>
                                </div>
                            </div>

                            <div class="col-sm-6 px-5 py-5">
                                <div class="form-group mx-2 my-2">
                                    <label for="puertas"><b># puertas</b></label>
                                    <select class="form-control form-select" id="puertas">
                                        <option value="">No Importa</option>
                                        <option value="">Demás</option>
                                    </select>
                                </div>

                                <div class="form-group mx-2 my-2">
                                    <label for="anio-entre"><b>Año Entre</b></label>
                                    <select class="form-control form-select" id="anio-entre">
                                        <option value="">1960</option>
                                        <option value="">Demás</option>
                                    </select>
                                    <span><b>y</b></span>
                                    <select class="form-control form-select" id="anio-hasta">
                                        <option value="">2023</option>
                                        <option value="">Demás</option>
                                    </select>
                                </div>

                                <div class="form-group mx-2 my-2">
                                    <label for="precio-entre"><b>Precio Entre</b></label>
                                    <select class="form-control form-select" id="precio-entre">
                                        <option value="">$5.000</option>
                                        <option value="">$20.000</option>
                                    </select>
                                    <span><b>y</b></span>
                                    <select class="form-control form-select" id="precio-hasta">
                                        <option value="">$50.000</option>
                                        <option value="">$150.000</option>
                                    </select>
                                </div>

                                <div class="form-group mx-2 my-2">
                                    <label for="ordenar-por"><b>Ordenar por</b></label>
                                    <select class="form-control form-select" id="ordenar-por">
                                        <option value="">Precio</option>
                                        <option value="">Demás</option>
                                    </select>
                                </div>

                                <div class="form-group mx-2 my-2">
                                    <label for="mostrar"><b>Mostrar</b></label>
                                    <select class="form-control form-select" id="mostrar">
                                        <option value="">Nuevos y Usados</option>
                                        <option value="">Demás</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="text-center">
                            <button type="submit" class="btn btn-success btn-lg mb-3">Buscar</button>
                        </div>
                    </div>

                </div>

            <!-- </form> -->
        </div>
    </div>

    <!-- Start Categories of The Month -->
    <section class="container-fluid">
        <div class="row text-center">
            <div class="col-lg-12 m-auto">

                @yield('contenidoSlider')
            </div>
        </div>
    </section>

    <section class="container py-5">
        <div class="row text-center py-2">
            <div class="col-lg-12 m-auto">

                @yield('contenido')
            </div>
        </div>
    </section>
    <!-- End Categories of The Month -->

    <!-- Start Footer -->
    <footer class="bg-dark" id="tempaltemo_footer">
        <div class="container">
            <div class="row">

                <div class="col-md-4 pt-5">
                    <img src="/img/crautoslogob.png" class="img-fluid">
                    <ul class="list-unstyled text-light footer-link-list">
                        <li>
                            <i class=""></i>
                            LA PÁGINA DE AUTOS DE COSTA RICA
                        </li>

                    </ul>
                </div>

                <div class="col-md-4 pt-5">
                    <h2 class="h2 text-light border-bottom pb-3 border-light">Contáctanos</h2>
                    <ul class="list-unstyled text-light footer-link-list">
                        <li>
                            <i class="fa fa-phone fa-fw"></i>
                            <a class="text-decoration-none" href="mailto:info@company.com">Teléfono:(506)2291-4141</a>
                        </li>

                        <li>
                            <i class="fa fa-envelope fa-fw"></i>
                            <a class="text-decoration-none"
                                href="mailto:info@company.com">Email:soporte@crautos.com</a>
                        </li>
                    </ul>
                </div>

                <div class="col-md-4 pt-5">
                    <h2 class="h2 text-light border-bottom pb-3 border-light">Integrantes</h2>
                    <ul class="list-unstyled text-light footer-link-list">
                        <li><a class="text-decoration-none" href="#">Charlotte Rojas Padilla</a></li>
                        <li><a class="text-decoration-none" href="#">Yendry Villalobos Oviedo</a></li>
                        <li><a class="text-decoration-none" href="#">Kendall Fernández Romero</a></li>
                        <li><a class="text-decoration-none" href="#">Jessika Monge Vásquez</a></li>
                        <li><a class="text-decoration-none" href="#">Ariana Hernández Morales</a></li>
                    </ul>
                </div>

            </div>

            <div class="row text-light mb-4">
                <div class="col-12 mb-3">
                    <div class="w-100 my-3 border-top border-light"></div>
                </div>
                <div class="col-auto me-auto">
                    <ul class="list-inline text-left footer-icons">
                        <li class="list-inline-item border border-light rounded-circle text-center">
                            <a class="text-light text-decoration-none" target="_blank"
                                href="https://www.facebook.com/crautos"><i
                                    class="fab fa-facebook-f fa-lg fa-fw"></i></a>
                        </li>
                        <li class="list-inline-item border border-light rounded-circle text-center">
                            <a class="text-light text-decoration-none" target="_blank"
                                href="https://www.instagram.com/crautoscom/?hl=es"><i
                                    class="fab fa-instagram fa-lg fa-fw"></i></a>
                        </li>
                        <li class="list-inline-item border border-light rounded-circle text-center">
                            <a class="text-light text-decoration-none" target="_blank"
                                href="https://twitter.com/crautosusados"><i
                                    class="fab fa-twitter fa-lg fa-fw"></i></a>
                        </li>
                    </ul>
                </div>

            </div>
        </div>

        <div class="w-100 bg-black py-3">
            <div class="container">
                <div class="row pt-2">
                    <div class="col-12">
                        <p class="text-left text-light">
                            Copyright © 1998-2023. Todos los derechos reservados.
                            {{-- Company Name 
                            | Designed by <a rel="sponsored" href="https://templatemo.com" target="_blank">TemplateMo</a> --}}
                        </p>
                    </div>
                </div>
            </div>
        </div>

    </footer>
    <!-- End Footer -->

    <!-- Start Script -->
    <script src="../assets/js/jquery-1.11.0.min.js"></script>
    <script src="../assets/js/jquery-migrate-1.2.1.min.js"></script>
    <script src="../assets/js/bootstrap.bundle.min.js"></script>
    <script src="../assets/js/templatemo.js"></script>
    <script src="../assets/js/custom.js"></script>
    <script src="../lightbox2-2.11.4/src/js/lightbox.js"></script>


    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

    <!-- Owl Carousel -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/owl.carousel.min.js"></script>

    <!-- End Script -->

    <script>
        $(document).ready(function() {
            $(".owl-carousel").owlCarousel({
                items: 1,
                loop: true,
                nav: true,
                dots: true,
                autoplay: true,
                autoplaySpeed: 1000,
                smartSpeed: 1500,
                autoplayHoverPause: true
            });
        });
    </script>
    @yield('js')
</body>

</html>
