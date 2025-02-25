<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

/**
 * Class EmployeeController
 *
 * Controller responsible for handling the employee dashboard view.
 * This controller redirects users with the `employee` role to their respective view within the system.
 *
 * @package App\Http\Controllers
 */
class EmployeeController extends Controller
{
    /**
     * Displays the employee dashboard view.
     *
     * @return \Illuminate\View\View Returns the corresponding view for the employee dashboard.
     */
    public function index()
    {
        return view('employee.dashboard');
    }
}
