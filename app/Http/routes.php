<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::auth();

Route::get('/home', 'HomeController@index');
Route::get('/reportar','HomeController@report');

//middleware para un grupo de rutas
Route::group(['middleware' => 'admin','namespace'=>'Admin'], function(){
	//Route::get('/usuarios','Admin\UserController@index');
	//esto se pondria caso que no este arriba el namespace
	Route::get('/usuarios','UserController@index');
	Route::get('/proyectos','ProjectController@index');
	Route::get('/config','ConfigController@index');
});
