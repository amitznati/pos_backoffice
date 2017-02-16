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
// Route::get('/locale/{locale}', function ($locale) {
// 	xdebug_break();
// 	App::setLocale($locale);
//     return redirect('admin');
// })->name('locale');

Route::resource('departments', 'departmentController');

Route::resource('groups', 'groupController');

Route::resource('products', 'ProductController');