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

Route::get('/', 'IndexController@welcome')->name('home');
Route::get('/catalog/{alias}', 'CatalogController@index')->name('catalog.view');
Route::get('/page/{alias}', 'PageController@show')->name('page.view');
Route::get('/{alias}/{id}', 'ProductController@index')->name('product.index');
Route::get('/login', 'AuthController@showLogin')->name('login');
Route::post('/login', 'AuthController@authenticate')->name('authenticate');
Route::get('/register', 'AuthController@showRegister')->name('register');
Route::post('/register', 'AuthController@registration')->name('registration');
Route::get('/logout', function (){
    \Auth::logout();
    return back();
});
// UserCart
Route::group(['prefix' => 'cart'], function() {
    Route::get('/', 'CartController@index')->name('cart.index');
    Route::get('add/{product_id}', 'CartController@addToCart')->name('cart.add');
    Route::get('add/{product_id}/return', 'CartController@addToCart2')->name('cart.add2');
    Route::post('add', 'CartController@add')->name('cart.add2');
    Route::get('/delete/{product_id}', 'CartController@delete')->name('cart.delete');
});

// Checkout
Route::group(['prefix' => 'checkout'], function(){
    Route::get('/', 'CheckoutController@index')->name('checkout.index');
    Route::post('/store', 'CheckoutController@store')->name('checkout.store');
});

// Search
Route::post('/search', 'SearchController@index')->name('search');
