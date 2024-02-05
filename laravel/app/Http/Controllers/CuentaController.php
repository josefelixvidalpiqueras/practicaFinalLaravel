<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User; /* Importamos el modelo User */
use Illuminate\Support\Facades\DB;  /* Importamos para poder usar este tipo de consultas con el QueryBuilder */

class CuentaController extends Controller
{
    /* ADMINISTRADOR */
    /**
     * Función que muestra el listado de cuentas de usuario y su estado (activa / inactiva).
     * Sólo mostramos las cuentas de cliente, pues sería ilógico que un administrador desactivase su propia cuenta.
     */
    public function cuentasIndex(){
        $users = DB::table('users')->where('is_admin','0')->get(); /* Consulta de todos los datos del ususario logueado */
        return view('cuentas.index', compact('users')); /* Ejecutamos la consulta al recargar la vista */
    }

    /**
     * Función con la lógica de actualizar los la el estado de la cuenta con la "id" pasada por el botón pulsado.
     */
    public function cuentasUpdate($id){
        $user = User::findOrFail($id);
            if ($user->activo == 0) {
                $user->activo = 1;
            } else {
                $user->activo = 0;
            }
        $user -> save(); /* Guardamos el nuevo estado de la cuenta del usuario en la base de datos */    
        return redirect()->route('cuentas.index'); /* Tras actualizar el estado de la cuenta, recargamos la ruta de cuentas */
    }
    

}
