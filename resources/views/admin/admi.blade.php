<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Control de Asignación de Equipos</title>

    <!-- Importación de Bootstrap desde archivos locales -->
    <link href="{{ asset('bootstrap.min.css') }}" rel="stylesheet">

    <style>
        /* Estilos generales de la página */
        body {
            display: flex;
            flex-direction: column;
            min-height: 100vh;
            background-color: #d6d6d6;
        }

        /* Encabezado con logo */
        .header {
            background-color: #f8f9fa;
            padding: 10px;
            position: fixed;
            top: 0;
            width: 100%;
            z-index: 1000;
            display: flex;
            align-items: center;
            justify-content: center;
            box-shadow: 0px 4px 10px rgba(0, 0, 0, 0.1);
            border-bottom: 2px solid #ddd;
        }

        .header img {
            height: 40px;
        }

        /* Contenido principal */
        .content {
            flex: 1;
            display: flex;
            justify-content: center;
            align-items: center;
            padding-top: 80px;
            padding-bottom: 40px;
        }

        /* Caja contenedora */
        .container-box {
            background: white;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0px 4px 10px rgba(0, 0, 0, 0.1);
            width: 90%;
            max-width: 1600px;
        }

        /* Diseño de los formularios */
        .form-container {
            display: flex;
            flex-wrap: wrap;
            justify-content: space-between;
            gap: 10px;
        }

        .form-group {
            flex: 1;
            min-width: 200px;
        }

        .form-control, .form-select {
            font-size: 0.9rem;
            padding: 5px;
        }

        /* Pie de página */
        .footer {
            background-color: #343a40;
            color: white;
            text-align: center;
            padding: 10px;
            font-size: 0.9rem;
        }

        h4 {
            font-size: 1.1rem;
            margin-top: 15px;
        }

        table {
            font-size: 0.9rem;
        }

        /* Mensaje de error */
        #error-message {
            display: none;
            font-size: 0.9rem;
            padding: 8px;
            position: fixed;
            bottom: 20px;
            right: 20px;
            width: 250px;
            z-index: 1000;
            border-radius: 5px;
            box-shadow: 2px 2px 10px rgba(0,0,0,0.2);
            background-color: #f8d7da;
            color: #721c24;
            text-align: center;
        }
    </style>
</head>
<body>

    <!-- Encabezado con logo -->
    <header class="header">
        <img src="{{ asset('img/logo.jpg') }}" alt="Logo">
    </header>

    <main class="content">
        <div class="container-box">
            <h2 class="text-center">Control de Asignación de Equipos</h2>

            <!-- Formulario de asignación -->
            <form>
                <div class="form-container">
                    <div id="error-message">El ID ingresado no existe.</div>

                    <!-- Datos del usuario -->
                    <div class="form-group">
                        <label class="form-label">User ID</label>
                        <input type="text" class="form-control" id="userId" placeholder="Ingrese el ID del usuario">
                    </div>

                    <div class="form-group">
                        <label class="form-label">Nombre de Usuario</label>
                        <input type="text" class="form-control" id="nombre" disabled>
                    </div>
                    <div class="form-group">
                        <label class="form-label">Correo</label>
                        <input type="email" class="form-control" id="correo" disabled>
                    </div>
                    <div class="form-group">
                        <label class="form-label">Ubicación</label>
                        <input type="text" class="form-control" id="ubicacion" disabled>
                    </div>
                    <div class="form-group">
                        <label class="form-label">Call Center</label>
                        <input type="text" class="form-control" id="callCenter" disabled>
                    </div>
                    <div class="form-group">
                        <label class="form-label">Puesto</label>
                        <input type="text" class="form-control" id="position" disabled>
                    </div>
                    <div class="form-group">
                        <label class="form-label">Supervisor</label>
                        <input type="text" class="form-control" id="supervisor" disabled>
                    </div>
                </div>

                <!-- Campos para técnicos y dispositivos (solo visual) -->
                <h4>Técnico</h4>
                <div class="form-group">
                    <label class="form-label">Técnico que entregará</label>
                    <select class="form-select" id="tecnico">
                        <option selected>Seleccione un técnico</option>
                    </select>
                </div>

                <h4>Dispositivo</h4>
                <div class="form-group">
                    <label class="form-label">Selecciona dispositivo</label>
                    <select class="form-select" id="dispositivo">
                        <option selected>Seleccione un dispositivo</option>
                    </select>
                </div>

                <!-- Tabla de dispositivos asignados -->
                <h4>Lista de Dispositivos Asignados</h4>
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th>Descripción Dispositivo</th>
                            <th>Asset Tag</th>
                            <th>Número de Serie</th>
                        </tr>
                    </thead>
                    <tbody id="tablaDispositivos">
                        <!-- Se llenará dinámicamente -->
                    </tbody>
                </table>

                <!-- Botón de asignación -->
                <div class="text-center">
                    <button type="submit" class="btn btn-primary">Asignar Dispositivos</button>
                </div>
            </form>
        </div>
    </main>

    <!-- Pie de página -->
    <footer class="footer">
        &copy; 2025 Mi Aplicación. Todos los derechos reservados.
    </footer>

    <script>
        /**
         * Evento para detectar cuando el campo de User ID pierde el foco.
         */
        document.getElementById('userId').addEventListener('blur', function() {
            let userId = this.value.trim();
            let errorMessage = document.getElementById('error-message');

            if (userId === '') {
                limpiarCampos();
                return;
            }

            let apiUrl = `/api/getUser?UserId=${userId}`;

            fetch(apiUrl)
                .then(response => {
                    if (!response.ok) {
                        throw new Error("Usuario no encontrado");
                    }
                    return response.json();
                })
                .then(data => {
                    document.getElementById('nombre').value = data.Name || 'No disponible';
                    document.getElementById('correo').value = data.Email || 'No disponible';
                    document.getElementById('ubicacion').value = data.Location || 'No disponible';
                    document.getElementById('callCenter').value = data.CallCenter || 'No disponible';
                    document.getElementById('position').value = data.Position || 'No disponible';
                    document.getElementById('supervisor').value = data.Supervisor || 'No disponible';
                    errorMessage.style.display = 'none';
                })
                .catch(() => {
                    errorMessage.style.display = 'block';
                    setTimeout(() => errorMessage.style.display = "none", 3000);
                    limpiarCampos();
                });
        });

        /**
         * Función para limpiar los campos del formulario.
         */
        function limpiarCampos() {
            document.getElementById('nombre').value = '';
            document.getElementById('correo').value = '';
            document.getElementById('ubicacion').value = '';
            document.getElementById('callCenter').value = '';
            document.getElementById('position').value = '';
            document.getElementById('supervisor').value = '';
        }
    </script>

    <script src="{{ asset('bootstrap.bundle.min.js') }}"></script>
</body>
</html>
