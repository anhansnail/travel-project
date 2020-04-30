<?php
Route::get('/test', function () {
    return view('client::product');
});

Route::get('/client/home', 'VMA\Client\Controllers\Home\HomeController@index')->name('client.home');

Route::get('/client/product', 'VMA\Client\Controllers\Product\ProductController@index')->name('client.product');
Route::get('/client/product/category/{id}', 'VMA\Client\Controllers\Product\ProductController@index');


Route::get('/client/post', 'VMA\Client\Controllers\New\PostController@index')->name('client.post');


#ajax
Route::post('/client/check_menu_category', 'VMA\Client\Controllers\AjaxController@check_menu_category')->name('check.category.ajax');
