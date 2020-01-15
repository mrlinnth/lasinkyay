<?php

//backend routes
if (config('lasinkyay.backend')) {

    Route::prefix('lasinkyay')
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
                    Route::post('/approve', '\\Mrlinnth\\Lasinkyay\\Http\\Controllers\\LasinkyayController@approve')->name('approve');

                    Route::resource('/plans', '\\Mrlinnth\\Lasinkyay\\Http\\Controllers\\Backend\\PlanController');
                });
        });

}
