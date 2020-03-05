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

Route::prefix('perfil')->group(function(){

    Route::get('/','perfilController@index')
        ->name('perfil');
});

Route::prefix('tienda')->group(function (){
     Route::get('/','tiendaController@index')->name('tienda');
});

Route::prefix('carrito')->group(function (){
        Route::get('/','carritoController@index');
});



