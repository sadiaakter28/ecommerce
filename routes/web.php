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

    Route::get('/registration', 'RegistrationController@showRegistrationForm')->name('showRegistrationForm');
    Route::post('/registration', 'RegistrationController@registration')->name('registration');

    Route::get('/login', 'LoginController@showLoginForm')->name('showLoginForm');
    Route::post('/login', 'LoginController@login')->name('login');

    Route::get('/logout', 'LoginController@logout')->name('logout');

    Route::get('/verify/{token}', 'Frontend\LoginController@verifyEmail')->name('verify');
    //ForgotPassword
    Route::post('/password/email', 'PasswordRestController@sendResetLinkEmail')->name('password.email'); //reset.email
    Route::get('/password/reset', 'PasswordRestController@showLinkRequestForm')->name('password.request');
    Route::get('/password/reset/{token}', 'PasswordRestController@showResetForm')->name('password.reset');//reset.token
    Route::post('/password/reset', 'PasswordRestController@reset')->name('password.update');//reset

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

    //Division
    Route::group(['prefix'=>'divisions'], function (){
        Route::get('/', 'DivisionController@index')->name('admin.divisions');
        Route::get('/create', 'DivisionController@create')->name('admin.divisions.create');
        Route::post('/store', 'DivisionController@store')->name('admin.divisions.store');
        Route::get('/edit/{id}', 'DivisionController@edit')->name('admin.divisions.edit');
        Route::post('/update/{id}', 'DivisionController@update')->name('admin.divisions.update');
        Route::post('/delete/{id}', 'DivisionController@delete')->name('admin.divisions.delete');
    });

    //Districts
    Route::group(['prefix'=>'districts'], function (){
        Route::get('/', 'DistrictController@index')->name('admin.districts');
        Route::get('/create', 'DistrictController@create')->name('admin.districts.create');
        Route::post('/store', 'DistrictController@store')->name('admin.districts.store');
        Route::get('/edit/{id}', 'DistrictController@edit')->name('admin.districts.edit');
        Route::post('/update/{id}', 'DistrictController@update')->name('admin.districts.update');
        Route::post('/delete/{id}', 'DistrictController@delete')->name('admin.districts.delete');
    });
});
//-------------------Backend End------------------//
