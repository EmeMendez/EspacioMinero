<?php

/*=====================================
=            RUTAS DEL HEADER          =
======================================*/

Route::get('/','bannerController@index')->name("home");
Route::view('/acerca-de','about')->name("about");
Route::view('/typography','typography')->name('typo');
Route::view('/contacto','contact')->name('contact');

/*====  RUTAS DEL HEADER   */




/*=====================================
=            RUTAS DE PROVEEDOR         =
======================================*/

Route::view('/iniciar-sesion','session')->name('session');
Route::get('/proveedor/registrarse','ProveedorController@create')->name('proveedor.create');
Route::get('/proveedor/vista-perfil/{url}','ProveedorController@edit')->name('proveedor.edit');
Route::patch('/proveedor/vista-perfil/{proveedor}','ProveedorController@update')->name('proveedor.update');
Route::patch('/imagen/update', 'ProveedorController@update_imagen')->name('proveedor.update_imagen');
Route::post('/proveedor/proveedores', 'ProveedorController@store')->name('proveedor.store');
Route::get('/proveedor/proveedores','ProveedorController@index')->name('proveedor.index');
Route::get('/proveedor/perfil/{url}','ProveedorController@show')->name('proveedor.show');
Route::get('/recursos','ProveedorController@recursos')->name('proveedor.recursos');


//rutas jSON
Route::get('/proveedor/proveedores/json/getproveedores/{parameter}','ProveedorController@getProveedoresByName')->name('getProveedoresByName');
Route::get('/regiones/provincias/ciudades','RegionController@index')->name('regiones');
Route::get('/imagen/proveedor','ProveedorController@image')->name('imagen.return');

Route::get('/provincias/{region}','ProvinciaController@provinciasByRegion')->name('provincias');
Route::get('/ciudades/{provincia}','CiudadController@CiudadesByProvincia')->name('ciudades');


//fin json

/*====  RUTAS DE PROVEEDOR   */


Auth::routes();

Route::post('sama','Auth\LoginController@login')->name('sama');
Route::get('/logout', '\App\Http\Controllers\Auth\LoginController@logout')->name('logout');
Route::get('/tiposession','Auth\LoginController@TipoUsuario')->name('xd');

Route::patch('/telefono/update', 'ProveedorTelefonoController@update')->name('telefono.update');
Route::patch('/correo/update', 'ProveedorCorreoController@update')->name('correo.update');

Route::post('/sendmail', 'CorreoController@send')->name('send');
