<?php

Route::group(['before' => 'guest'], function ()
{
    Route::get('login', ['as' => 'login', 'uses' => 'App\Controllers\LoginController@create']);
    Route::get('login/google', ['as' => 'login.google.callback', 'uses' => 'App\Controllers\LoginController@google']);
});

Route::group(['before' => 'auth'], function ()
{
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


