<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\Orders\OrderController;
use App\Http\Controllers\Api\DishController;

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
Route::post('/restaurant/search', 'Api\RestaurantController@search')->name('api.restaurant.search');

// % Api types
Route::get('/types', 'Api\TypeController@index')->name('api.types');

// % Api dishes
Route::get('/dishes/{user_id}', 'Api\DishController@index')->name('api.dish');

// % Api orders
Route::post('/order', 'Api\OrderController@store')->name('api.order.store');
Route::get('/order/{id}', 'Api\OrderController@show')->name('api.order.show');
Route::get('/orders/generate', 'Api\OrderController@generate');
Route::post('/orders/payments', 'Api\OrderController@payments');
