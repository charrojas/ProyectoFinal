@extends('app')

@section('contenido')
    @if (session('message'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            {{ session('message') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif


    <form action="{{ route('vehiculos.update', $vehiculo) }}" method="POST">
    @csrf
    @method('PUT')
    <div class="container px-3 py-3">
        <div class="row">
            <h2 class="text-center" style="font-family: 'Roboto', sans-serif; color: #59ab6e">Edita tu vehículo.</h2>
        </div>

        <div class="row">
            <div class="col-sm-6">
                <div class="form-group mb-3 mt-3">
                    <label for="marca">Marca</label>
                    <select class="form-control shadow" name="marca">
                        @foreach ($marcas as $marca)
                            <option class="text-center" value="{{ $marca->id_marca }}">{{ $marca->nombre }}</option>
                        @endforeach
                    </select>
                </div>

                <div class="form-group mb-3 mt-3">
                    <label for="modelo">Modelo</label>
                    <input type="text" class="form-control shadow" id="modelo" value="{{$vehiculo->modelo}}" name="modelo">
                </div>

                <div class="form-group mb-3 mt-3">
                    <label for="estilo">Estilo</label>
                    <select class="form-control shadow" name="estilo">
                        @foreach ($estilos as $estilo)
                            <option class="text-center" value="{{ $estilo->id_estilo }}">{{ $estilo->nombre }}</option>
                        @endforeach
                    </select>
                </div>

                <div class="form-group mb-3 mt-3">
                    <label for="color_exterior">Color Exterior</label>
                    <select class="form-control shadow" name="color_exterior">
                        @foreach ($color_exterior as $color_e)
                            <option class="text-center" value="{{ $color_e->id_color_exterior }}">{{ $color_e->nombre }}</option>
                        @endforeach
                    </select>
                </div>

                <div class="form-group mb-3 mt-3">
                    <label for="color_interior">Color Interior</label>
                    <select class="form-control shadow" name="color_interior">
                        @foreach ($color_interior as $color_i)
                            <option class="text-center" value="{{ $color_i->id_color_interior }}">{{ $color_i->nombre }}</option>
                        @endforeach
                    </select>
                </div>

                <div class="form-group mb-3 mt-3">
                    <label for="transmision">Transmisión</label>
                    <input type="text" class="form-control shadow" id="transmision" value="{{$vehiculo->transmision}}" name="transmision">
                </div>

                <div class="form-group mb-3 mt-3">
                    <label for="cilindraje">Cilindraje</label>
                    <input type="number" class="form-control shadow" id="cilindraje" value="{{$vehiculo->cilindraje}}" name="cilindraje">
                </div>
            </div>

            <div class="col-sm-6">
                <div class="form-group mb-3 mt-3">
                    <label for="combustible">Combustible</label>
                    <input type="text" class="form-control shadow" name="combustible" value="{{$vehiculo->combustible}}">
                </div>

                <div class="form-group mb-3 mt-3">
                    <label for="recibe">Se recibe</label>
                    <select class="form-control shadow" name="recibe">
                        <option class="text-center" value="1">Sí</option>
                        <option class="text-center" value="0" selected>No</option>
                    </select>
                </div>

                <div class="form-group mb-3 mt-3">
                    <label for="cantidad_puertas">Cantidad de Puertas</label>
                    <input type="text" class="form-control shadow" id="cantidad_puertas" value="{{$vehiculo->cantidad_puertas}}" name="cantidad_puertas">
                </div>

                <div class="form-group mb-3 mt-3">
                    <label for="anio">Año</label>
                    <input type="text" class="form-control shadow" id="anio" value="{{$vehiculo->año}}" name="año">
                </div>

                <div class="form-group mb-3 mt-3">
                    <label for="precio">Precio</label>
                    <input type="text" class="form-control shadow" id="precio" value="{{$vehiculo->precio}}" name="precio">
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-sm-12">
                <br>
                <br>
                <button type="submit" class="btn btn-success float-end shadow mt-4">Actualizar</button>
            </div>
        </div>
    </div>
</form>

    <h1>Agregar imágenes al vehículo</h1>

    <form action="{{ route('imagenes.store') }}" method="POST" enctype="multipart/form-data" id="formulario-imagenes">
        @csrf
        <input type="hidden" name="id_vehiculo" value="{{ $vehiculo->id_vehiculo }}">
        <input type="file" name="imagenes[]" accept=".png, .jpg, .jpeg" class="custom-file-input form-control my-3"
            multiple>
        <button class="btn btn-success float-end">Subir imágenes</button>
    </form>


    <div class="row">
        <div class="col-sm-12">
            <div id="div-imagenes" class="contenedor-imagenes">
                <p>Imágenes de su vehículo:</p>
                @foreach ($vehiculo->imagenes as $imagen)
                    <div class="div-imagenes" data-imagen-id="{{ $imagen->id_imagen }}">
                        <img src="{{ $imagen->imagen_url }}" alt="Imagen" class="imagenes-ajax">
                        <form action="{{ route('imagenes.destroy', $imagen->id_imagen) }}" method="POST"
                            class="form-eliminar-imagen">
                            @csrf
                            @method('DELETE')
                            <input type="hidden" name="id_imagen" value="{{ $imagen->id_imagen }}">
                            <button class="btn btn-sm btn-danger btn-eliminar-img">X</button>
                        </form>
                    </div>
                @endforeach
            </div>

            <a href="{{ route('vehiculos.show', $vehiculo) }}" class="btn btn-primary float-end mt-3">Ver vehiculo</a>        </div>
    </div>

   @endsection
