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
//-------------------Frontend Start------------------//
Route::group(['prefix'=>'', 'namespace' => 'Frontend'], function (){

    //Home
    Route::get('/', 'HomeController@home')->name('home');

    //Search
    Route::get('/search/', 'SearchController@search')->name('search');

    //Contact
    Route::get('/contact', 'ContactController@contacts')->name('contact');

    //Product
    Route::group(['prefix'=>'products'], function (){
        Route::get('/', 'ProductController@index')->name('products.index');
        //Route::get('/show/{slug}', 'ProductController@show')->name('products.show');
        Route::get('/show/{id}', 'ProductController@show')->name('products.show');

    });
    //Category
    Route::group(['prefix'=>'categories'], function (){
        Route::get('/', 'CategoryController@index')->name('categories.index');
        Route::get('/show/{id}', 'CategoryController@show')->name('categories.show');

    });
});
//-------------------Frontend End------------------//

//-------------------Backend Start------------------//
Route::group(['prefix'=>'admin', 'namespace' => 'Backend'], function (){
    //home
    Route::get('/', 'HomeController@index')->name('admin.index');

    //product
    Route::group(['prefix'=>'products'], function (){
        Route::get('/', 'ProductController@index')->name('admin.products');
        Route::get('/create', 'ProductController@create')->name('admin.products.create');
        Route::post('/store', 'ProductController@store')->name('admin.products.store');
        Route::get('/edit/{id}', 'ProductController@edit')->name('admin.products.edit');
        Route::post('/update/{id}', 'ProductController@update')->name('admin.products.update');
        Route::post('/delete/{id}', 'ProductController@delete')->name('admin.products.delete');
    });

    //categories
    Route::group(['prefix'=>'categories'], function (){
        Route::get('/', 'CategoryController@index')->name('admin.categories');
        Route::get('/create', 'CategoryController@create')->name('admin.categories.create');
        Route::post('/store', 'CategoryController@store')->name('admin.categories.store');
        Route::get('/edit/{id}', 'CategoryController@edit')->name('admin.categories.edit');
        Route::post('/update/{id}', 'CategoryController@update')->name('admin.categories.update');
        Route::post('/delete/{id}', 'CategoryController@delete')->name('admin.categories.delete');
    });

    //Brands
    Route::group(['prefix'=>'brands'], function (){
        Route::get('/', 'BrandController@index')->name('admin.brands');
        Route::get('/create', 'BrandController@create')->name('admin.brands.create');
        Route::post('/store', 'BrandController@store')->name('admin.brands.store');
        Route::get('/edit/{id}', 'BrandController@edit')->name('admin.brands.edit');
        Route::post('/update/{id}', 'BrandController@update')->name('admin.brands.update');
        Route::post('/delete/{id}', 'BrandController@delete')->name('admin.brands.delete');
    });
});
//-------------------Backend End------------------//
