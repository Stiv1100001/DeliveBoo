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
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::middleware('auth')->name('admin.')->prefix('admin')->group(function () {
    Route::resource('/dish', 'DishesController');

    Route::get('/order', 'OrdersController@index')->name('order.index');
    Route::get('/order/{id}', 'OrdersController@show')->name('order.show');
    Route::delete('/order/{id}', 'OrdersController@destroy')->name('order.destroy');
});
