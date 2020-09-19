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

Route::get('/', function () {
    return view('index');
});
Route::get('/collections/{page}', 'CollectionsController@index');
Route::get('/product/{id}', 'ProductController@index');
Route::post('/product/{id}', 'ProductController@index');
Route::post('/review', 'ProductController@review');

Route::get('/cart', 'CartController@index');
Route::post('/cart/add', 'CartController@add');
Route::get('/cart/delete', 'CartController@delete');
Route::post('/cart/delete', 'CartController@delete');
Route::get('/cart/update', 'CartController@update');
Route::post('/cart/update', 'CartController@update');


Route::get('/account', 'AccountController@index');
Route::get('/account/sign', 'AccountController@sign');
Route::get('/account/login', 'AccountController@index');
Route::get('/account/logout', 'AccountController@logout');

Route::get('admin', 'AdminController@index');
Route::get('admin/add', 'AdminController@add');
Route::post('admin/add', 'AdminController@add');
Route::get('admin/edit', 'AdminController@edit');
Route::post('admin/edit', 'AdminController@edit');
Route::post('admin/getEditProduct', 'AdminController@getEditProduct');
Route::post('admin/deleteProduct', 'AdminController@deleteProduct');
