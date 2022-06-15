<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

// % Api restaurants
Route::get('/restaurant', 'Api\RestaurantController@index')->name('api.restaurant.index');
Route::get('/restaurant/{id}', 'Api\RestaurantController@show')->name('api.restaurant.show');

// % Api dishes
Route::get('/dishes', 'Api\DishController@index')->name('api.dish.index');
Route::get('/dish/{id}', 'Api\DishController@show')->name('api.dish.show');

// % Api orders
Route::post('/order', 'Api\OrderController@store')->name('api.order.store');
Route::get('/order/{id}', 'Api\OrderController@show')->name('api.order.show');
