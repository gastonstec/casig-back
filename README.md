
# 🎯 Proyecto: Control de Asignación de Equipos  

📌 **Descripción**  
Este proyecto es un sistema de gestión de asignación de equipos que permite a los administradores asignar dispositivos a empleados y técnicos. La autenticación se maneja a través de **Google** y el sistema cuenta con roles y permisos gestionados mediante **Spatie Permission**.

---

## 🚀 **Tecnologías Utilizadas**  
✅ **Laravel** – Framework PHP para el desarrollo backend  
✅ **Spatie Permission** – Gestión de roles y permisos  
✅ **Bootstrap** – Estilización de la interfaz  
✅ **Socialite** – Autenticación con Google  
✅ **SQLite/MySQL** – Base de datos  
✅ **Blade** – Sistema de plantillas de Laravel  

---

## 📌 **Requisitos Previos**  
Antes de instalar el proyecto, asegúrate de tener lo siguiente:  

🔹 **PHP** >= 8.1  
🔹 **Composer**  
🔹 **Node.js & npm** (para compilación de assets)  
🔹 **SQLite o MySQL** configurado  

---

## ⚙️ **Instalación**  

### 1️⃣ **Clonar el repositorio**  
```bash
git clone https://github.com/gastonstec/casig-back.git
2️⃣ Instalar dependencias
bash
Copiar
Editar
composer install
npm install && npm run dev
3️⃣ Configurar variables de entorno
bash
Copiar
Editar
cp .env.example .env
php artisan key:generate
4️⃣ Editar el archivo .env y configurar la base de datos:
env
Copiar
Editar
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=nombre_base_datos
DB_USERNAME=usuario
DB_PASSWORD=contraseña
5️⃣ Ejecutar migraciones y seeders
bash
Copiar
Editar
php artisan migrate --seed
6️⃣ Iniciar el servidor local
bash
Copiar
Editar
php artisan serve
📌 Ahora puedes abrir el navegador y acceder a la URL proporcionada en la terminal.

📂 Estructura del Proyecto
bash
Copiar
Editar
casig-back/
├── app/
│   ├── Http/
│   │   ├── Controllers/ (Controladores del sistema)
│   │   ├── Middleware/ (Middleware de autenticación y roles)
│   │   ├── Models/ (Modelos de la BD)
│   ├── Providers/ (Configuraciones adicionales)
├── database/
│   ├── migrations/ (Migraciones de la BD)
│   ├── seeders/ (Seeders para poblar la BD)
├── routes/
│   ├── web.php (Rutas de la aplicación)
├── resources/
│   ├── views/ (Vistas Blade)
🔑 Funcionalidades Clave
✔️ Autenticación con Google (Socialite)
✔️ Gestión de Roles y Permisos (Admin, Employee, DSS)
✔️ Asignación de dispositivos a empleados
✔️ Interfaz amigable con Bootstrap
✔️ Sistema de sesión y middleware de protección

📌 Uso del Sistema
🔹 Iniciar Sesión
Dirígete a http://localhost:8000.
Haz clic en Iniciar sesión con Google.
Según el rol asignado, serás dirigido a tu respectivo panel:
Admin: Panel de administración
Employee: Panel de empleado
DSS: Panel especial con botones visuales
🔗 Rutas Principales
Método	Ruta	Descripción
GET	/	Página de inicio
GET	/auth/redirect/google	Redirección a Google Auth
GET	/dashboard	Dashboard según el rol
GET	/logout	Cierra la sesión
GET	/admin	Panel de administrador
GET	/employee	Panel de empleados
GET	/usuario/{id}	Obtiene datos de un usuario
GET	/dispositivo/{id}	Obtiene datos de un dispositivo
🤝 Contribución
Si deseas contribuir, sigue estos pasos:

Haz un fork del repositorio.
Crea una nueva rama (git checkout -b nueva-feature).
Realiza los cambios y haz un commit (git commit -m "feat: Descripción del cambio").
Sube los cambios (git push origin nueva-feature).
Abre un pull request.
✍️ Autor
👩‍💻 Desarrollador: Victor Hernandez

