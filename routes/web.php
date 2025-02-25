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




Route::get('/quitar_carrito/{id}','carritoController@quitar_producto_carrito')
        ->name('quitar_de_carrito')
        ->middleware('auth');;

        //Rutas con prefijos
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

Route::prefix('orden')->group(function (){

    Route::get('/','ordenController@orden')
        ->name('orden');

    Route::get('/finalizar','ordenController@finalizar')
        ->name('orden.finalizar');
});


Route::get('/{id}','tiendaController@ver_producto')
    ->name('producto.ver');

Route::get('/','tiendaController@index')->name('tienda');






