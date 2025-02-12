<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Usuario;
use App\Models\Tecnico;
use App\Models\Dispositivo;

/**
 * Class AsignacionController
 *
 * Controlador encargado de gestionar la asignación de dispositivos a usuarios y técnicos.
 *
 * @package App\Http\Controllers
 */
class AsignacionController extends Controller
{
    /**
     * Obtiene los datos de un usuario por su ID.
     *
     * @param int $id ID del usuario a buscar.
     * @return \Illuminate\Http\JsonResponse JSON con los datos del usuario o un error 404 si no se encuentra.
     */
    public function getUsuario($id)
    {
        $usuario = Usuario::find($id);

        if (!$usuario) {
            return response()->json(null, 404); // Devuelve un error si el usuario no existe
        }

        return response()->json($usuario);
    }

    /**
     * Muestra la vista de administración con la lista de usuarios, técnicos y dispositivos.
     *
     * @return \Illuminate\Contracts\View\View Vista 'admin.admi' con los datos cargados.
     */
    public function index()
    {
        $usuarios = Usuario::all(); // Obtener todos los usuarios
        $tecnicos = Tecnico::all(); // Obtener todos los técnicos
        $dispositivos = Dispositivo::all(); // Obtener todos los dispositivos

        return view('admin.admi', compact('usuarios', 'tecnicos', 'dispositivos'));
    }

    /**
     * Obtiene los datos de un dispositivo por su ID.
     *
     * @param int $id ID del dispositivo a buscar.
     * @return \Illuminate\Http\JsonResponse JSON con los datos del dispositivo o un error 404 si no se encuentra.
     */
    public function getDispositivo($id)
    {
        $dispositivo = Dispositivo::find($id);

        if (!$dispositivo) {
            return response()->json(['error' => 'Dispositivo no encontrado'], 404);
        }

        return response()->json($dispositivo);
    }
}
