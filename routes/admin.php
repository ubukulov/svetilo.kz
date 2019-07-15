<?php
# Login
Route::get('/admin/login', 'Admin\AuthController@login')->name('admin.login');
Route::post('/admin/login', 'Admin\AuthController@authenticate')->name('admin.authenticate');

Route::group(['namespace' => 'Admin', 'prefix' => 'admin', 'middleware' => ['web', 'admin']], function() {
    Route::get('/', 'AdminController@dashboard');
    Route::get('/dashboard', 'AdminController@dashboard')->name('admin.dashboard');
    Route::get('/category', 'CategoryController@index')->name('admin.category.index');
    Route::get('/category/create', 'CategoryController@create')->name('admin.category.create');
    Route::post('/category/store', 'CategoryController@store')->name('admin.category.store');
    Route::get('/category/{id}/edit', 'CategoryController@edit')->name('admin.category.edit');
    Route::get('/category/{id}/destroy', 'CategoryController@destroy')->name('admin.category.destroy');
    Route::post('/category/{id}/update', 'CategoryController@update')->name('admin.category.update');

    # Pages
    Route::get('/pages', 'PageController@index')->name('admin.page.index');
    Route::get('/page/create', 'PageController@create')->name('admin.page.create');
    Route::post('/page/store', 'PageController@store')->name('admin.page.store');
    Route::get('/page/{id}/edit', 'PageController@edit')->name('admin.page.edit');
    Route::post('/page/{id}/update', 'PageController@update')->name('admin.page.update');
    Route::get('/page/{id}/destroy', 'PageController@destroy')->name('admin.page.destroy');

    # Products
    Route::get('/products', 'ProductController@index')->name('admin.product.index');
    Route::get('/products/create', 'ProductController@create')->name('admin.product.create');
    Route::post('/products', 'ProductController@store')->name('admin.product.store');
    Route::get('/products/{product}/edit', 'ProductController@edit')->name('admin.product.edit');
    Route::post('/products/{product}', 'ProductController@update')->name('admin.product.update');
    Route::get('/products/{product}/destroy', 'ProductController@destroy')->name('admin.product.destroy');

    # Orders
    Route::get('/orders', 'OrderController@index')->name('admin.order.index');
});
