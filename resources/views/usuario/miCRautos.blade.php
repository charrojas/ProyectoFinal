@extends('app')


@section('contenido')

<div class="container py-5 h-100">
        <div class="row d-flex justify-content-center align-items-center h-100">
            <div class="col col-lg-12 mb-4 mb-lg-0">
                <div class="card mb-3" style="border-radius: .5rem;">
                    <div class="row g-0">
                        <div class="col-md-4 gradient-custom text-center text-white"
                            style="border-top-left-radius: .5rem; border-bottom-left-radius: .5rem;">
                            <img src="/img/carrocrautos.png" alt="Avatar" class="img-fluid my-5 rounded-circle"
                                style="width: 388px;" />
                        </div>

                        <div class="col-md-8">
                            <div class="card-body p-4">
                            <p>
                                    <h4>Bienvenido a nuestro miCrAutos</h4>
                                    </p>
                                <hr class="mt-0 mb-4">
                                <div class="row pt-1">
                                <div class="col-12 mb-3">
                                   
                                    <p>
                                        En nuestro miCrAutos, nos esforzamos por brindarte la mejor experiencia de compra en línea. Nos complace ofrecerte una amplia selección de 
                                        productos de alta calidad y servicios excepcionales.
                                    </p>
                                    <p>
                                        Nuestro objetivo principal es proporcionarte una plataforma fácil de usar y segura para que puedas encontrar y adquirir los productos que 
                                        necesitas de manera rápida y conveniente. Nos preocupamos por tu satisfacción y nos esforzamos por brindarte un excelente servicio al cliente
                                        en cada paso del proceso de compra.
                                    </p>
                                    <p>
                                        Además de ofrecerte una amplia gama de productos. Mantente al tanto de nuestras novedades y suscríbete a nuestro boletín para recibir 
                                        actualizaciones y promociones especiales directamente en tu bandeja de entrada.
                                    </p>
                                    <p>
                                        Queremos que te sientas seguro al comprar en nuestro miCrAutos, por lo que implementamos medidas de seguridad para proteger tus datos personales 
                                        y garantizar transacciones seguras. Si tienes alguna pregunta o inquietud, nuestro equipo de soporte está listo para ayudarte en todo momento.
                                    </p>
                                    <p>
                                        ¡Gracias por elegir nuestro miCrAutos! Estamos emocionados de ser parte de tu experiencia de compra en línea y esperamos brindarte un servicio 
                                        excepcional.
                                    </p>
                                </div>

                                   
                                </div>
                         
                                <div class="row">
                                    <div class="col-12">
                                        <a href="{{route('perfil.index')}}" class="btn btn-mis-favoritos text-white" style="background-color: rgb(82, 151, 248);">Regresar</a>
                                    </div>
                                  
                                </div>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>



@endsection




