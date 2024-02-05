<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     * Función que controla cuál es la página HOME para un usuario Normal. 
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        /* Comprobamos si el usuario es Admin para poder acceder a la ruta solicitada */
        if (auth()->user()->is_admin==1) {
            return redirect('admin/home')->with('error', 'Estás usando una cuenta de Administrador, no de cliente.');
        } else {
            if (auth()->user()->activo==1) {
                /* Si NO es Admin (es un cliente con cuenta de Usuario Normal) lo redirigimos a su home notificándole que no tiene permisos */
                return view('home');
            } else {
                return view('auth.login')->with('info', 'Cuenta inactiva. Debe activarla un Administrador.');
            }
        }        
    }

    /**
     * Función que controlará cuál es la página HOME para un usuario Administrador. 
     */
    public function adminHome()
    {
        return view('admin-home');
    }
}
