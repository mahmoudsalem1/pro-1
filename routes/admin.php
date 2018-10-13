<?php
/** Ajax  **/

// Users
Route::get('/loadUsers', 'UserController@AjaxLoad')->name('admin.user.ajax');
Route::post('/users/password', 'UserController@changePass')->name('admin.changePass.ajax');

// Roles
Route::get('/loadRoles', 'RoleController@AjaxLoad')->name('admin.role.ajax');
Route::post('/role/multiDelete', 'RoleController@multiDelete')->name('admin.role.deletes');

// Contacts
Route::get('/loadContacts', 'ContactController@AjaxLoad')->name('admin.contact.ajax');
Route::post('/contact/multiDelete', 'ContactController@multiDelete')->name('admin.contact.deletes');

 // Pages
 Route::get('/loadPage', 'PageController@AjaxLoad')->name('admin.page.ajax');
 Route::get('/get/module', 'PageController@getModule')->name('admin.get.module');
 Route::post('/page/multiDelete', 'PageController@multiDelete')->name('admin.page.deletes');

 // Pages Categories
 Route::get('/loadPageCategory', 'PageCategoryController@AjaxLoad')->name('admin.page-categories.ajax');
 Route::post('/page-categories/multiDelete', 'PageCategoryController@multiDelete')->name('admin.page-categories.deletes');

 // Slider
 Route::get('/loadSliders', 'SliderController@AjaxLoad')->name('admin.slider.ajax');
 Route::post('/slider/multiDelete', 'SliderController@multiDelete')->name('admin.slider.deletes');

  // Products Categories
 Route::get('/loadProductCategory', 'ProductCategoryController@AjaxLoad')->name('admin.product-categories.ajax');
 Route::post('/product-categories/multiDelete', 'ProductCategoryController@multiDelete')->name('admin.product-categories.deletes');

 // Products
 Route::get('/loadProduct', 'ProductController@AjaxLoad')->name('admin.product.ajax');
 Route::post('/product/multiDelete', 'ProductController@multiDelete')->name('admin.product.deletes');

 // Products
 Route::get('/loadBrand', 'BrandController@AjaxLoad')->name('admin.brand.ajax');
 Route::post('/brand/multiDelete', 'BrandController@multiDelete')->name('admin.brand.deletes');

 // Menu
 Route::get('/loadContentMenus', 'MenuController@AjaxLoadContent')->name('admin.menu.content.ajax');
 Route::post('/menu/multiDelete', 'MenuController@multiDelete')->name('admin.menu.deletes');

 // SEO
 Route::get('/loadSeoPage', 'SeoController@showTagsData')->name('admin.seo.tags');


/** Http  **/

// Home
Route::get('/', 'HomeController@index')->name('admin.home');

// SEO
Route::get('/seo/tags', 'SeoController@showTagsForm')->name('admin.seo.tags.form');
Route::get('/seo/sitemap', 'SeoController@showSitemapForm')->name('admin.seo.sitemap.form');
Route::post('/seo/sitemap', 'SeoController@uploadSitemap')->name('admin.seo.sitemap');

// Socials
Route::get('/social', 'SocialController@index')->name('admin.social');
Route::post('/social/update', 'SocialController@update')->name('admin.social.update');

// Products
Route::resource('/product', 'ProductController');

// Brands
Route::resource('/brand', 'BrandController');

// Products Categories
Route::resource('/product-categories', 'ProductCategoryController');

// Slider
Route::resource('/menu', 'MenuController');
Route::get('/menu/{id}/list', 'MenuController@getParents')->name('menu.parent.list');
Route::get('/menu/{slug}/up', 'MenuController@stepUp')->name('menu.up');
Route::get('/menu/{slug}/down', 'MenuController@stepDown')->name('menu.down');

// Slider
Route::resource('/slider', 'SliderController');

// Pages Categories
Route::resource('/page-categories', 'PageCategoryController');

// Pages
Route::resource('/page', 'PageController');

// Contact
Route::resource('/contact', 'ContactController', ['except' => ['create', 'store', 'update', 'edit']]);

// Settings
Route::get('/icons', 'SettingController@showIcons')->name('admin.settings.icons');
Route::get('/settings/layouts', 'SettingController@layouts')->name('admin.settings.layouts');
Route::get('/settings', 'SettingController@index')->name('admin.settings');
Route::post('/settings/update', 'SettingController@update')->name('admin.settings.update');

// Users
Route::resource('/users', 'UserController');
Route::get('/users/update/me', 'UserController@formUpdate')->name('users.update.info.show');
Route::post('/users/update/me', 'UserController@dataUpdate')->name('users.update.info');

// Roles
Route::resource('/role', 'RoleController');