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

// Route::get('/', function () {
//     return view('welcome');
// });

Route::get('/', 'FrontController@index');
Route::get('/termurah', 'FrontController@ascending');
Route::get('/termahal', 'FrontController@descending');

Route::group(['middleware' => 'admin'], function(){
	Route::get('/admin', 'AdminController@dashboard');
	Route::get('/admin/list', 'AdminController@list');
	Route::resource('/admin/product', 'ProductController');	
});

Auth::routes();

Route::get('/home', 'HomeController@index');
Route::get('/cart/{{$id}}', 'FrontController@getAddtoCart');
