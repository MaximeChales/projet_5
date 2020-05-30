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

 // Section CV
Route::get('/', [
    'uses' => 'HomeController@index',
    'as' => 'home',
]);

//Accueil Admin
Route::get('/admin', [
    'uses' => 'AdminController@index',
    'as' => 'indexadmin',
]);

// Gestion infos user 
Route::get('/admin/user', [
    'uses' => 'UserController@index',
    'as' => 'useradmin',
]);

Route::post('/admin/user', [
    'uses' => 'UserController@update',
    'as' => 'useradmin',
]);


Route::delete('/admin/centres_interets/delete_ci/',
    'CentresInteretController@delete_ci');

Route::delete('/admin/contact/delete/',
    'ContactController@delete');

 //Gestion partie projets   

Route::get('/admin/projets', [
    'uses' => 'ProjetsController@index',
    'as' => 'projetsadmin',
]);

Route::post('/admin/projets', [
    'uses' => 'ProjetsController@update',
    'as' => 'projetsadmin',
]);

Route::delete('/admin/projets/delete/',
    'ProjetsController@delete');


//Gestion partie experience    
Route::get('/admin/experiences', [
    'uses' => 'ExperiencesController@index',
    'as' => 'experiencesadmin',
]);

Route::post('/admin/experiences', [
    'uses' => 'ExperiencesController@update',
    'as' => 'experiencesadmin',
]);

Route::delete('/admin/experiences/delete/',
    'ExperiencesController@delete');

 //Gestion partie Formations   
Route::get('/admin/formations', [
    'uses' => 'FormationsController@index',
    'as' => 'formationsadmin',
]);

Route::post('/admin/formations', [
    'uses' => 'FormationsController@update',
    'as' => 'formationsadmin',
]);

Route::delete('/admin/formations/delete/',
    'FormationsController@delete');


Route::get('/home', 'HomeController@index')->name('home');

//Appel de la fonction logout dans le loginController
Route::get('logout', '\App\Http\Controllers\Auth\LoginController@logout');

//Compile toutes les routes de la partie connexion (login register, password reset...)
Auth::routes();


