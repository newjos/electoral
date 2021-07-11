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
    return view('auth.login');
});
Route::resource('miembros', 'miembrosController')->middleware('auth');

Auth::routes(['register'=>false,'reset'=>false]);

Route::get('/home', 'HomeController@index')->name('home')->middleware('auth');

Route::get('/home', 'HomeController@grafico')->middleware('auth');


Route::post('miembros/create/fetch', 'miembrosController@fetch')->name('miembrosController.fetch');

Route::post('miembros/edit/fetch', 'miembrosController@fetch')->name('miembrosController.fetch');

Route::post('centros/fetch', 'centrosController@fetch')->name('centrosController.fetch');

Route::resource('centros', 'centrosController')->middleware('auth');


Auth::routes();

Route::get('/home', 'HomeController@index')->name('home')->middleware('auth');





