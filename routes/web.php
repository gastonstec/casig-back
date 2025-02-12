<?php

use Illuminate\Support\Facades\Route;
use Laravel\Socialite\Facades\Socialite;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\EmployeeController;
use App\Http\Controllers\UsuarioController;
use App\Http\Controllers\AsignacionController;
use App\Http\Controllers\UserController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Este archivo contiene todas las rutas de la aplicación.
| Aquí se definen rutas de autenticación, vistas protegidas y rutas de API.
|
*/

/**
 * Ruta principal - Página de bienvenida.
 *
 * @return \Illuminate\View\View
 */
Route::get('/', function () {
    return view('welcome');
});

/*
|--------------------------------------------------------------------------
| Rutas de Autenticación con Google
|--------------------------------------------------------------------------
*/

/**
 * Redirige a la página de autenticación de Google.
 *
 * @return \Symfony\Component\HttpFoundation\RedirectResponse
 */
Route::get('/auth/redirect/google', function () {
    return Socialite::driver('google')->redirect();
});

/**
 * Callback de autenticación con Google.
 * Obtiene la información del usuario y lo autentica en la aplicación.
 *
 * @return \Illuminate\Http\RedirectResponse
 */
Route::get('/auth/callback/google', function () {
    try {
        // Obtiene el usuario desde Google
        $googleUser = Socialite::driver('google')->user();

        // Busca o crea el usuario en la base de datos
        $user = User::firstOrCreate(
            ['email' => $googleUser->getEmail()],
            [
                'name' => $googleUser->getName(),
                'google_id' => $googleUser->getId(),
                'password' => bcrypt('default_password'), // No se usa, pero es obligatorio en la BD
            ]
        );

        // Autentica al usuario
        Auth::login($user);
        return redirect('/dashboard');

    } catch (\Exception $e) {
        return redirect('/')->with('error', 'Error al autenticar con Google.');
    }
});

/*
|--------------------------------------------------------------------------
| Rutas Protegidas (Requieren Autenticación)
|--------------------------------------------------------------------------
*/

/**
 * Ruta del Dashboard con control de roles.
 *
 * @return \Illuminate\Http\RedirectResponse|\Illuminate\View\View
 */
Route::middleware(['auth'])->group(function () {
    Route::get('/dashboard', function () {
        $user = Auth::user();

        if ($user->hasRole('admin')) {
            return redirect()->route('admin.admi');
        } elseif ($user->hasRole('employee')) {
            return view('employee.dashboard', compact('user'));
        } elseif ($user->hasRole('dss')) {
            return view('dss.dss'); // ✅ Redirige a la vista DSS
        }

        abort(403, 'Acceso denegado.');
    });
});

/*
|--------------------------------------------------------------------------
| Rutas para Administradores
|--------------------------------------------------------------------------
*/

/**
 * Ruta para la vista de administrador.
 *
 * @return \Illuminate\View\View
 */
Route::middleware(['auth', 'role:admin'])->group(function () {
    Route::get('/admin', [AdminController::class, 'index'])->name('admin.admi');
});

/*
|--------------------------------------------------------------------------
| Rutas para Empleados
|--------------------------------------------------------------------------
*/

/**
 * Ruta para la vista del empleado.
 *
 * @return \Illuminate\View\View
 */
Route::middleware(['auth', 'role:employee'])->group(function () {
    Route::get('/employee', [EmployeeController::class, 'index'])->name('employee.dashboard');
});

/*
|--------------------------------------------------------------------------
| Rutas para DSS (Nuevo Rol)
|--------------------------------------------------------------------------
*/

/**
 * Ruta para la vista del usuario con rol DSS.
 *
 * @return \Illuminate\View\View
 */
Route::middleware(['auth', 'role:dss'])->group(function () {
    Route::get('/dss', function () {
        return view('dss.dss'); // ✅ Vista para DSS
    })->name('dss.dashboard');
});

/*
|--------------------------------------------------------------------------
| Ruta de Cierre de Sesión
|--------------------------------------------------------------------------
*/

/**
 * Cierra la sesión del usuario y lo redirige a la página de inicio.
 *
 * @return \Illuminate\Http\RedirectResponse
 */
Route::get('/logout', function () {
    Auth::logout();
    return redirect('/');
});

/*
|--------------------------------------------------------------------------
| Rutas de API (Usuarios y Dispositivos)
|--------------------------------------------------------------------------
*/

/**
 * Obtiene información de un usuario por ID.
 *
 * @param int $id
 * @return \Illuminate\Http\JsonResponse
 */
Route::get('/usuario/{id}', [AsignacionController::class, 'getUsuario']);

/**
 * Obtiene información de un dispositivo por ID.
 *
 * @param int $id
 * @return \Illuminate\Http\JsonResponse
 */
Route::get('/dispositivo/{id}', [AsignacionController::class, 'getDispositivo']);

/*
|--------------------------------------------------------------------------
| Ruta para la Administración de Asignaciones
|--------------------------------------------------------------------------
*/

/**
 * Muestra la vista de administración de asignaciones.
 *
 * @return \Illuminate\View\View
 */
Route::get('/admin', [AsignacionController::class, 'index'])->name('admin.admi');

/*
|--------------------------------------------------------------------------
| Ruta para Obtener Información de Usuarios vía API
|--------------------------------------------------------------------------
*/

/**
 * Devuelve información de un usuario en formato JSON.
 *
 * @return \Illuminate\Http\JsonResponse
 */
Route::get('/api/getUser', [UserController::class, 'getUserById']);
