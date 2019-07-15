<?php

Route::group(['namespace' => 'Admin', 'prefix' => 'admin'], function() {
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
    Route::resource('products', 'ProductController')->names([
        'index' => 'admin.product.index',
        'create' => 'admin.product.create',
        'store' => 'admin.product.store',
        'edit' => 'admin.product.edit',
        'update' => 'admin.product.update',
        'destroy' => 'admin.product.destroy',
        'show' => 'admin.product.show',
    ]);
});
