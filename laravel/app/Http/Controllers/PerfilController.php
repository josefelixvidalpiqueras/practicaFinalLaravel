<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User; /* Importamos el modelo User */
use Illuminate\Support\Facades\DB;  /* Importamos para poder usar este tipo de consultas con el QueryBuilder */
use Illuminate\Support\Facades\Hash; /* Importamos para poder cifrar de nuevo la contraseña */


class PerfilController extends Controller
{
    
    /* ADMINISTRADOR */

    /**
     * Función que muestra el listado de datos del perfil del usuario Administrador logueado.
     */
    public function perfilesIndex(){
        $users = DB::table('users')->where('id', auth()->user()->id)->get(); /* Consulta de todos los datos del ususario logueado */
        return view('perfiles.index', compact('users')); /* Ejecutamos la consulta al recargar la vista */
    }

    /**
     * Función que recoge el 'id' del perfil del usuario Administrador a editar pasado por el botón "Modificar Perfil".
     */
    public function perfilesEdit($id){
        $perfil = User::findOrFail($id);
        return view('perfiles.edit', compact('perfil')); /* Redirigimos al usuario a la ruta de edit pasandole el perfil recogido */
    }

    /**
     * Función con la lógica de actualizar los datos del perfil elegido en la base de datos.
     */
    public function perfilesUpdate(Request $request, $id){
        $perfil = User::findOrFail($id);
        $perfil -> name = $request -> input('name');
        $perfil -> email = $request -> input('email');
        // Volver a cifrar la contraseña al actualizarla
        $perfil -> password = Hash::make($request->password);
        $perfil -> nif = $request -> input('nif');
        $perfil -> direccion = $request -> input('direccion');
        $perfil -> telefono = $request -> input('telefono');
        $perfil -> save(); /* Guardamos los nuevos datos del perfil en su tabla en la base de datos */    
        return redirect()->route('perfiles.index')->with('info', 'Perfil actualizado correctamente.'); /* Tras actualizar el perfil redirigimos al usuario a su perfil */
    }

    /* CLIENTE */
    /**
     * Función que muestra el listado de datos del perfil del usuario Cliente logueado.
     */
    public function perfilesIndexCliente(){
        $users = DB::table('users')->where('id', auth()->user()->id)->get(); /* Consulta de todos los datos del ususario logueado */
        return view('perfiles.indexCliente', compact('users')); /* Ejecutamos la consulta al recargar la vista */
    }

    /**
     * Función que recoge el 'id' del perfil del usuario Cliente a editar pasado por el botón "Modificar Perfil".
     */
    public function perfilesEditCliente($id){
        $perfil = User::findOrFail($id);
        return view('perfiles.editCliente', compact('perfil')); /* Redirigimos al usuario a la ruta de edit pasandole el perfil recogido */
    }

    /**
     * Función con la lógica de actualizar los datos del perfil elegido en la base de datos.
     */
    public function perfilesUpdateCliente(Request $request, $id){
        $perfil = User::findOrFail($id);
        $perfil -> name = $request -> input('name');
        $perfil -> email = $request -> input('email');
        // Volver a cifrar la contraseña al actualizarla
        $perfil -> password = Hash::make($request->password);
        $perfil -> nif = $request -> input('nif');
        $perfil -> direccion = $request -> input('direccion');
        $perfil -> telefono = $request -> input('telefono');
        $perfil -> save(); /* Guardamos los nuevos datos del perfil en su tabla en la base de datos */    
        return redirect()->route('perfiles.indexCliente')->with('info', 'Perfil actualizado correctamente.'); /* Tras actualizar el perfil redirigimos al usuario a su perfil */
    }


}
