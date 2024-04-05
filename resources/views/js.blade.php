<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

<script>
    document.addEventListener('DOMContentLoaded', function() {
        var gmailButton = document.getElementById('gmailButton');

        gmailButton.addEventListener('click', function() {
            // Crea la ventana emergente personalizada
            var popupWindow = window.open('', 'Enviar correo', 'width=500,height=400');

            // Construye el contenido de la ventana emergente con los datos del usuario y el vehículo
            var popupContent = `
                <h2>Enviar correo</h2>
                <form id="emailForm" action="{{ route('enviarCorreoPropietario') }}" method="POST">
                    @csrf

                    <div class="form-group">
                        <label for="name">Nombre:</label>
                        <input type="text" class="form-control" id="name" name="name" required>
                    </div>

                    <div class="form-group">
                        <label for="email">Correo electrónico:</label>
                        <input type="email" class="form-control" id="email" name="email" required>
                    </div>

                    <div class="form-group">
                        <label for="phone">Teléfono:</label>
                        <input type="tel" class="form-control" id="phone" name="phone" required>
                    </div>

                    <div class="form-group">
                        <label for="description">Descripción:</label>
                        <textarea class="form-control" id="description" name="description" required>
                            El usuario {{ $user->name }} está interesado en el vehículo {{ $vehiculo->nombre }} {{ $vehiculo->marca->nombre }}, {{ $vehiculo->modelo }}
                        </textarea>
                    </div>

                    <input type="hidden" name="id_vehiculo" value="{{ $vehiculo->id_vehiculo }}">

                    <button type="submit" class="btn btn-primary">Enviar</button>
                </form>
            `;

            // Agrega el contenido al documento de la ventana emergente
            popupWindow.document.write(popupContent);

            // Maneja el envío del formulario
            var emailForm = popupWindow.document.getElementById('emailForm');
            emailForm.onsubmit = function(event) {
                event.preventDefault();

                // Obtén los valores del formulario
                var name = popupWindow.document.getElementById('name').value;
                var email = popupWindow.document.getElementById('email').value;
                var phone = popupWindow.document.getElementById('phone').value;
                var description = popupWindow.document.getElementById('description').value;

                // Crea un objeto con los datos del formulario
                var formData = {
                    name: name,
                    email: email,
                    phone: phone,
                    description: description
                };

                // Realiza una solicitud AJAX para enviar los datos al backend
                var xhr = new XMLHttpRequest();
                xhr.open('POST', '{{ route('enviarCorreoPropietario') }}');
                xhr.setRequestHeader('Content-Type', 'application/json');
                xhr.onreadystatechange = function() {
                    if (xhr.readyState === XMLHttpRequest.DONE && xhr.status === 200) {
                        // El correo se envió correctamente
                        // Cierra la ventana emergente
                        popupWindow.close();
                    } else {
                        // Ocurrió un error al enviar el correo
                        // Puedes manejar el error de acuerdo a tus necesidades
                    }
                };
                xhr.send(JSON.stringify(formData));
            };
        });
    });
</script>
