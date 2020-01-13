<?php

//backend routes
Route::prefix(config('lasinkyay.prefix.backend'))
    ->middleware('web')
    ->name('lasinkyay.')
    ->group(function () {

        if (env('APP_ENV') == 'local') {
            Route::get('/test', '\\Mrlinnth\\Lasinkyay\\Http\\Controllers\\LasinkyayController@test')->name('test');
        }

        Route::middleware('auth')
            ->group(function () {
                Route::get('/', '\\Mrlinnth\\Lasinkyay\\Http\\Controllers\\LasinkyayController@index')->name('index');
                Route::post('/subscribe', '\\Mrlinnth\\Lasinkyay\\Http\\Controllers\\LasinkyayController@subscribe')->name('subscribe');

                Route::resource('/plans', '\\Mrlinnth\\Lasinkyay\\Http\\Controllers\\Backend\\PlanController');
            });
    });

//frontend routes
Route::prefix(config('lasinkyay.prefix.frontend'))
    ->name('plans.')
    ->group(function () {

        Route::get('/', '\\Mrlinnth\\Lasinkyay\\Http\\Controllers\\Frontend\\PublicController@index')->name('index');

        Route::middleware('auth')
            ->group(function () {
                Route::post('/', '\\Mrlinnth\\Lasinkyay\\Http\\Controllers\\Frontend\\PublicController@show')->name('store');
                Route::get('/{slug}', '\\Mrlinnth\\Lasinkyay\\Http\\Controllers\\Frontend\\PublicController@show')->name('show');
            });
    });
