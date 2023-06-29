<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LaravoltController;
use App\Http\Controllers\V1\Master\ContactsController;





Route::group(['prefix' => 'v1', 'namespace' => 'V1'], function () {
    Route::group(['prefix' => '{language}'], function () {
        Route::group(['middleware' => 'auth:sanctum'], function () {
                
            Route::group(['prefix' => 'contacts'], function () {
                Route::get('/', [ContactsController::class, 'index']);
                Route::get('/{id}', [ContactsController::class, 'show']);
                Route::post('/', [ContactsController::class, 'store']);
                Route::put('/{id}', [ContactsController::class, 'update']);
                Route::delete('/{id}', [ContactsController::class, 'destroy']);
                Route::delete('/force/{id}', [ContactsController::class, 'force']);
                Route::put('/restore/{id}', [ContactsController::class, 'restore']);
            });

        });
    });
});

            
            