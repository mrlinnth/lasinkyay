<?php

$namespacePrefix = '\\Mrlinnth\\Lasinkyay\\Http\\Controllers\\';

//backend routes
Route::prefix(config('lasinkyay.prefix.backend'))->name('lasinkyay.')->middleware('auth')->group(function () {

    if (env('APP_ENV') == 'local') {
        Route::get('/test', $namespacePrefix . 'LasinkyayController@test');
    }

    Route::middleware('auth')->group(function () {
        Route::get('/', $namespacePrefix . 'LasinkyayController@index')->name('index');
        Route::post('/subscribe', $namespacePrefix . 'LasinkyayController@subscribe')->name('subscribe');
        Route::resource('/plans', $namespacePrefix . 'Backend\PlanController');
    });
});

//frontend routes
Route::prefix(config('lasinkyay.prefix.backend'))->name('plans.')->group(function () {

    Route::get('/', $namespacePrefix . 'Frontend\PublicController@index')->name('index');

    Route::middleware('auth')->group(function () {
        Route::post('/', $namespacePrefix . 'Frontend\PublicController@show')->name('store');
        Route::get('/{slug}', $namespacePrefix . 'Frontend\PublicController@show')->name('show');
    });
});
