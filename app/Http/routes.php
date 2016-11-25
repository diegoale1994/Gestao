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
Route::post('admin/reserva/store2',['as'=>'admin.reserva.store2', 'uses'=>'ReservaController@store2']);
Route::get('admin/desreserva/{hora_inicio}/{fecha}/{id_clase}/{uri_anterior}',"ReservaController@desreserva_clase");
Route::get('admin/reserva/{aula}/{hora_inicio}/{fecha}/{uri_anterior}',"ReservaController@reserva_clase");
Route::get('admin/peticion/{fecha}',"PeticionController@irAHorario");
Route::get('admin/peticion/{fecha}/{id_clase}',"PeticionController@eliminarPeticion");
Route::get('admin',"DatasheetController@index");
Route::get('admin/datasheet/{tipo_mostrar?}/{dia_semana?}/{no_sala?}/{no_semana?}',"DatasheetController@index");
Route::get('/',"FrontController@index");
Route::get('admin/algoritmo/make_algoritmo','AlgoritmoController@algorithm_operation');
Route::get('admin/opciones/deleteAsignacion','OpcionesGeneralesController@deleteAsignacion');
Route::get('admin/opciones/deleteDatasheet','OpcionesGeneralesController@deleteDatasheet');

Route::get('lang/{lang}', ['as'=>'lang.switch', 'uses'=>'LanguageController@switchLang']);
Route::get('admin/clase/{clase}/createocurrence',['as'=>'admin.clase.createocurrence', 'uses'=>'ClaseController@createOcurrence']);
Route::post('admin/clase/createocurrence',['as'=>'admin.clase.storeocurrence', 'uses'=>'ClaseController@storeOcurrence']);
Route::get('admin/clase/{clase}/desvinculardocente',['as'=>'admin.clase.desvinculardocente', 'uses'=>'ClaseController@desvincularDocente']);
Route::Resource('admin/aula',"AulaController");
Route::Resource('admin/clase',"ClaseController");
Route::Resource('admin/reserva',"ReservaController");
Route::Resource('admin/perfil',"PerfilController");
Route::Resource('admin/profesores',"ProfesorController");
Route::Resource('admin/peticion',"PeticionController");
Route::get('admin/profesores/aprobar/{id}',"ProfesorController@aprobar");
Route::Resource('admin/opciones',"OpcionesGeneralesController");
Route::Resource('login',"LoginController");
Route::Resource('logout',"LoginController@logout");
Route::Resource('admin/algoritmo',"AlgoritmoController");
Route::get('admin/algoritmo/{algoritmo}/delete_aula', ['as'=>'admin.algoritmo.delete_aula', 'uses'=>'AlgoritmoController@delete_aula']);
Route::post('mobile/m_login',['as'=>'mobile.m_login', 'uses'=>'MobileController@login']);

Route::post('admin/algoritmo/algorithm_step1',['as'=>'admin.algoritmo.algorithm_step1', 'uses'=>'AlgoritmoController@algorithm_step1']);