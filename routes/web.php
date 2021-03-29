<?php

Route::get('login', '\App\Http\Controllers\Auth\LoginController@getLogin')->name('login');
Route::post('login', '\App\Http\Controllers\Auth\LoginController@postLogin')->name('login');
Route::get('logout', '\App\Http\Controllers\Auth\LoginController@getLogout')->name('logout');

Route::group(['middleware' => ['web', 'auth']], function () {
    Route::group(['prefix' => 'app'], function () {
        Route::group(['prefix' => 'grafico'], function () {
            Route::get('/', 'GraphicController@getIndex')->name('app.graphic.index');
        });
    });

    Route::group(['prefix' => 'security'], function () {
        Route::group(['prefix' => 'user'], function () {
            Route::get('/', 'UserController@getIndex')->name('security.user.index');
            Route::get('/index', 'UserController@getIndex')->name('security.user.index');
            Route::get('/create', 'UserController@getCreate')->name('security.user.create');
            Route::post('/create', 'UserController@postCreate')->name('security.user.create');
            Route::get('/edit/{id}', 'UserController@getEdit')->name('security.user.edit');
            Route::put('/edit/{id}', 'UserController@putEdit')->name('security.user.edit');
            Route::get('/delete/{id}', 'UserController@getDelete')->name('security.user.delete');
        });

        Route::group(['prefix' => 'profile'], function () {
            Route::get('/', 'ProfileController@getIndex')->name('security.profile.index');
            Route::get('/index', 'ProfileController@getIndex')->name('security.profile.index');
            Route::get('/create', 'ProfileController@getCreate')->name('security.profile.create');
            Route::post('/create', 'ProfileController@postCreate')->name('security.profile.create');
            Route::get('/edit/{id}', 'ProfileController@getEdit')->name('security.profile.edit');
            Route::put('/edit/{id}', 'ProfileController@putEdit')->name('security.profile.edit');
            Route::get('/delete/{id}', 'ProfileController@getDelete')->name('security.profile.delete');
        });
    });

    Route::group(['prefix' => 'register'], function () {
        Route::group(['prefix' => 'operator'], function () {
            Route::get('/', 'OperatorController@getIndex')->name('register.operator.index');
            Route::get('/index', 'OperatorController@getIndex')->name('register.operator.index');
            Route::get('/create', 'OperatorController@getCreate')->name('register.operator.create');
            Route::post('/create', 'OperatorController@postCreate')->name('register.operator.create');
            Route::get('/edit/{id}', 'OperatorController@getEdit')->name('register.operator.edit');
            Route::put('/edit/{id}', 'OperatorController@putEdit')->name('register.operator.edit');
            Route::get('/delete/{id}', 'OperatorController@getDelete')->name('register.operator.delete');
        });
    });
});
