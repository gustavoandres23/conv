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

Route::get('/home', 'HomeController@index');

Route::get('/PresupuestoGlobal', 'ResPresupuestoGlobalController@index');
Route::post('/PresupuestoGlobal', 'ResPresupuestoGlobalController@postRes');

Route::get('/ResTecnica','ResTecnicaController@index');
Route::post('/ResTecnica','ResTecnicaController@postRes');

Route::get('/ResRecursos','ResRecursosController@index');
Route::post('/ResRecursos','ResRecursosController@postRes');

Route::get('/ResConvenio','ResConvenioController@index');
Route::post('/ResConvenio','ResConvenioController@postRes');

Route::get('/DisRecursos','DisRecursosController@index');
Route::post('/DisRecursos','DisRecursosController@postDis');
Route::post('/DisRecursosCom/{cod_programa}','DisRecursosController@postDisCom');

Route::get('/newPrograma', 'ProgramasController@index');
Route::post('/newPrograma', 'ProgramasController@store');

Route::get('/table','test@index');

Route::get('/pdf/{id}','test@show');

Route::post('/test','test@store');