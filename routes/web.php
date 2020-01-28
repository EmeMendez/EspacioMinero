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

// Route::get('/', function () {
//     return view('home');
// });
Route::view('/','home')->name("home");
Route::view('/acerca-de','about')->name("about");
Route::view('/typography','typography')->name('typo');
Route::view('/contacto','contact')->name('contact');

Route::view('/iniciar-sesion','session')->name('session');