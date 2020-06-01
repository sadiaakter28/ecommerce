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
//Cart
Route::group(['prefix' => 'carts', 'namespace' => 'API'], function () {
    Route::get('/', 'CartsController@index')->name('carts');
    Route::post('/store', 'CartsController@store')->name('carts.store');
    Route::post('/update/{id}', 'CartsController@update')->name('carts.update');
    Route::post('/delete/{id}', 'CartsController@delete')->name('carts.delete');
});
