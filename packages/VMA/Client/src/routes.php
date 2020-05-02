<?php
Route::get('/test', function () {
    return view('client::contact');
});

#home
Route::get('/client/home', 'VMA\Client\Controllers\Home\HomeController@index')->name('client.home');

#product
Route::get('/client/product', 'VMA\Client\Controllers\Product\ProductController@index')->name('client.product');
Route::get('/client/product/category/{id}', 'VMA\Client\Controllers\Product\ProductCategoryController@product_category');

#post
Route::get('/client/post', 'VMA\Client\Controllers\New\PostController@index')->name('client.post');

#about us
Route::get('/client/about_us', 'VMA\Client\Controllers\AboutUsController@index')->name('client.about_us');

#contact
Route::get('/client/contact', 'VMA\Client\Controllers\ContactController@index')->name('client.contact');
Route::post('/client/contact', 'VMA\Client\Controllers\ContactController@store');

###ajax
Route::post('/client/check_menu_category', 'VMA\Client\Controllers\AjaxController@check_menu_category')->name('check.category.ajax');
