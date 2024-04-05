

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


            <form action="" method="GET">
                <div class="row pb-3">
                    <div class="col-12">
                        <a href="#" class="btn btn-primary btn-sm rounded-pill float-start">
                            <i class="fab fa-facebook-f mx-2 fa-fw"></i>
                        </a>
                        <a href="#" class="btn btn-info btn-sm rounded-pill float-start">
                            <i class="fab fa-twitter mx-2 fa-fw text-white"></i>
                        </a>
                        <a href="#" class="btn btn-danger btn-sm rounded-pill float-start">
                            <i class="fab fa-google-plus-g mx-2 fa-fw"></i>
                        </a>

                        <a href="https://api.whatsapp.com/send?phone=62287717&text=Hola,%20quiero%20hacer%20una%20consulta"
                            target="_blank">
                            <button
                                class="btn btn-success fab fa-whatsapp text-white float-end mx-1 contacto rounded-pill"
                                name="submit" value="whatsapp">
                                <!-- Agrega el icono de WhatsApp aquí si es necesario -->
                                Enviar mensaje por WhatsApp
                            </button>
                        </a>
                        <button type="submit"
                            class="btn btn-success far fa-envelope text-white float-end mx-1 contacto rounded-pill"
                            name="submit" value="gmail"></button>

                        <a href="#" class="btn btn-danger btn-sm rounded-pill"
                            style="position: absolute; top: 10px; right: 15px; margin-top: 2%">
                            <i class="fa-solid fa-file-pdf" style="color: #ffffff;"></i>
                            <span style="margin-left: 5px;">Descargar ficha del vehículo.</span>
                        </a>
                    </div>
                </div>
            </form>

        </div>
    </div>
</div>
