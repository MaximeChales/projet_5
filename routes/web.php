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

Route::get('/', [
    'uses' =>'HomeController@index',
    'as' => 'home'
]);


Route::get('/admin', [
    'uses' =>'AdminController@index',
    'as' => 'indexadmin'
]);

Route::get('/admin/user', [
    'uses' =>'UserController@index',
    'as' => 'useradmin'
]);

Route::post('/admin/user', [
    'uses' =>'UserController@update',
    'as' => 'useradmin'
]);


Route::get('/admin/projets', [
    'uses' =>'ProjetsController@index',
    'as' => 'projetsadmin'
]);


Route::get('/admin/experiences', [
    'uses' =>'ExperiencesController@index',
    'as' => 'experiencesadmin'
]);


Route::get('/admin/formations', [
    'uses' =>'FormationsController@index',
    'as' => 'formationsadmin'
]);