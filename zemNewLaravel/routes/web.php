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

Route::get('/', ['uses' => 'Controller@homepage']);
// Route::get('/cadastro', ['uses' => 'DashBoardController@cadastro']);

//auto routes
Route::get('/login', ['uses' => 'Controller@fazerLogin']);
Route::post('/login', ['as' => 'user.login', 'uses' => 'DashBoardController@auth']);

//dashboard
Route::get('/bashboard', ['as' => 'user.dashboard', 'uses' => 'DashBoardController@index']);

//cadastro de concorrentes
Route::get('/cadastro', ['as' => 'cad.cadastro', 'uses' => 'DashBoardController@cadastro']);
// Route::post('/cadastrar', ['as' => 'cadastrar.create', 'uses' => 'Controller@cadastrar']);
Route::resource('cadastrar', 'ServicesController');
