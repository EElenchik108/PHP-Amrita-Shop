<?php

use Illuminate\Support\Facades\Route;

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

Route::get('/', 'MainController@index');
Route::get('contacts', 'MainController@contacts');
Route::get('/category/{slug}', 'MainController@category');
Route::get('/product/{slug}', 'MainController@product');
Route::post('/product/{slug}', 'MainController@getReview');
Route::get('cabinet', 'MainController@cabinet');
Route::get('cabinet/bought', 'MainController@bought');
Route::get('shop', 'MainController@shop');
Route::get('about', 'MainController@about');
Route::get('journal', 'MainController@journal');
Route::get('search', 'MainController@search');

Route::post('/cart/add', 'CartController@add');
Route::post('/cart/remove', 'CartController@remove');
Route::post('/cart/clear', 'CartController@clear');
Route::get('/checkout', 'CartController@checkout');
// Route::post('/checkout/delete', 'CartController@deleteCheckout');
Route::get('/end-checkout', 'CartController@endCheckout');

Route::post('/like/add', 'LikeController@add');
Route::post('/like/dell', 'LikeController@dell');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

// Route::get('/admin', 'Admin\AdminController@index')->middleware('auth');

Auth::routes();
Route::group([
	'prefix' 		=> '/admin',
	'namespace' 	=> 'Admin',
	//'middleware' 	=> ['auth', 'admin']
], function(){
		Route::get('/', 'AdminController@index');
		Route::resource('/category', 'CategoryController');
		Route::resource('/product', 'ProductController');
		Route::resource('/article', 'ArticleController');
	});

