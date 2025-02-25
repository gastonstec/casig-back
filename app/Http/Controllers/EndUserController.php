<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

/**
 * Class UserController
 *
 * Controller for user data simulation.
 * Provides dummy information that can be used for testing,
 * emulating future integration with an external system like ServiceNow.
 *
 * @package App\Http\Controllers
 */
class EndUserController extends Controller
{
    /**
     * Retrieves simulated user information based on the provided query parameters.
     *
     * @param Request $request HTTP request object containing the query parameters.
     * @return \Illuminate\Http\JsonResponse JSON response with dummy user data.
     */
    public function getUserById(Request $request)
    {
        // Retrieves URL values or defaults if not provided
        $userId = $request->query('UserId', 'Aquí va el UserId');
        $name = $request->query('Name', 'Aquí va el nombre');
        $email = $request->query('Email', 'Aquí va el email');

        // Returns a JSON response with dummy user information
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
