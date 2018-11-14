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

Route::get('/crearUsuario',array(
    'as' => 'createUserPropietario',
    'uses' => 'UserController@createUserPropietario'
));

Route::post('/registerPropietario',array(
    'as' => 'savePropietario',
    'uses' => 'UserController@saveUserPropietario'
));

Route::get('/editarUsuario',array(
    'as' => 'editPropietario',
    'middleware' => 'auth',
    'uses' => 'UserController@editUserPropietario'
));

Route::post('/actualizarUsuario',array(
    'as' => 'updatePropietario',
    'middleware' => 'auth',
    'uses' => 'UserController@updateUserPropietario'
));

Route::get('/crearCanino',array(
    'as' => 'createCanino',
    'middleware' => 'auth',
    'uses' => 'CaninoController@createCanino'
));

Route::post('/registerCanino', array(
    'as' => 'saveCanino',
    'middleware' => 'auth',
    'uses' => 'CaninoController@saveCanino'
));
