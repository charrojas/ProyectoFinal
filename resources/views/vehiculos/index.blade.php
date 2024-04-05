@extends('app')

@section('contenidoSlider')
    <div class="contenedor"
        style="width: 100%; height: 500px; background-image: url('/img/deportivos.png'); background-size: cover; background-repeat: no-repeat; background-position: center; display: flex; align-items: center; justify-content: center;">
        @if (Auth::check())
            <a href="{{ route('vehiculos.create') }}" class="btn" style="'Roboto', sans-serif">
                <h2>ANUNCIA TU VEHÍCULO</h2>
                <h3>¡Haz click aquí!</h3>
            </a>
        @else
            <a href="{{ route('login') }}" class="btn" style="'Roboto', sans-serif">
                <h2>ANUNCIA TU VEHÍCULO</h2>
                <h3>¡Haz click aquí!</h3>
            </a>
        @endif
    </div>
@endsection


@section('contenido')

        <div class="container py-1">
            <div class="row">
                <div class="col-lg-12 mb-4">
                    <div class="input-group mb-2">
                        <div class="container">
                            <div class="row">
                                <h2 class="text-success" style="font-family: 'Roboto', sans-serif;">Filtrar vehículos</h2>

                                {{-- INICIO FORM PRUEBA --}}

                                <form action="{{ route('filtrar') }}" method="POST" class="my-3" 
                                id="form-filtrar-vehiculos">
                                    @csrf
                                    <div class="input-group mb-2">
                                        <div class="container shadow">
                                            <div class="row">
                                                <div class="col-sm-6 px-5 py-5">
                                                    <div class="form-group mx-2 my-2">
                                                        <label for="marca" style="'Roboto', sans-serif"><b>Marca</b></label>
                                                        <select class="form-control form-select" id="marca" name="id_marca">
                                                            <option value="">No Importa</option>
                                                            @foreach ($marcas as $marca)
                                                            <option value="{{$marca->id_marca}}" {{ session('filtro_id_marca') == $marca->id_marca ? 'selected' : '' }}>{{$marca->nombre}}</option>
                                                            @endforeach
                                                        </select>
                                                    </div>
                    
                                                    <div class="form-group mx-2 my-2">
                                                        <label for="modelo" style="font-family: 'Roboto', sans-serif"><b>Modelo</b></label>
                                                        <input type="text" class="form-control" id="modelo" name="modelo" value="{{ session('filtro_modelo') }}">
                                                    </div>
                                                    
                    
                                                    <div class="form-group mx-2 my-2">
                                                        <label for="estilo" style="'Roboto', sans-serif"><b>Estilo</b></label>
                                                            <select class="form-control form-select" id="estilo" name="id_estilo">
                                                                <option value="">No Importa</option>
                                                                @foreach ($estilos as $estilo)
                                                                <option value="{{$estilo->id_estilo}}" {{ session('filtro_id_estilo') == $estilo->id_estilo ? 'selected' : '' }}>{{$estilo->nombre}}</option>
                                                                @endforeach
                                                            </select>
                                                    </div>
                    
                                                    <div class="form-group mx-2 my-2">
                                                        <label for="color_exterior" style="'Roboto', sans-serif"> <b>Color Exterior</b></label>
                                                        <select class="form-control form-select" name="id_color_exterior">
                                                            <option value="">No importa</option>
                                                            @foreach ($color_exterior as $color_e)
                                                                <option class="text-center" value="{{ $color_e->id_color_exterior }}" {{ session('filtro_id_color_exterior') == $color_e->id_color_exterior ? 'selected' : '' }}>{{ $color_e->nombre }}
                                                                </option>
                                                            @endforeach
                                                        </select>
                                                    </div>
                    
                                                    <div class="form-group mx-2 my-2">
                                                        <label for="color_interior" style="'Roboto', sans-serif"><b>Color Interior</b></label>
                                                        <select class="form-control form-select" name="id_color_interior">
                                                            <option value="">No importa</option>
                                                            @foreach ($color_interior as $color_i)
                                                                <option class="text-center" value="{{ $color_i->id_color_interior }}" {{ session('filtro_id_color_interior') == $color_i->id_color_interior ? 'selected' : '' }}>{{ $color_i->nombre }}
                                                                </option>
                                                            @endforeach
                                                        </select>
                                                    </div>
                    
                                                    <div class="form-group mx-2 my-3">
                                                   <div>
                                                    <label for="transmision" style="'Roboto', sans-serif"><b>Transmisión</b></label>
                                                    </div>
                                                    <div>
                                                    <input type="radio" id="opcion1" name="transmision" value="opcion1" @if(session('filtro_transmision') == 'opcion1') checked @endif>
                                                        <label for="opcion1">Automática</label>
                                                        </div>
                                                        <div>
                                                        <input type="radio" id="opcion2" name="transmision" value="opcion2" @if(session('filtro_transmision') == 'opcion2') checked @endif>
                                                        <label for="opcion2">Manual</label>
                                                        </div>
                                                    </div>
                    
                                                    <div class="form-group mx-2 my-2">
                                                    
                                                    <div>
                                                        <label for="combustible" style="'Roboto', sans-serif"><b>Combustible</b></label>
                                                        </div>
                                                    <div>
                                                       
                                                        <input type="radio" id="opcion1" name="tipo_combustible" value="opcion1" @if(session('filtro_tipo_combustible') == 'opcion1') checked @endif>
                                                        <label for="opcion1">Diesel</label>

                                                        </div>
                                                    <div>
                                                        <input type="radio" id="opcion2" name="tipo_combustible" value="opcion2" @if(session('filtro_tipo_combustible') == 'opcion2') checked @endif>
                                                        <label for="opcion2">Gasolina</label>
                                                        </div>
                                                    <div>
                                                        <input type="radio" id="opcion3" name="tipo_combustible" value="opcion3" @if(session('filtro_tipo_combustible') == 'opcion3') checked @endif>
                                                        <label for="opcion3">Eléctrico</label>
                                                        </div>
                                                    <div>
                                                        <input type="radio" id="opcion4" name="tipo_combustible" value="opcion4" @if(session('filtro_tipo_combustible') == 'opcion4') checked @endif>
                                                        <label for="opcion4">Híbrido</label>
                                                        </div>
                                                    
                                                    </div>
                    
                             
                                                </div>
                    
                                                <div class="col-sm-6 px-5 py-5">
                                                    <div class="form-group mx-2 my-2">
                                                        <label for="se-recibe"><b>Se recibe</b></label>
                                                        <select
                                                            class="form-control form-select" name="recibe">
                                                            <option class="text-center" value="1" @if(session('filtro_recibe') == 1) selected @endif>Sí</option>
                                                            <option class="text-center" value="0" @if(session('filtro_recibe') == 0) selected @endif>No</option>
                                                        </select> 
                                                    </div>
                    
                                                    <div class="form-group mx-2 my-3">
                                                    
                                                    <div>
                                                    <label for="cantidad_puertas"><b>Cantidad de puertas</b></label>
                                                    </div>
                                                    <div>
                                                    <input type="radio" id="opcion1" name="num_puertas" value="opcion1" {{ session('filtro_num_puertas') == 'opcion1' ? 'checked' : '' }}>
                                                        <label for="opcion1">2</label>
                                                        </div>
                                                    <div>
                                                        <input type="radio" id="opcion2" name="num_puertas" value="opcion2" {{ session('filtro_num_puertas') == 'opcion2' ? 'checked' : '' }}>
                                                        <label for="opcion2">3</label>
                                                        </div>
                                                    <div>
                                                        <input type="radio" id="opcion2" name="num_puertas" value="opcion3" {{ session('filtro_num_puertas') == 'opcion3' ? 'checked' : '' }}>
                                                        <label for="opcion3">4</label>
                                                        </div>
                                                    
                                                    </div>
                    
                                                    <div class="form-group mx-2 my-2">
                                                        <label for="año"><b>Año</b></label>
                                                        <input type="number" class="form-control" id="año" name="año_inicio" value="{{ session('filtro_año_inicio') }}" placeholder="Ingrese el año inicial">
                                                        <label for="">a</label>
                                                        <input type="number" class="form-control" id="año" name="año_fin" value="{{ session('filtro_año_fin') }}" placeholder="Ingrese el año final">
                                                    </div>
                    
                                                    <div class="form-group mx-2 my-2">
                                                        <label for="precio"><b>Precio</b></label>
                                                        <input type="number" class="form-control" id="precio_inicio" name="precio_inicio" value="{{ session('filtro_precio_inicio') }}" placeholder="Ingrese el precio sin . ni ,">
                                                        <label for="">entre</label>
                                                        <input type="number" class="form-control" id="precio_fin" name="precio_fin" value="{{ session('filtro_precio_fin') }}" placeholder="Ingrese el precio final sin . ni ,">
                                                    </div>
                    
                                                    <div class="form-group mx-2 my-2">
                                                        <label for="cilindraje"><b>Cilindraje</b></label>
                                                        <input type="text" class="form-control" id="cilindraje" name="cilindraje" value="{{ session('filtro_cilindraje') }}" placeholder="Ingrese el cilindraje que desea buscar">
                                                    </div>

                                                    <div class="form-group mx-2 my-2">
                                                        <div>
                                                        <label for="ordenar-por"><b>Ordenar por</b></label>
                                                        </div>
                                                        <div>
                                                    <input type="radio" id="opcion1" name="orden" value="opcion1" {{ session('filtro_orden') == 'opcion1' ? 'checked' : '' }}>
                                                        <label for="opcion1">Precio</label>
                                                        </div>
                                                    <div>
                                                        <input type="radio" id="opcion2" name="orden" value="opcion2" {{ session('filtro_orden') == 'opcion2' ? 'checked' : '' }}>
                                                        <label for="opcion2">Año</label>
                                                        </div>
                                                    <div>
                                                    </div>

                                                </div>
                                            </div>
                                            
                                            <div class="text-center my-4">
                                                <button type="submit" id="filtrar" class="btn btn-success btn-lg mb-3">Buscar</button>
                                            </div>
                                            
                                            
                                        </div>
                    
                                    </div>
                    
                                </form> 

                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-12 order-lg-2 order-1">
                    <h2 class="text-success mb-5 mt-5">Vehículos en venta</h2>
                    <div class="row" id="vechiculos-filtrados">
                        <!--Inicio forEach Vehiculo--->
                        @foreach ($vehiculos as $vehiculo)
                            <div class="col-md-4">
                                <div class="card mb-4 product-wap rounded-0">
                                    <div class="card rounded-0">
                                        <a class="text-decoration-none text-success" href="#">
                                            <h4>{{ $vehiculo->marca->nombre }}</h4>
                                        </a>
                                        @if ($vehiculo->imagenes->count() > 0)
                                            <div class="image-container">
                                                <img class="card-img rounded-0 img-fluid"
                                                    src="{{ $vehiculo->imagenes->first()->imagen_url }}">
                                            </div>
                                        @else
                                            <div class="image-container">
                                                <img class="card-img rounded-0 img-fluid" src="/img/carro_default.jpeg">
                                            </div>
                                        @endif

                                        <div
                                            class="card-img-overlay rounded-0 product-overlay d-flex align-items-center justify-content-center">
                                            <ul class="list-unstyled">
                                                
                                                @if (Auth::check())
                                                <form id="favorito-form"
                                                    action="{{ route('vehiculos.favoritos.agregar', ['vehiculo' => $vehiculo->id_vehiculo]) }}"
                                                    method="POST">
                                                    @csrf
                                                    <button title="Agregar vehiculo a favorito" type="submit" class="btn btn-success text-white"
                                                        style="background-color: transparent; border: none;"><i
                                                            class="far fa-heart"></i></button>

                                                    <input class="btn btn-success text-white"
                                                        style="background-color: transparent; border: none;" type="hidden"
                                                        name="id_vehiculo" value="{{ $vehiculo->id_vehiculo }}">
                                                </form>
                                               
                                                @if ($vehiculo->id_usuario == Auth::user()->id)
                                                <li><a title="Editar vehiculo" class="btn btn-success text-white mt-2"
                                                    href="{{ route('vehiculos.edit', $vehiculo) }}"><i
                                                        class="far fa-edit"></i></a></li>
                                                <form action="">
                                                <li>
                                                    <a title="Marcar vehiculo como vendido" class="btn btn-success text-white mt-2" href="{{ route('vehiculos.marcar-vendido', ['id' => $vehiculo->id_vehiculo]) }}">
                                                        <i class="fa-solid fa-check"></i>
                                                    </a>
                                                    </li>
                                                </form>                                                  
                                                @endif
                                                
                                                @endif
                                                <li><a title="Ver vehiculo" class="btn btn-success text-white mt-2"
                                                        href="{{ route('vehiculos.show', $vehiculo) }}"><i
                                                            class="far fa-eye"></i></a></li>
                                            </ul>
                                        </div>
                                    </div>
                                    <div class="card-body">
                                        <a href="#" class="h3 text-decoration-none">
                                            <h5>{{ $vehiculo->modelo }} - {{$vehiculo->año}}</h5>
                                        </a>
                                        <p class="text-center mb-0">Transmision: <span class="text-secondary">{{ $vehiculo->transmision }}</span></p>
                                        <p class="text-center mb-0">Cilindraje: <span class="text-secondary">{{ $vehiculo->cilindraje }}</span></p>
                                        <p class="text-center mb-0 text-success">
                                            ₡ {{ $vehiculo->precio }}</p>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                        
                    </div>
                    
                

                    <div class="mx-auto pb-10 w-4/5">
                            {{$vehiculos->links()}}
                    </div>
                </div>
            </div>
        </div>

        <style>
            .image-container {
            width: 100%;
            height: 400px; 
            overflow: hidden;
        }

        .image-container img {
            width: 100%;
            height: 100%;
            object-fit: cover;
        }

        </style>




@endsection