<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

/* RUTAS DE GESTIÓN MIDDLEWARE */
/* Todas las rutas de Auth (middleware) importadas y activas */
Auth::routes();

/* RUTAS PROTEGIDAS con autenticación */
/* Grupo de rutas sólo accesibles una vez logueado con un usuario válido del sistema */
Route::middleware('auth')->group(function () {    

    /* ADMINISTRADOR */
    /* RUTAS DE CAMISETAS para usuarios ADMINISTRADOR */
    /* Ruta a la Vista (blade) principal de Camisetas */
    Route::get('admin/camisetas', 'CamisetaController@camisetasIndex')->name('camisetas.index')->middleware('is_admin');

    /* Ruta a la Vista (blade) de creación (create) de Camisetas */
    Route::get('admin/camisetas/create', 'CamisetaController@camisetasCreate')->name('camisetas.create')->middleware('is_admin');
    
    /* Ruta que recoge los campos de formulario introducidos y crea una nueva Camiseta con ellos */
    Route::post('admin/camisetas', 'CamisetaController@camisetasStore')->name('camisetas.store')->middleware('is_admin');

    /* Ruta que borra la Camiseta de la base de datos */
    Route::delete('admin/camisetas/{id}', 'CamisetaController@camisetasDestroy')->name('camisetas.destroy')->middleware('is_admin');

    /* Ruta que recoge la camiseta a editar elegida en el formulario */
    Route::get('admin/camisetas/{id}/edit', 'CamisetaController@camisetasEdit')->name('camisetas.edit')->middleware('is_admin');

    /* Ruta con la lógica de actualizar los datos de la camiseta elegida en la base de datos */
    Route::put('admin/camisetas/{id}', 'CamisetaController@camisetasUpdate')->name('camisetas.update')->middleware('is_admin');

    /* RUTAS DE PERFILES para usuarios ADMINISTRADOR */
    /* Ruta a la Vista (blade) del perfil del usuario */
    Route::get('admin/perfiles', 'PerfilController@perfilesIndex')->name('perfiles.index')->middleware('is_admin');

    /* Ruta que recoge el "id" de perfil del usuario Administrador a editar pasado por el botón "Modificar Perfil" */
    Route::get('admin/perfiles/{id}/edit', 'PerfilController@perfilesEdit')->name('perfiles.edit')->middleware('is_admin');

    /* Ruta con la lógica de actualizar los datos del perfil del usuario Administrador en la base de datos */
    Route::put('admin/perfiles/{id}', 'PerfilController@perfilesUpdate')->name('perfiles.update')->middleware('is_admin');

    /* RUTAS DE CUENTAS para usuarios ADMINISTRADOR */
    /* Ruta a a la vista (blade) con el listado de Cuentas de los usuarios */
    Route::get('admin/cuentas', 'CuentaController@cuentasIndex')->name('cuentas.index')->middleware('is_admin');

    /* Ruta a a la vista (blade) con el listado de Cuentas de los usuarios */
    Route::get('admin/cuentas/{id}', 'CuentaController@cuentasUpdate')->name('cuentas.update')->middleware('is_admin');

    /*RUTAS DE HISTORIAL de pedidos para usuarios ADMINISTRADOR */
    /* Ruta a la vista (blade) con el listado del Historial de pedidos de todos los usuarios */
    Route::get('admin/historial', 'HistorialController@historialIndex')->name('historial.index')->middleware('is_admin');
     
    /* Ruta a la vista (blade) con el envío seleccionado para el cambio de estado del pedido por parte del Administrador */
    Route::get('admin/historial/{id}', 'HistorialController@historialEdit')->name('historial.edit')->middleware('is_admin');

    /* Ruta a la vista (blade) que cambia el estado del pedido al elegido por parte del Administrador en la ruta de edición */
    Route::put('admin/historial/update/{id}', 'HistorialController@historialUpdate')->name('historial.update')->middleware('is_admin');

    /* CLIENTE */
    /* RUTAS DE PERFILES para usuarios CLIENTE */
    /* Ruta a la Vista (blade) del perfil del usuario */
    Route::get('perfiles', 'PerfilController@perfilesIndexCliente')->name('perfiles.indexCliente');

    /* Ruta que recoge el "id" de perfil del usuario Cliente a editar pasado por el botón "Modificar Perfil" */
    Route::get('perfiles/{id}/edit', 'PerfilController@perfilesEditCliente')->name('perfiles.editCliente');

    /* Ruta con la lógica de actualizar los datos del perfil del usuario Cliente en la base de datos */
    Route::put('perfiles/{id}', 'PerfilController@perfilesUpdateCliente')->name('perfiles.updateCliente');

    /* RUTAS DEL CARRITO DE COMPRAS (COMUNES A ADMINISTRADOR Y CLIENTE) */
    /* Si entras a la ruta "/carrito" se ejecuta la función carritoIndex del controlador VentaController */
    Route::get('/carrito', 'VentaController@carritoIndex')->name('carrito.index');

    /* Si entras a la ruta "/carrito/add/{id}/{precioVenta}/{descuentoVenta}" se ejecuta la función carritoAdd del controlador VentaController (el carrito sólo funciona logueado) */
    Route::get('/carrito/add/{id}/{precioVenta}/{descuentoVenta}', 'VentaController@carritoAdd')->name('carrito.add');

    /* Si entras a la ruta "/carrito/drop/{id}" se ejecuta la función carritoDrop del controlador VentaController (el carrito sólo funciona logueado) */
    Route::get('/carrito/drop/{id}', 'VentaController@carritoDrop')->name('carrito.drop');

    /* Si entras a la ruta "/carrito/realizarpedido" se ejecuta la función realizarPedido del controlador VentaController. */
    Route::get('/carrito/realizarpedido', 'VentaController@realizarPedido')->name('carrito.realizarpedido');

    /*RUTAS DE HISTORIAL de pedidos para usuarios CLIENTE */
    /* Ruta a la vista (blade) con el listado del Historial de pedidos de todos los usuarios */
    Route::get('/historial', 'HistorialController@historialClienteIndex')->name('historial.indexCliente');

});



/* RUTAS DE CADA HOME (página principal de cada tipo de usuario al hacer login) */
/* Ruta que ejecuta la función index (User Home) del HomeController.php */
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

/* Ruta que ejecuta la función adminHome (Admin Home) del HomeController.php */
Route::get('/admin/home', [App\Http\Controllers\HomeController::class, 'adminHome'])->name('admin.home')->middleware('is_admin');

/* RUTAS PÚBLICAS EN LA TIENDA */
/* Si entras a la ruta "/" se ejecuta la función "welcome" del controlador "CamisetaController.php" */
Route::get('/', 'CamisetaController@welcome')->name('welcome');

/* Si entras a la ruta "/detalles" se ejecuta la función "welcomeDetalles" del controlador "CamisetaController.php" */
Route::get('/detalles', 'CamisetaController@welcomeDetalles')->name('welcome-detalles');

/* Si entras a la ruta "/{id}" (al pinchar una imagen de camiseta) se ejecuta la función "welcomeElegida" del controlador "CamisetaController.php" */
Route::get('/{id}', 'CamisetaController@welcomeElegida')->name('welcome-elegida');


