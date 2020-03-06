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

Route::get('/','tiendaController@index')->name('tienda');
Route::post('/carrito_add','carritoController@addProducto')->name('carrito_add');
Route::post('/carrito_subb','carritoController@subbProducto')->name('carrito_subb');
Route::get('/orden','tiendaController@index')
            ->name('tienda.orden')
            ->middleware('auth');

Auth::routes();

Route::prefix('productos')->group(function (){
    Route::get('/','productosController@index')->name('productos.index');
    Route::get('/crear','productosController@create')->name('productos.crear');
    Route::post('/guardar','productosController@store')->name('productos.guardar');
    Route::get('/editar/{id}','productosController@edit')->name('productos.editar');
    Route::post('/actualizar/{id}','productosController@update')->name('productos.actualizar');
    Route::get('/borrar/{id}','productosController@destroy')->name('productos.borrar');
});

Route::prefix('perfil')->group(function(){

    Route::get('/','perfilController@index')
        ->name('perfil');
});



Route::prefix('carrito')->group(function (){
        Route::get('/','carritoController@index');
});



