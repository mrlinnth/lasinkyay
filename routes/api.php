<?php

use Illuminate\Http\Request;

//backend routes
Route::prefix('api/' . config('lasinkyay.prefix.backend'))
    ->middleware('api', 'auth:api')
    ->name('api-lasinkyay.')
    ->group(function () {

        Route::get('/', function (Request $request) {
            return $request->user();
        })->name('index');

        Route::apiResource('/plans', '\\Mrlinnth\\Lasinkyay\\Http\\Controllers\\Api\\PlanController');

    });
