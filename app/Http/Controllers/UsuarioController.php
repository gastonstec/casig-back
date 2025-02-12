<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Usuario;

/**
 * Class UsuarioController
 *
 * Controlador para gestionar la obtención de información de usuarios.
 * Este controlador permite recuperar datos de un usuario específico en formato JSON.
 *
 * @package App\Http\Controllers
 */
class UsuarioController extends Controller
{
    /**
     * Obtiene un usuario por su ID y devuelve su información en formato JSON.
     *
     * @param int $id El ID del usuario a buscar.
     * @return \Illuminate\Http\JsonResponse Respuesta JSON con la información del usuario.
     */
    public function obtenerUsuario($id)
    {
        $usuario = Usuario::find($id);

        // Verifica si el usuario existe
        if (!$usuario) {
            return response()->json(['error' => 'Usuario no encontrado'], 404);
        }

        return response()->json($usuario);
    }
}
