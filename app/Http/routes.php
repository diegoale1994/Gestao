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

Route::get('admin/desreserva/{hora_inicio}/{fecha}/{id_clase}/{uri_anterior}',"ReservaController@desreserva_clase");
Route::get('admin/reserva/{aula}/{hora_inicio}/{fecha}',"ReservaController@reserva_clase");
Route::get('admin',"DatasheetController@index");
Route::get('admin/datasheet/{tipo_mostrar?}/{dia_semana?}/{no_sala?}/{no_semana?}',"DatasheetController@index");
Route::get('/',"FrontController@index");
Route::get('admin/algoritmo/make_algoritmo','AlgoritmoController@algorithm_operation');
Route::get('lang/{lang}', ['as'=>'lang.switch', 'uses'=>'LanguageController@switchLang']);
Route::get('admin/clase/{clase}/createocurrence',['as'=>'admin.clase.createocurrence', 'uses'=>'ClaseController@createOcurrence']);
Route::post('admin/clase/createocurrence',['as'=>'admin.clase.storeocurrence', 'uses'=>'ClaseController@storeOcurrence']);
Route::Resource('admin/aula',"AulaController");
Route::Resource('admin/clase',"ClaseController");
Route::Resource('admin/perfil',"PerfilController");
Route::Resource('admin/opciones',"OpcionesGeneralesController");
Route::Resource('login',"LoginController");
Route::Resource('logout',"LoginController@logout");
Route::Resource('admin/algoritmo',"AlgoritmoController");
Route::get('admin/algoritmo/{algoritmo}/delete_aula', ['as'=>'admin.algoritmo.delete_aula', 'uses'=>'AlgoritmoController@delete_aula']);


Route::post('admin/algoritmo/algorithm_step1',['as'=>'admin.algoritmo.algorithm_step1', 'uses'=>'AlgoritmoController@algorithm_step1']);