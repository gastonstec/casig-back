<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

/**
 * Class AdminController
 *
 * Controlador responsable de manejar las acciones del administrador.
 *
 * @package App\Http\Controllers
 */
class AdminController extends Controller
{
    /**
     * Muestra la vista principal del panel de administración.
     *
     * Este método obtiene el usuario autenticado y lo pasa a la vista 
     * de administración para su uso en la interfaz.
     *
     * @return \Illuminate\Contracts\View\View Vista de administración con los datos del usuario autenticado.
     */
    public function index()
    {
        $user = Auth::user(); // Obtener usuario autenticado
        return view('admin.admi', compact('user')); // Cargar la vista admin.admi
    }
}
