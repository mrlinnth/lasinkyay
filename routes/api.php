<?php

use Illuminate\Http\Request;

//backend routes
if (config('lasinkyay.backend')) {

    Route::prefix('api/lasinkyay')
        ->middleware('api')
        ->name('api-lasinkyay.')
        ->group(function () {

            Route::get('/', function (Request $request) {
                return $request->user();
            })->name('index');

            Route::apiResource('/plans', '\\Mrlinnth\\Lasinkyay\\Http\\Controllers\\Api\\PlanController');

        });

}
