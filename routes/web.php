<?php

/*=====================================
=            RUTAS DEL HEADER          =
======================================*/

Route::view('/','home')->name("home");
Route::view('/acerca-de','about')->name("about");
Route::view('/typography','typography')->name('typo');
Route::view('/contacto','contact')->name('contact');

/*====  RUTAS DEL HEADER   */


/*=====================================
=            RUTAS DE PROVEEDOR         =
======================================*/

Route::view('/iniciar-sesion','session')->name('session');
Route::get('/proveedor/registrarse','ProveedorController@create')->name('proveedor.create');
Route::post('/proveedor/proveedores', 'ProveedorController@store')->name('proveedor.store');
Route::get('/proveedor/proveedores','ProveedorController@index')->name('proveedor.index');
Route::get('/proveedores-perfil/{parameter}','ProveedorController@show')->name('proveedor.show');

//rutas jSON
Route::get('/proveedor/proveedores/json/getproveedores/{parameter}','ProveedorController@getProveedoresByName')->name('getProveedoresByName');
//fin json

/*====  RUTAS DE PROVEEDOR   */


Auth::routes();

Route::post('login','Auth\LoginController@login')->name('login');
Route::get('/logout', '\App\Http\Controllers\Auth\LoginController@logout');
