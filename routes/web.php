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
//    return view('welcome');
});

Auth::routes();

Route::get('/', 'CekController@index');

Route::get('libur',             'MasterParameterController@libur');

Route::match(['get', 'post'],   'MasterParameterJqgrid',	'MasterParameterCrudController@jqgrid');
Route::match(['get', 'post'],   'MasterParameterSave',		'MasterParameterCrudController@save');


Route::get('/home', 'HomeController@index')->name('home');
