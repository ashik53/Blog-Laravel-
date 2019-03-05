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

/* 

	I will put all the routes into "web" middleware


*/

Route::group(['middleware' => ['web']],  function (){

	Route::get('contact', 'PagesController@getContact');
	Route::get('about', 'PagesController@getAbout');
	Route::get('/', 'PagesController@getIndex');

	//This is a resource router includes all resource methods in the controller
	Route::resource('posts', 'PostController');

});



