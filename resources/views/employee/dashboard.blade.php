<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Interfaz Usuario</title>
    <!-- Import Bootstrap -->
    <link href="{{ asset('bootstrap.min.css') }}" rel="stylesheet">

    <style>
        body {
            display: flex;
            flex-direction: column;
            min-height: 100vh;
            background-color: #d6d6d6;
        }

        /* Header with centered logo */
        .header {
            background-color: #f8f9fa;
            padding: 15px;
            position: fixed;
            top: 0;
            width: 100%;
            z-index: 1000;
            display: flex;
            justify-content: center; 
            align-items: center;
            box-shadow: 0px 4px 10px rgba(0, 0, 0, 0.1);
        }

        .logo-container img {
            height: 50px;
        }

        /* Responsive main container */
        .content {
            flex: 1;
            display: flex;
            justify-content: center;
            align-items: center;
            padding: 120px 15px 40px; /* Adjusted padding to prevent content from sticking to the header */
        }

        .container-box {
            background: white;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0px 4px 10px rgba(0, 0, 0, 0.1);
            width: 100%;
            max-width: 800px; /* Maximum width to prevent the table from being too large */
        }

        /* Responsiveness for the table */
        .table-responsive {
            overflow-x: auto;
        }

        /* Footer */
        .footer {
            background-color: #343a40;
            color: white;
            text-align: center;
            padding: 15px;
            font-size: 0.9rem;
        }
    </style>
</head>
<body>

<!-- Header with centered logo -->
<header class="header d-flex justify-content-between align-items-center px-4">
    <div class="logo-container">
        <img src="{{ asset('img/logo.jpg') }}" alt="Logo">
    </div>
    <button type="button" class="btn btn-secondary">Cerrar sesión</button>
</header>


<!-- Main content -->
<main class="content">
    <div class="container-box">
        <h3 class="text-center">Bienvenido, Usuario</h3>
        <p class="text-center">Rol: <span class="badge bg-primary">Usuario</span></p>

        <!-- Assigned devices table with mobile scrolling -->
        <h4 class="mt-4">Dispositivos Asignados</h4>
        <div class="table-responsive">
            <table class="table table-striped text-center">
                <thead class="table-dark">
                    <tr>
                        <th>#</th>
                        <th>Descripción</th>
                        <th>Número de Serie</th>
                        <th>Fecha de Asignación</th>
                        <th>Estado</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>1</td>
                        <td>Laptop Dell XPS</td>
                        <td>SN123456</td>
                        <td>2024-02-15</td>
                        <td><span class="badge bg-success">Asignado</span></td>
                    </tr>
                    <tr>
                        <td>2</td>
                        <td>Monitor Samsung 27"</td>
                        <td>SN654321</td>
                        <td>2024-02-15</td>
                        <td><span class="badge bg-warning">Pendiente</span></td>
                    </tr>
                </tbody>
            </table>
        </div>

        <!-- Button to download the assignment letter -->
        <div class="text-center mt-4">
            <a href="#" class="btn btn-danger">Descargar Carta de Asignación</a>
        </div>
    </div>
</main>

<!-- Footer -->
<footer class="footer">
    &copy; 2025 Mi Aplicación. Todos los derechos reservados.
</footer>

<!-- Load Bootstrap JavaScript -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
