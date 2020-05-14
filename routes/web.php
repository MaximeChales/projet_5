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

Route::post('upadate-avatar', [
    'uses' =>'UserController@update_avatar',
    'as' => 'useradmin'
]);




Route::get('/admin/projets', [
    'uses' =>'ProjetsController@index',
    'as' => 'projetsadmin'
]);

Route::post('/admin/projets', [
    'uses' =>'ProjetsController@update',
    'as' => 'projetsadmin'
]);

Route::delete('/admin/projets/{id}/delete', 
'ProjetsController@delete');


Route::get('/admin/experiences', [
    'uses' =>'ExperiencesController@index',
    'as' => 'experiencesadmin'
]);

Route::post('/admin/experiences', [
    'uses' =>'ExperiencesController@update',
    'as' => 'experiencesadmin'
]);

Route::delete('/admin/experiences/delete/', 
'ExperiencesController@delete');


Route::get('/admin/formations', [
    'uses' =>'FormationsController@index',
    'as' => 'formationsadmin'
]);

Route::post('/admin/formations', [
    'uses' =>'FormationsController@update',
    'as' => 'formationsadmin'
]);

Route::delete('/admin/formations/projets/delete/{id}', 
'FormationsController@delete');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
