<?php

use Illuminate\Support\Facades\Route;
use Laravel\Socialite\Facades\Socialite;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\EmployeeController;
use App\Http\Controllers\SNController;
use Illuminate\Http\Request;
use App\Http\Controllers\DeviceAssignmentController; 

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| This file contains all the application routes.
| Here, authentication routes, protected views, and API routes are defined.
|
*/

/**
 * Main Route - Welcome Page.
 *
 * @return \Illuminate\View\View
 */
Route::get('/', function () {
    return view('welcome');
});

/*
|--------------------------------------------------------------------------
| Google Authentication Routes
|--------------------------------------------------------------------------
*/

/**
 * Redirects to Google's authentication page.
 *
 * @return \Symfony\Component\HttpFoundation\RedirectResponse
 */
Route::get('/auth/redirect/google', function () {
    return Socialite::driver('google')->redirect();
});

/**
 * Google authentication callback.
 * Retrieves user information and logs them into the application.
 *
 * @return \Illuminate\Http\RedirectResponse
 */
Route::get('/auth/callback/google', function () {
    try {
        // Retrieves the user from Google
        $googleUser = Socialite::driver('google')->user();

        // Finds or creates the user in the database
        $user = User::firstOrCreate(
            ['email' => $googleUser->getEmail()],
            [
                'name' => $googleUser->getName(),
                'google_id' => $googleUser->getId(),
                'password' => bcrypt('default_password'), // Required but not used
            ]
        );

        // Authenticates the user
        Auth::login($user);
        return redirect('/dashboard');

    } catch (\Exception $e) {
        return redirect('/')->with('error', 'Error authenticating with Google.');
    }
});

/*
|--------------------------------------------------------------------------
| Protected Routes (Require Authentication)
|--------------------------------------------------------------------------
*/

/**
 * Dashboard Route with Role Control.
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
        } elseif ($user->hasRole('dss')) { // ✅ Ensures DSS redirection
            return view('dss.dss');
        }

        abort(403, 'Access denied.');
    });
});

/*
|--------------------------------------------------------------------------
| Admin Routes
|--------------------------------------------------------------------------
*/

/**
 * Route for the admin view.
 *
 * @return \Illuminate\View\View
 */
Route::middleware(['auth', 'role:admin'])->group(function () {
    Route::get('/admin', [AdminController::class, 'index'])->name('admin.admi');
});

/*
|--------------------------------------------------------------------------
| Employee Routes
|--------------------------------------------------------------------------
*/

/**
 * Route for the employee view.
 *
 * @return \Illuminate\View\View
 */
Route::middleware(['auth', 'role:employee'])->group(function () {
    Route::get('/employee', [EmployeeController::class, 'index'])->name('employee.dashboard');
});

/*
|--------------------------------------------------------------------------
| DSS Routes (New Role)
|--------------------------------------------------------------------------
*/

/**
 * Route for the DSS user view.
 *
 * @return \Illuminate\View\View
 */
Route::middleware(['auth', 'role:dss'])->group(function () {
    Route::get('/dss', function () {
        return view('dss.dss'); // ✅ View for DSS
    })->name('dss.dashboard');
});

/*
|--------------------------------------------------------------------------
| Logout Route
|--------------------------------------------------------------------------
*/

/**
 * Logs the user out and redirects them to the homepage.
 *
 * @return \Illuminate\Http\RedirectResponse
 */
 
 Route::get('/logout', function (Request $request) {
     Auth::logout(); // Cierra sesión en Laravel
     session()->flush(); // Borra la sesión completamente
 
     // Redirige al usuario a la pantalla de inicio (welcome.blade.php)
     return redirect('/')->with('googleLogout', 'https://accounts.google.com/logout');
 })->name('logout');
 

/*
|--------------------------------------------------------------------------
| API Routes (Users and Devices)
|--------------------------------------------------------------------------
*/

/**
 * Retrieves user information by ID.
 *
 * @param int $id
 * @return \Illuminate\Http\JsonResponse
 */
Route::get('/usuario/{id}', [DeviceAssignmentController::class, 'getUsuario']); // ✅ Back to DeviceAssignmentController

/**
 * Retrieves device information by ID.
 *
 * @param int $id
 * @return \Illuminate\Http\JsonResponse
 */
Route::get('/device/{id}', [DeviceAssignmentController::class, 'getDispositivo']);

/*
|--------------------------------------------------------------------------
| Assignment Management Route
|--------------------------------------------------------------------------
*/

/**
 * Displays the assignment administration view.
 *
 * @return \Illuminate\View\View
 */
Route::get('/admin', [DeviceAssignmentController::class, 'index'])->name('admin.admi'); // ✅ Restored DeviceAssignmentController

/*
|--------------------------------------------------------------------------
| API Route to Retrieve User Information
|--------------------------------------------------------------------------
*/

/**
 * Returns user information in JSON format.
 *
 * @return \Illuminate\Http\JsonResponse
 */
Route::get('/api/getUser', [SNController::class, 'getUserById']);
