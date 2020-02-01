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


use Illuminate\Support\Facades\Request;

Route::get('/', 'HomeController@home')->name('welcome');

Auth::routes();

Route::group(['middleware' => 'auth'], function() {

    Route::group(['middleware' => 'App\Http\Middleware\RoleAllowedMiddleware'], function() {

//    Main dashboard route
        Route::get('/dashboard', 'HomeController@index')->name('home');

//    All routes related to blocks
        Route::get('/dashboard/blocks', 'BlockController@index')->name('blocks');
        Route::get('/dashboard/block/create', 'BlockController@create')->name('create_block');
        Route::post('/dashboard/block/store', 'BlockController@store')->name('store_block');
        Route::get('/dashboard/block/{identifier}/edit', 'BlockController@edit')->name('edit_block');
        Route::delete('/dashboard/block/{identifier}/delete', 'BlockController@destroy')->name('delete_block');
        Route::patch('/dashboard/block/{identifier}/store', 'BlockController@update')->name('update_block');
// All routes related to users
        Route::get('/dashboard/users', 'UserController@index')->name('users');
        Route::get('/dashboard/user/{token}', 'UserController@show')->name('profile');
        Route::get('/dashboard/user/create', 'UserController@create')->name('create_user');
        Route::get('/dashboard/user/{token}/edit', 'UserController@edit')->name('edit_user');

// All routes related to roles
        Route::get('/dashboard/roles', 'RoleController@index')->name('roles');
        Route::get('/dashboard/role/create', 'RoleController@create')->name('create_role');
        Route::post('/dashboard/role/store', 'RoleController@store')->name('store_role');
        Route::delete('/dashboard/role/{name}/delete', 'RoleController@destroy')->name('delete_role');
        Route::get('/dashboard/role/{name}/edit', "RoleController@edit")->name('edit_role');
        Route::patch('/dashboard/role/{name}/store', 'RoleController@update')->name('update_role');
// All routes related to layouts
        Route::get('/dashboard/layouts', 'LayoutController@index')->name('layouts');
        Route::get('/dashboard/layout/create', 'LayoutController@create')->name('create_layout');
        Route::post('/dashboard/layout/store', 'LayoutController@store')->name('store_layout');
        Route::get('/dashboard/layout/{id}/edit', 'LayoutController@edit')->name('edit_layout');
        Route::delete('/dashboard/layout/{id}/delete', 'LayoutController@destroy')->name('delete_layout');
        Route::patch('/dashboard/layout/{id}/update', 'LayoutController@update')->name('update_layout');
// All routes related to pages
        Route::get('/dashboard/pages', 'PageController@index')->name('pages');
        Route::get('/dashboard/page/create', 'PageController@create')->name('create_page');
        Route::post('/dashboard/page/store', 'PageController@store')->name('store_page');
        Route::get('/dashboard/page/{url}/edit', 'PageController@edit')->name('edit_page')->where('url', '([A-Za-z0-9\-\/]+)');
        Route::delete('/dashboard/page/{url}/delete', 'PageController@destroy')->name('delete_page')->where('url', '([A-Za-z0-9\-\/]+)');
        Route::post('/dashboard/pages/order/{url}', 'PageController@changeOrder')->name('change_order')->where('url', '([A-Za-z0-9\-\/]+)');
// All routes related to preferences
        Route::get('/dashboard/preferences', 'PreferencesController@index')->name('preferences');
        Route::patch('/dashboard/user/{id}/language', 'PreferencesController@changeLanguage')->name('change_language');
// All routes related to messages
        Route::get('/dashboard/messages', 'MessageController@index')->name('messages');

//    Register requests
        Route::get('/dashboard/register/requests', 'RegisterController@index')->name('register_requests');
        Route::patch('/dashboard/register/requests/{id}/accept', 'RegisterController@update')->name('accept_request');
        Route::delete('/dashboard/register/requests/{id}/decline', 'RegisterController@destroy')->name('decline_request');

//    PDFs
        Route::get('/dashboard/users/pdf', 'PDFController@index')->name('user_to_pdf');

//    Notifications
        Route::get('/dashboard/notifications', 'NotificationController@index')->name('notifications');
        Route::post('/dashboard/notifications/read', 'NotificationController@store')->name('read_notifications');
        Route::delete('/dashboard/notification/{id}/delete', 'NotificationController@destroy')->name('delete_notification');

//    Addresses
        Route::get('/dashboard/user/{token}/addresses', 'AddressController@index')->name('addresses');
        Route::get('/dashboard/address/create', 'AddressController@create')->name('create_address');
        Route::post('/dashboard/address/store', 'AddressController@store')->name('store_address');
        Route::get('/dashboard/address/{token}/edit', 'AddressController@edit')->name('edit_address');
        Route::patch('/dashboard/address/{token}/update', 'AddressController@update')->name('update_address');
        Route::delete('/dashboard/address/{token}/delete', 'AddressController@destroy')->name('delete_address');

        // Downloads
        Route::get('/dashboard/user/{token}/downloads', 'DownloadController@index')->name('downloads');

        // PACKAGES
        Route::get('/dashboard/packages', 'PackageController@index')->name('packages');
        Route::get('package/install', 'PackageController@install')->name('install_package');
        Route::get('package/uninstall', 'PackageController@uninstall')->name('uninstall_package');

    });
});

Route::post('/dashboard/message/create', 'MessageController@store')->name('create_message');

Route::get('/{url}', 'PageController@show')->name('show_page')->where('url', '([A-Za-z0-9\-\/]+)');;


