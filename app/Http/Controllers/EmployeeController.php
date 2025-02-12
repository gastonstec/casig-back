<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

/**
 * Class EmployeeController
 *
 * Controlador responsable de manejar la vista del dashboard de los empleados.
 * Este controlador se encarga de redirigir a los usuarios con el rol `employee`
 * a su respectiva vista dentro del sistema.
 *
 * @package App\Http\Controllers
 */
class EmployeeController extends Controller
{
    /**
     * Muestra la vista del dashboard de empleados.
     *
     * @return \Illuminate\View\View Retorna la vista correspondiente al dashboard del empleado.
     */
    public function index()
    {
        return view('employee.dashboard');
    }
}
