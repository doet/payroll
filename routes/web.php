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

Route::get('mparameter',        'MasterParameterController@mparameter');
Route::get('derectorat',        'SubMasterParameterController@derectorat');
Route::get('divisi',            'SubMasterParameterController@divisi');
Route::get('departement',			  'SubMasterParameterController@departement');
Route::get('costofsales',			  'SubMasterParameterController@costofsales');
Route::get('title',             'SubMasterParameterController@title');
Route::get('grade',             'SubMasterParameterController@grade');
Route::get('level',             'SubMasterParameterController@level');

Route::get('libur',             'MasterParameterController@libur');

Route::match(['get', 'post'],   'MasterParameterJqgrid',	'MasterParameterCrudController@jqgrid');
Route::match(['get', 'post'],   'MasterParameterSave',		'MasterParameterCrudController@save');

Route::get('mkaryawan',         'DataKaryawanController@mkaryawan');
Route::get('detail/{e}',        'DataKaryawanController@detail');
Route::get('datapegawai/{e}',	  'SubDataKaryawanController@datapegawai');
Route::get('datagaji/{e}',		  'SubDataKaryawanController@datagaji');
Route::get('datakeluarga/{e}',  'SubDataKaryawanController@datakeluarga');
Route::get('datatraining/{e}',  'SubDataKaryawanController@datatraining');
Route::get('rekampembinaan/{e}','SubDataKaryawanController@rekampembinaan');
Route::get('rekamgaji/{e}',     'SubDataKaryawanController@rekamgaji');
Route::get('rekamperubahan/{e}','SubDataKaryawanController@rekamperubahan');

Route::match(['get', 'post'],   'DataKaryawanJqgrid',		'DataKaryawanCrudController@jqgrid');
Route::match(['get', 'post'],   'DataKaryawanSave',			'DataKaryawanCrudController@save');
Route::match(['get', 'post'],   'DataKaryawanJson',			'DataKaryawanCrudController@json');

Route::get('file',              'AttController@file');
Route::get('absenhkot',					'AttController@absenhkot');

Route::match(['get', 'post'],   'AttJson',					'AttCrudController@json');
Route::match(['get', 'post'],   'AttSave',					'AttCrudController@save');

Route::get('uploadfiles',      'FilesController@files');

Route::match(['get', 'post'],   'FilesJson',					'FilesCrudController@json');
Route::match(['get', 'post'],   'FilesSave',					'FilesCrudController@save');


Route::get('Rekap Upah',             'PayrollController@rupah');

Route::match(['get', 'post'],   'PayrollJqgrid',			'PayrollCrudController@jqgrid');
Route::match(['get', 'post'],   'PayrollSave',				'PayrollCrudController@save');
Route::match(['get', 'post'],   'PayrollJson',				'PayrollCrudController@json');


Route::match(['get', 'post'], 	'PDF_Payroll', 				'PdfPayrollController@PDFMarker');

Route::get('test',							'MasterParameterController@test');


Route::get('/home', 'HomeController@index')->name('home');
