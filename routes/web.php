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


Route::get('/categories','CategoryController@index');
Route::get('/categories/add','CategoryController@add');
Route::post('/categories','CategoryController@store');
Route::get('/categories/{category}/edit', 'CategoryController@edit');
Route::put('/categories/{category}', 'CategoryController@update');
Route::delete('/categories/{category}', 'CategoryController@destroy');

Route::get('/products','ProductController@index');
Route::get('/products/add','ProductController@add');
Route::post('/products','ProductController@store');
Route::get('/products/{product}/edit','ProductController@edit');
Route::put('/products/{product}','ProductController@update');
Route::delete('/products/{product}','ProductController@destroy');
Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::get('/categories/{category}', 'CategoryController@category');

Route::post('/products/search','ProductController@search');
Route::post('/categories/search','CategoryController@search');

Route::get('/tags','TagController@index');
Route::get('/tags/add','TagController@add');
Route::post('/tags','TagController@store');
Route::get('/tags/{tag}/edit', 'TagController@edit');
Route::put('/tags/{tag}','TagController@update');
Route::delete('/tags/{tag}','TagController@destroy');

Route::get('/tags/{tag}', 'TagController@filter');





