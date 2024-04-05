@extends('app')

@section('contenido')

<form action="{{ route('vehiculos.store') }}" method="POST">
    
    @csrf

    <div class="container px-3 py-3">
        <div class="row">

            <h2 class="text-center mb-3" style="font-family: 'Roboto', sans-serif; color: #59ab6e">Registra tu vehículo</h2>

            <div class="col-sm-6">

                <div clas="form-group mb-3 mt-3">
                    <label for="marca">Marca</label>
                    <select class="form-control shadow" name="marca" required>
                        @foreach ($marcas as $marca)
                            <option class="text-center" value="{{ $marca->id_marca }}">{{ $marca->nombre }}</option>
                        @endforeach
                    </select>
                </div>

                <div class="form-group mb-3 mt-3">
                    <label for="modelo">Modelo</label>
                    <input type="text" class="form-control shadow" id="modelo" placeholder="Ingrese el modelo" name="modelo" required>
                </div>

                <div class="form-group mb-3 mt-3">
                    <label for="estilo">Estilo</label>
                    <select class="form-control shadow form-select" name="estilo" required>
                        @foreach ($estilos as $estilo)
                            <option class="text-center" value="{{ $estilo->id_estilo }}">{{ $estilo->nombre }}</option>
                        @endforeach
                    </select>
                </div>

                <div class="form-group mb-3 mt-3">
                    <label for="color_exterior">Color Exterior</label>
                    <select class="form-control shadow form-select" name="color_exterior" required>
                        @foreach ($color_exterior as $color_e)
                            <option class="text-center" value="{{ $color_e->id_color_exterior }}">{{ $color_e->nombre }}
                            </option>
                        @endforeach
                    </select>
                </div>

                <div class="form-group mb-3 mt-3">
                    <label for="color_interior">Color Interior</label>
                    <select class="form-control shadow form-select" name="color_interior" required>
                        @foreach ($color_interior as $color_i)
                            <option class="text-center" value="{{ $color_i->id_color_interior }}">{{ $color_i->nombre }}
                            </option>
                        @endforeach
                    </select>
                </div>

                <div class="form-group mb-3 mt-3">
                    <label for="transmision">Transmisión</label>
                    <input type="text" class="form-control shadow " id="transmision" placeholder="Ingrese la transmisión" name="transmision" required>
                </div>

                <div class="form-group mb-3 mt-3">
                    <label for="cilindraje">Cilindraje</label>
                    <input type="number" class="form-control shadow" id="cilindraje" placeholder="Ingrese el cilindraje" name="cilindraje" required>
                </div>
            </div>

            <div class="col-sm-6">

                <div class="form-group mb-3 mt-3">
                    <label for="combustible">Combustible</label>
                    <input type="text" class="form-control shadow" name="combustible" required
                        placeholder="Ingrese el tipo de combustible">
                </div>
                <div class="form-group mb-3 mt-3"> <label for="recibe">Se recibe</label> <select
                        class="form-control shadow" name="recibe" required>
                        <option class="text-center" value="1">Sí</option>
                        <option class="text-center" value="0" selected>No</option>
                    </select> 
                </div>

                <div class="form-group mb-3 mt-3"> <label for="cantidad_puertas">Cantidad de Puertas</label> 
                <input
                        type="text" class="form-control shadow" id="cantidad_puertas"
                        placeholder="Ingrese el numero de puertas" name="cantidad_puertas" required> 
                </div>
                <div class="form-group mb-3 mt-3"> <label for="anio">Año</label> 
                <input type="text"
                        class="form-control shadow" id="anio" placeholder="Ingrese el año del vehiculo" name="año" required> </div>

                <div class="form-group mb-3 mt-3"> <label for="precio">Precio</label> 
                <input type="number"
                        class="form-control shadow" id="precio" placeholder="Ingrese el precio del vehiculo" name="precio" required> </div>

                <br>
                <br>
                <button type="submit" class="btn btn-success btn-lg float-end shadow mt-4">Registrar</button>
            </div>
        </div>
    </div>
    </div>
    </div>
</form>
@endsection