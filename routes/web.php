<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| This file is where you may define all of the routes that are handled
| by your application. Just tell Laravel the URIs it should respond
| to using a Closure or controller method. Build something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('locale/{locale?}',
    [
        'as' => 'locale.setlocale',
        'uses' => 'LocaleController@setLocale'
    ]);

Route::group([
    //'prefix' => config('backpack.base.route_prefix', 'admin'),
    'middleware' => ['admin'],
   //'namespace' => 'Admin'
], function() {
    // your CRUD resources and other admin routes here
    Route::resource('products', 'ProductController');
    Route::resource('departments', 'departmentController');
	Route::resource('groups', 'groupController');
	Route::post('products/search', ['as' => 'products.search' , 'uses' => 'ProductController@search']);
	Route::resource('people', 'PersonController');
	Route::resource('employees', 'EmployeeController');
	Route::resource('contacts', 'ContactController');
	Route::resource('customers', 'CustomerController');
	Route::resource('vendors', 'VendorController');
	Route::resource('saleryTypes', 'SaleryTypeController');
	Route::get('menu_design/index',['as' => 'menu_design.index', 'uses' => 'MenuDesignController@index']);
	Route::post('menu_design/saveMenu',['as' => 'menu_design.saveMenu', 'uses' => 'MenuDesignController@saveMenu']);
	Route::resource('menus', 'MenuController');
});

