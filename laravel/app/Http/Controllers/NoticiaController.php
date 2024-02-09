<?php

namespace App\Http\Controllers;
use App\Models\Noticia; /* Importamos el modelo Camiseta */
use Illuminate\Support\Facades\DB;  /* Importamos para poder usar este tipo de consultas con el QueryBuilder */

use Illuminate\Http\Request;

class NoticiaController extends Controller
{    

    /**
     * Función que consulta todas las noticias de la base de datos y redirige al usuario a la vista pertinente 
     * pasandole el resultado de la consulta.
     */
    public function noticiasIndex() {
        $noticias = DB::table('noticias')->get(); /* Almacenamos la consulta que devuelve todas las noticias */
        return view('noticias.index', compact('noticias')); 
    }

}
