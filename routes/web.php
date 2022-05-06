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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::get('usuarios/index','UsersController@vistaClientes')->name('usuarios.index');
Route::get('usuarios/allUsers','UsersController@all')->name('usuarios.all');
Route::post('usuarios/save','UsersController@save')->name('usuarios.save');
Route::get('usuarios/show/{id?}','UsersController@show')->name('usuarios.show');
Route::PUT('usuarios/edit/{id?}','UsersController@edit')->name('usuarios.edit');

Route::Post('usuarios/bloquear/','UsersController@bloqueo')->name('usuarios.bloqueo');
Route::Post('usuarios/restore/','UsersController@restore')->name('usuarios.restore');

//Excel

Route::POST('usuarios/exportExcel','UsersController@exportExcel')->name('usuarios.excel');

//Facturas

Route::get('facturas/index','FacturaController@index')->name('facturas.index');
Route::get('facturas/list','FacturaController@listFacturas')->name('facturas.list');

Route::get('facturas/descarga/{id?}','FacturaController@decargarArchivos')->name('facturas.descarga');
Route::get('facturas/envia/{id?}','FacturaController@enviarArchivos')->name('facturas.envio');
