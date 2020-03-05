<?php

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


Auth::routes();
Route::resource('productos','productosController');

Route::prefix('admin')->group(function(){

    Route::get('/','administradorController@index')
        ->name('admin');
});

Route::prefix('tienda')->group(function (){
     Route::get('/','tiendaController@index');
});

Route::prefix('carrito')->group(function (){
        Route::get('/','carritoController@index');
});



