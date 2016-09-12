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
Route::get('admin',"FrontController@admin");
Route::get('admin/datasheet',"FrontController@admin");
Route::get('/',"FrontController@index");
Route::get('lang/{lang}', ['as'=>'lang.switch', 'uses'=>'LanguageController@switchLang']);
Route::get('admin/clase/{clase}/createocurrence',['as'=>'admin.clase.createocurrence', 'uses'=>'ClaseController@createOcurrence']);
Route::post('admin/clase/createocurrence',['as'=>'admin.clase.storeocurrence', 'uses'=>'ClaseController@storeOcurrence']);
Route::Resource('admin/aula',"AulaController");
Route::Resource('admin/clase',"ClaseController");
Route::Resource('admin/perfil',"PerfilController");
Route::Resource('login',"LoginController");
Route::Resource('logout',"LoginController@logout");


