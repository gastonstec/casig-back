<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Interfaz DSS</title>
    <!-- Import Bootstrap from local files -->
    <link href="{{ asset('bootstrap.min.css') }}" rel="stylesheet">

    <style>
        /* General page layout */
        body {
            display: flex;
            flex-direction: column;
            min-height: 100vh;
            background-color: #d6d6d6;
        }

        /* Header section */
        .header {
            background-color: #f8f9fa;
            padding: 15px;
            position: fixed;
            top: 0;
            width: 100%;
            z-index: 1000;
            display: flex;
            justify-content: center; /* Center horizontally */
            align-items: center; /* Center vertically */
            box-shadow: 0px 4px 10px rgba(0, 0, 0, 0.1);
        }

        /* Logo container */
        .logo-container img {
            height: 50px; /* Adjust image size */
        }

        .header img {
            height: 50px;
        }

        /* Main content section */
        .content {
            flex: 1;
            display: flex;
            justify-content: center;
            align-items: center;
            padding-top: 80px;
            padding-bottom: 40px;
        }

        /* Role selection box */
        .role-box {
            background: white;
            padding: 30px;
            border-radius: 8px;
            box-shadow: 0px 4px 10px rgba(0, 0, 0, 0.1);
            text-align: center;
        }

        /* Footer section */
        .footer {
            background-color: #343a40;
            color: white;
            text-align: center;
            padding: 15px;
        }

        /* Button container */
        .btn-container {
            display: flex;
            justify-content: center;
            gap: 20px;
            margin-top: 20px;
        }
    </style>
</head>
<body>
<header class="header">
    <div class="logo-container">
        <img src="{{ asset('img/logo.jpg') }}" alt="Logo">
    </div>
</header>

    <!-- Main content -->
    <main class="content">
        <div class="role-box">
            <h2>Bienvenido DSS</h2>
            <p>Seleccione el rol con el que desea continuar:</p>
            <div class="btn-container">
                <a href="{{ url('/employee') }}" class="btn btn-primary">Usuario</a>
                <a href="{{ url('/admin') }}" class="btn btn-danger">Administrador</a>
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
