<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

/**
 * Class UserController
 *
 * Controlador para la simulación de datos de usuario.
 * Proporciona información dummy que puede ser utilizada para pruebas,
 * emulando la futura integración con un sistema externo como ServiceNow.
 *
 * @package App\Http\Controllers
 */
class UserController extends Controller
{
    /**
     * Obtiene información simulada de un usuario basado en los parámetros proporcionados en la consulta.
     *
     * @param Request $request Objeto de solicitud HTTP que contiene los parámetros de consulta.
     * @return \Illuminate\Http\JsonResponse Respuesta en formato JSON con datos ficticios del usuario.
     */
    public function getUserById(Request $request)
    {
        // Obtiene los valores de la URL, o deja valores predeterminados si no se proporcionan
        $userId = $request->query('UserId', 'Aquí va el UserId');
        $name = $request->query('Name', 'Aquí va el nombre');
        $email = $request->query('Email', 'Aquí va el email');

        // Devuelve una respuesta JSON con información dummy del usuario
        return response()->json([
            "UserId" => $userId,
            "Name" => $name,
            "Email" => $email,
            "Location" => "Aquí va la ubicación",
            "CallCenter" => "Aquí va el call center",
            "Position" => "Aquí va el puesto",
            "Supervisor" => "Aquí va el supervisor"
        ], 200, [], JSON_UNESCAPED_UNICODE);
    }
}
