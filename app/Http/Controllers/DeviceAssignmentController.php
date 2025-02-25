<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\EndUser;
use App\Models\Technician;
use App\Models\Device;

/**
 * Controller for device assignment and management of users, technicians, and devices.
 */
class DeviceAssignmentController extends Controller
{
    /**
     * Loads the main view without users from the database, as they will be fetched via API.
     *
     * @return \Illuminate\View\View Administration page view.
     */
    public function index()
    {
        $technicians = Technician::all(); // Retrieve all technicians from the database
        $devices = Device::all(); // Retrieve all devices from the database

        return view('admin.admi', compact('technicians', 'devices'));
    }

    /**
     * Retrieves user information from an external API.
     *
     * @param int $id User ID to search for.
     * @return \Illuminate\Http\JsonResponse JSON response with user data or an error message.
     */
    public function getUser($id)
    {
        $apiUrl = "http://127.0.0.1:8000/SnowGetUserId?UserId={$id}";

        try {
            $response = file_get_contents($apiUrl);

            if ($response === FALSE) {
                return response()->json(['error' => 'User not found in the API'], 404);
            }

            return response()->json(json_decode($response));
        } catch (\Exception $e) {
            return response()->json(['error' => 'Error connecting to the API'], 500);
        }
    }

    /**
     * Retrieves technician information from the database.
     *
     * @param int $id Technician ID to search for.
     * @return \Illuminate\Http\JsonResponse JSON response with technician data or an error message.
     */
    public function getTechnician($id)
    {
        $technician = Technician::find($id);

        if (!$technician) {
            return response()->json(['error' => 'Technician not found'], 404);
        }

        return response()->json($technician);
    }

    /**
     * Retrieves device information from the database.
     *
     * @param int $id Device ID to search for.
     * @return \Illuminate\Http\JsonResponse JSON response with device data or an error message.
     */
    public function getDevice($id)
    {
        $device = Device::find($id);

        if (!$device) {
            return response()->json(['error' => 'Device not found'], 404);
        }

        return response()->json($device);
    }
}

