<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

/**
 * Class AdminController
 *
 * Controller responsible for handling administrator actions.
 *
 * @package App\Http\Controllers
 */
class AdminController extends Controller
{
    /**
     * Displays the main view of the administration panel.
     *
     * This method retrieves the authenticated user and passes it to the 
     * administration view for use in the interface.
     *
     * @return \Illuminate\Contracts\View\View Administration view with authenticated user data.
     */
    public function index()
    {
        $user = Auth::user(); // Retrieve authenticated user
        return view('admin.admi', compact('user')); // Load the admin.admi view
    }
}
