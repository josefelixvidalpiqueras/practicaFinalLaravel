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

    /**
     * Función que redirige a la vista del formulario de creación de noticias.
     */
    public function noticiasCreate(){
        return view('noticias.create');
    }

    /**
     * Función que recoge los campos introducidos en el formulario y crea una nueva Noticia con ellos.
     */
    public function noticiasStore(Request $request){
        $newNoticia = new Noticia;
        $newNoticia -> titular = $request -> input('titular');
        $newNoticia -> cuerpo = $request -> input('cuerpo');

        // Verificamos si se ha enviado un archivo de imagen
        if ($request->hasFile('imagen')) {
            // Obtenemos el archivo de imagen de la solicitud
            $imagen = $request->file('imagen');
            
            // Verificamos si la imagen se cargó correctamente
            if ($imagen->isValid()) {
                // Generamos un nombre único para la imagen
                $nombreImagen = time().'.'.$imagen->getClientOriginalExtension();
                
                // Movemos la imagen a la ruta pertinente (en mi caso "images" es donde tengo todas mis imágenes en la carpeta public del proyecto)
                $imagen->move(public_path('images'), $nombreImagen);
                
                // Asignamos la ruta de la imagen al objeto de Camiseta
                $newNoticia->imagen = 'images/'.$nombreImagen;
            }
        }

        $newNoticia -> save(); /* Guardamos la nueva Camiseta en su tabla en la base de datos */    
        return redirect()->route('noticias.index')->with('info', 'Noticia insertada correctamente.'); /* Tras crear la camiseta redirigimos al usuario al listado de Camisetas */
    }

}
