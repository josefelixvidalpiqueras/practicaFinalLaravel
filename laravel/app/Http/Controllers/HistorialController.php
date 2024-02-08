<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Venta; /* Importamos el modelo Venta */
use Illuminate\Support\Facades\DB;  /* Importamos para poder usar este tipo de consultas con el QueryBuilder */

class HistorialController extends Controller
{
    
    public function historialIndex() {
        return view('historial.index');
    }

}
