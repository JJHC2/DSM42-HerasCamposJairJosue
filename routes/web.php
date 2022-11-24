<?php

use App\Http\Controllers\CategoriesController;
use App\Http\Controllers\detailsController;
use App\Http\Controllers\inventoriesController;
use App\Http\Controllers\model_categoriesController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\modelcategory;
use App\Http\Controllers\ProductsController;
use App\Http\Controllers\type_usersController;
use App\Http\Controllers\usuariosController;


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

Route::get('/', function () {
    return view('welcome');
});
Route::get('mirut', function () {
    echo 'soy una ruta desde php';
});

route::get('/hola', function (){
    return view('prueba');
});

// COn las rutas resource se obtienen todos los metodos del controlador, de esta manera es mas practico y sencillo

/*PROD */
Route::resource('products',ProductsController::class);
/*CATEGORIAS */
Route::resource('categories',CategoriesController::class);
/*MODEL CATEGORY */
Route::resource('model_categories',model_categoriesController::class);
/*INVENTORY */
Route::resource('inventories',inventoriesController::class);
/*USUARIOS */
Route::resource('usuarios',usuariosController::class);
/*Type User */
Route::resource('type_user',type_usersController::class);
/*DETAILS*/
Route::resource('details',detailsController::class);
