<?php
Route::group(['middleware' => ['web', 'checkPermission']], function () {

#Quản lí sản phẩm
    Route::get('product/index', 'VMA\Admin\Controllers\Product\IndexController@index')->name('product.index');
    Route::get('product/create', 'VMA\Admin\Controllers\Product\CreateController@index')->name('product.create');
    Route::get('product/edit/{id}', 'VMA\Admin\Controllers\Product\EditController@index')->name('product.edit');
    Route::post('product/store', 'VMA\Admin\Controllers\Product\StoreController@index');
    Route::get('product/search', 'VMA\Admin\Controllers\Product\SearchController@index');
    Route::get('product/read', 'VMA\Admin\Controllers\Product\ReadController@index');
    Route::post('product/update', 'VMA\Admin\Controllers\Product\UpdateController@index');
    Route::get('product/delete/{id}', 'VMA\Admin\Controllers\Product\DeleteController@index');

    #Quản lí danh mục loại sản phẩm
    Route::get('categorie/index', 'VMA\Admin\Controllers\Categorie\IndexController@index')->name('categorie.index');
    Route::get('categorie/create', 'VMA\Admin\Controllers\Categorie\CreateController@index')->name('categorie.create');
    Route::get('categorie/edit/{id}', 'VMA\Admin\Controllers\Categorie\EditController@index')->name('categorie.edit');
    Route::post('categorie/store', 'VMA\Admin\Controllers\Categorie\StoreController@index');
    Route::get('categorie/search', 'VMA\Admin\Controllers\Categorie\SearchController@index');
    Route::get('categorie/read', 'VMA\Admin\Controllers\Categorie\ReadController@index');
    Route::post('categorie/update', 'VMA\Admin\Controllers\Categorie\UpdateController@index');
    Route::get('categorie/delete/{id}', 'VMA\Admin\Controllers\Categorie\DeleteController@index');

    #Quản lí vùng du lịch
    Route::get('zone/index', 'VMA\Admin\Controllers\Zone\IndexController@index')->name('zone.index');
    Route::get('zone/create', 'VMA\Admin\Controllers\Zone\CreateController@index')->name('zone.create');
    Route::get('zone/edit/{id}', 'VMA\Admin\Controllers\Zone\EditController@index')->name('zone.edit');
    Route::post('zone/store', 'VMA\Admin\Controllers\Zone\StoreController@index');
    Route::get('zone/search', 'VMA\Admin\Controllers\Zone\SearchController@index');
    Route::get('zone/read', 'VMA\Admin\Controllers\Zone\ReadController@index');
    Route::post('zone/update', 'VMA\Admin\Controllers\Zone\UpdateController@index');
    Route::get('zone/delete/{id}', 'VMA\Admin\Controllers\Zone\DeleteController@index');

    #Quản lí post
    Route::get('post/index', 'VMA\Admin\Controllers\Post\IndexController@index')->name('post.index');
    Route::get('post/create', 'VMA\Admin\Controllers\Post\CreateController@index')->name('post.create');
    Route::get('post/edit/{id}', 'VMA\Admin\Controllers\Post\EditController@index')->name('post.edit');
    Route::post('post/store', 'VMA\Admin\Controllers\Post\StoreController@index');
    Route::get('post/search', 'VMA\Admin\Controllers\Post\SearchController@index');
    Route::get('post/read', 'VMA\Admin\Controllers\Post\ReadController@index');
    Route::post('post/update', 'VMA\Admin\Controllers\Post\UpdateController@index');
    Route::get('post/delete/{id}', 'VMA\Admin\Controllers\Post\DeleteController@index');

    #Quản lí contact
    Route::get('contact/index', 'VMA\Admin\Controllers\Contact\IndexController@index')->name('contact.index');
    Route::get('contact/create', 'VMA\Admin\Controllers\Contact\CreateController@index')->name('contact.create');
    Route::get('contact/edit/{id}', 'VMA\Admin\Controllers\Contact\EditController@index')->name('contact.edit');
    Route::post('contact/store', 'VMA\Admin\Controllers\Contact\StoreController@index');
    Route::get('contact/search', 'VMA\Admin\Controllers\Contact\SearchController@index');
    Route::get('contact/read', 'VMA\Admin\Controllers\Contact\ReadController@index');
    Route::post('contact/update', 'VMA\Admin\Controllers\Contact\UpdateController@index');
    Route::get('contact/delete/{id}', 'VMA\Admin\Controllers\Contact\DeleteController@index');
});