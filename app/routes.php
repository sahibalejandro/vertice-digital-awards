<?php
/* -----------------------------------------------
 * Public routes
 * -----------------------------------------------
 */
Route::group(['before' => 'guest'], function ()
{
    Route::get('login', ['as' => 'login', 'uses' => 'App\Controllers\LoginController@create']);
    Route::post('login', ['as' => 'login.store', 'uses' => 'App\Controllers\LoginController@store']);

    Route::get('login/thanks', ['as' => 'login.thanks', 'uses' => 'App\Controllers\LoginController@thanks']);
    Route::get('login/{uuid}', ['as' => 'login.attempt', 'uses' => 'App\Controllers\LoginController@attempt']);

});

Route::get('nominees', ['as' => 'nominees.index', 'uses' => 'App\Controllers\NomineesController@index']);

/* -----------------------------------------------
 * Privated Routes
 * -----------------------------------------------
 */
Route::group(['before' => 'auth'], function ()
{
    Route::get('logout', ['as' => 'login.destroy', 'uses' => 'App\Controllers\LoginController@destroy']);

    Route::get('/', [
        'as'   => 'home',
        'uses' => 'App\Controllers\HomeController@index',
    ]);

    Route::post('/vote', [
        'before' => 'csrf',
        'as'     => 'home.vote',
        'uses'   => 'App\Controllers\HomeController@vote',
    ]);

    Route::get('/thanks', [
        'as'   => 'home.thanks',
        'uses' => 'App\Controllers\HomeController@thanks',
    ]);
});

/* -----------------------------------------------
 * Admin Routes
 * -----------------------------------------------
 *
 * Routes for administration.
 *
 */

Route::get('admin/login', ['before' => 'admin.guest', 'as' => 'admin.login.create', 'uses' => 'App\Controllers\AdminLoginController@create']);
Route::post('admin/login', ['before' => 'admin.guest', 'as' => 'admin.login.store', 'uses' => 'App\Controllers\AdminLoginController@store']);

Route::group(['before' => 'auth.admin', 'prefix' => 'admin'], function ()
{
    Route::get('/', ['as' => 'admin.dashboard.index', 'uses' => 'App\Controllers\AdminDashboardController@index']);

    Route::resource('categories', 'App\Controllers\AdminCategoriesController');
    Route::resource('users', 'App\Controllers\AdminUsersController');
    Route::resource('deserters', 'App\Controllers\AdminNotifyDesertersController');

    Route::get('logout', ['as' => 'admin.login.destroy', 'uses' => 'App\Controllers\AdminLoginController@destroy']);
});



