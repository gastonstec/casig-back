<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Panel de Empleado</title>
</head>
<body>
    <h1>Bienvenido {{ $user->name }}</h1>
    <p>Tus permisos son:</p>
    <ul>
        @foreach ($user->getAllPermissions() as $permiso)
            <li>{{ $permiso->name }}</li>
        @endforeach
    </ul>
</body>
</html>
