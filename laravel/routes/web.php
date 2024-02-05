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

/* Si entras a la ruta "/" se ejecuta la función "welcome" del controlador "CamisetaController.php" */
Route::get('/', 'CamisetaController@welcome')->name('welcome');

/* Si entras a la ruta "/" se ejecuta la función "welcomeDetalles" del controlador "CamisetaController.php" */
Route::get('/detalles', 'CamisetaController@welcomeDetalles')->name('welcome-detalles');

/* Todas las rutas de Auth (middleware) importadas y activas */
Auth::routes();

/* Ruta que ejecuta la función index (User Home) del HomeController.php */
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

/* Ruta que ejecuta la función adminHome (Admin Home) del HomeController.php */
Route::get('/admin/home', [App\Http\Controllers\HomeController::class, 'adminHome'])->name('admin.home')->middleware('is_admin');

/* RUTAS PROTEGIDAS con autenticación */
/* Grupo de rutas sólo accesibles una vez logueado con un usuario válido del sistema */
Route::middleware('auth')->group(function () {
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

});