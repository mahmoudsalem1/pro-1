<?php

// Home
Route::get('/home', 'HomeController@index')->name('home');
Route::get('/', 'HomeController@index')->name('site.home');

// Const
Route::get('/thanks-page', 'ContactController@thanks')->name('site.thanks');



// Contact
Route::get('/contact-us', 'ContactController@showContact')->name('site.contact.show');
Route::post('/contact-us', 'ContactController@sendContact')->name('site.contact.send');

// Products
Route::get('/products', 'ProductController@getProducts')->name('site.products.show');
Route::get('/categories/products', 'ProductController@getByCategories')->name('site.products.categories');
Route::get('/products/{slug}', 'ProductController@getProduct')->name('site.products.single');
Route::get('/cat/{slug}', 'ProductController@getProductByCategory')->name('site.products.category');

Route::get('/search', 'ProductController@search')->name('site.products.search');


// Pages [ Must be at the end of the routes ]
Route::get('{slug}', 'PageController@index')->name('site.page')->where('slug','.+');