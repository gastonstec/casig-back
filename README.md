Proyecto: Control de Asignación de Equipos

Descripción

Este proyecto es un sistema de gestión de asignación de equipos que permite a los administradores asignar dispositivos a empleados y técnicos. La autenticación se maneja a través de Google, y el sistema cuenta con roles y permisos gestionados mediante Spatie Permission.

Tecnologías Utilizadas

Laravel: Framework PHP para el desarrollo backend.

Spatie Permission: Gestión de roles y permisos.

Bootstrap: Estilización de la interfaz.

Socialite: Autenticación con Google.

SQLite/MySQL: Base de datos.

Blade: Sistema de plantillas de Laravel.

Instalación

Requisitos Previos

PHP >= 8.1

Composer

Node.js & npm (para compilación de assets)

SQLite o MySQL configurado

Pasos para la Instalación

Instalar dependencias:

composer install
npm install && npm run dev

Copiar el archivo de configuración y generar clave de la aplicación:

cp .env.example .env
php artisan key:generate

Configurar la base de datos en .env:

DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=nombre_base_datos
DB_USERNAME=usuario
DB_PASSWORD=contraseña

Ejecutar migraciones y seeders:

php artisan migrate --seed

Iniciar el servidor:

php artisan serve

Estructura del Proyecto

app/
 ├── Http/
 │    ├── Controllers/ (Controladores del sistema)
 │    ├── Middleware/ (Middleware de autenticación y roles)
 │    ├── Models/ (Modelos de la BD)
 ├── Providers/ (Configuraciones adicionales)
 ├── database/
 │    ├── migrations/ (Migraciones de la BD)
 │    ├── seeders/ (Seeders para poblar la BD)
 ├── routes/
 │    ├── web.php (Rutas de la aplicación)
 ├── resources/
 │    ├── views/ (Vistas Blade)

Funcionalidades Clave

✅ Autenticación con Google (Socialite)✅ Gestión de Roles y Permisos (Admin, Employee, DSS)✅ Asignación de dispositivos a empleados✅ Interfaz amigable con Bootstrap✅ Sistema de sesión y middleware de protección

Uso del Sistema

Iniciar Sesión

Dirígete a http://localhost:8000.

Haz clic en Iniciar sesión con Google.

Según el rol asignado, serás dirigido a tu respectivo panel:

Admin: Panel de administración

Employee: Panel de empleado

DSS: Panel especial con botones visuales

Crear un Nuevo Usuario

Puedes crear usuarios en la base de datos mediante los seeders o manualmente en la BD.

Rutas Principales

Método

Ruta

Descripción

GET

/

Página de inicio

GET

/auth/redirect/google

Redirección a Google Auth

GET

/dashboard

Dashboard según el rol

GET

/logout

Cierra la sesión

GET

/admin

Panel de administrador

GET

/employee

Panel de empleados

GET

/usuario/{id}

Obtiene datos de un usuario

GET

/dispositivo/{id}

Obtiene datos de un dispositivo

Contribución

Si deseas contribuir, haz un fork del repositorio, crea una nueva rama, realiza los cambios y envía un pull request.

Autor

Desarrollador Principal: Montserrat Sanchez

Licencia

Este proyecto está bajo la licencia MIT. Para más detalles, revisa el archivo LICENSE en el repositorio.

