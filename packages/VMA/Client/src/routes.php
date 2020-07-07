<?php
Route::get('/test', function () {
    return view('welcome');
});

#home
Route::get('/client/home', 'VMA\Client\Controllers\Home\HomeController@index')->name('client.home');
Route::get('/chatbot/endpoint',function (){
    return view('endpoint');
});

#product
Route::any('/client/product/category/all', 'VMA\Client\Controllers\Product\ProductController@index')->name('client.product');
Route::any('/client/product/category/{id}', 'VMA\Client\Controllers\Product\ProductCategoryController@product_category');
Route::any('/client/product/{id}', 'VMA\Client\Controllers\Product\ProductController@detail');

#post
Route::any('/client/post', 'VMA\Client\Controllers\Post\PostController@index')->name('client.post');
Route::any('/client/post/{id}', 'VMA\Client\Controllers\Post\PostController@detail')->name('client.post');

#about us
Route::get('/client/about_us', 'VMA\Client\Controllers\AboutUsController@index')->name('client.about_us');

#contact
Route::get('/client/contact', 'VMA\Client\Controllers\ContactController@index')->name('client.contact');
Route::post('/client/contact', 'VMA\Client\Controllers\ContactController@store');

#chatbot
//Route::get('/test', 'BotManController@tinker');

###ajax
Route::post('/client/check_menu_category', 'VMA\Client\Controllers\AjaxController@check_menu_category')->name('check.category.ajax');

###multiple language
Route::group(['middleware' => 'local'], function() {
    Route::get('change-language/{language}', 'VMA\Client\Controllers\Home\HomeController@changeLanguage')
        ->name('user.change-language');
});