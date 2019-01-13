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

Route::get('/reportar','HomeController@getReport');
Route::post('/reportar','HomeController@postReport');

//middleware para un grupo de rutas
Route::group(['middleware' => 'admin','namespace'=>'Admin'], function(){
	//Route::get('/usuarios','Admin\UserController@index');
	//esto se pondria caso que no este arriba el namespace
	Route::get('/usuarios','UserController@index');
	Route::post('/usuarios','UserController@store');

	Route::get('/usuario/{id}','UserController@edit');
	Route::post('/usuario/{id}','UserController@update');
	Route::get('/usuario/{id}/eliminar','UserController@delete');
	
	// projects
	Route::get('/proyectos','ProjectController@index');
	Route::post('/proyectos','ProjectController@store');

	Route::get('/proyecto/{id}','ProjectController@edit');
	Route::post('/proyecto/{id}','ProjectController@update');
	Route::get('/proyecto/{id}/eliminar','ProjectController@delete');
	Route::get('/proyecto/{id}/restaurar','ProjectController@restore');

	//categories
	Route::post('/categorias','CategoryController@store');	
	Route::post('/categoria/editar','CategoryController@update');	
	Route::get('/categoria/{id}/eliminar','CategoryController@delete');

	//niveles
	Route::post('/niveles','LevelController@store');	
	Route::post('/nivel/editar','LevelController@update');	
	Route::get('/nivel/{id}/eliminar','LevelController@delete');

	Route::get('/config','ConfigController@index');


});

//api
Route::get('/proyecto/{id}/niveles','Admin\LevelController@byProject');