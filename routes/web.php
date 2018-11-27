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

Route::get('/home', 'HomeController@index')->name('home');
Route::post('/home', 'HomeController@user_create_contact')->name('home.createcont');
Route::delete('/home/{idcon}', 'HomeController@user_destroy_contact')->name('home.deletecon');
Route::get('/home/{idcon}', 'HomeController@user_edit_contact')->name('home.updatecont');
Route::post('/home/{idcon}', 'HomeController@user_update_contact')->name('home.updatecontpost');


Route::prefix('admin')->group(function(){

	//Rutas logueo Admin
	Route::get('/login', 'Auth\AdminLoginController@showLoginForm')->name('admin.login');
	Route::post('/login', 'Auth\AdminLoginController@login')->name('admin.login.submit');
	Route::get('/', 'AdminController@index')->name('admin.dashboard');
	Route::post('/', 'AdminController@admin_create_user')->name('admin.dashboard.postuser');
	//Vista para editar usuarios
	Route::get('/{iduser}', 'AdminController@admin_edit_user')->name('admin.dashboard.updateuser');
	//Eliminar usuario
	Route::delete('/{iduser}', 'AdminController@admin_destroy_user')->name('admin.dashboard.destroyuser');
	//Función que actualiza los usuarios
	Route::post('/{iduser}', 'AdminController@admin_update_user')->name('admin.dashboard.updateuserpost');
});
