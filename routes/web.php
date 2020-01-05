<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/





Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/dashboard', 'HomeController@index')->name('home');

Route::get('/dashboard/blocks', 'BlockController@index')->name('blocks');
Route::get('/dashboard/block/create', 'BlockController@create')->name('create_block');
Route::post('/dashboard/block/store', 'BlockController@store')->name('store_block');
Route::get('/dashboard/block/{identifier}/edit', 'BlockController@edit')->name('edit_block');
Route::delete('/dashboard/block/{identifier}/delete', 'BlockController@destroy')->name('delete_block');
Route::patch('/dashboard/block/{identifier}/store', 'BlockController@update')->name('update_block');

Route::get('/dashboard/users', 'UserController@index')->name('users');
Route::get('/dashboard/user/{id}', 'UserController@show')->name('profile');

Route::get('/dashboard/roles', 'RoleController@index')->name('roles');
Route::get('/dashboard/role/create', 'RoleController@create')->name('create_role');
Route::post('/dashboard/role/store', 'RoleController@store')->name('store_role');

Route::get('/dashboard/layouts', 'LayoutController@index')->name('layouts');
Route::get('/dashboard/layout/create', 'LayoutController@create')->name('create_layout');
Route::post('/dashboard/layout/store', 'LayoutController@store')->name('store_layout');
Route::get('/dashboard/layout/{id}/edit', 'LayoutController@edit')->name('edit_layout');
Route::delete('/dashboard/layout/{id}/delete', 'LayoutController@destroy')->name('delete_layout');
Route::patch('/dashboard/layout/{id}/update', 'LayoutController@update')->name('update_layout');

Route::get('/dashboard/pages', 'PageController@index')->name('pages');
Route::get('/dashboard/page/create', 'PageController@create')->name('create_page');
Route::post('/dashboard/page/store', 'PageController@store')->name('store_page');
Route::get('/dashboard/page/{url}/edit', 'PageController@edit')->name('edit_page')->where('url', '([A-Za-z0-9\-\/]+)');
Route::delete('/dashboard/page/{url}/delete', 'PageController@destroy')->name('delete_page')->where('url', '([A-Za-z0-9\-\/]+)');
Route::post('/dashboard/pages/order/{url}', 'PageController@changeOrder')->name('change_order')->where('url', '([A-Za-z0-9\-\/]+)');

Route::get('/dashboard/preferences', 'PreferencesController@index')->name('preferences');
Route::patch('/dashboard/user/{id}/language', 'PreferencesController@changeLanguage')->name('change_language');

Route::get('/dashboard/messages', 'MessageController@index')->name('messages');
Route::post('/dashboard/message/create', 'MessageController@store')->name('create_message');





Route::get('/{url}', 'PageController@show')->name('show_page')->where('url', '([A-Za-z0-9\-\/]+)');;


