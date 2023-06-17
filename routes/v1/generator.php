<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LaravoltController;
use App\Http\Controllers\V1\Transaction\TransactionDetailsController;





Route::group(['prefix' => 'v1', 'namespace' => 'V1'], function () {
    Route::group(['prefix' => '{language}'], function () {
        Route::group(['middleware' => 'auth:sanctum'], function () {
                
            Route::group(['prefix' => 'transaction-details'], function () {
                Route::get('/', [TransactionDetailsController::class, 'index']);
                Route::get('/{id}', [TransactionDetailsController::class, 'show']);
                Route::post('/', [TransactionDetailsController::class, 'store']);
                Route::put('/{id}', [TransactionDetailsController::class, 'update']);
                Route::delete('/{id}', [TransactionDetailsController::class, 'destroy']);
                Route::delete('/force/{id}', [TransactionDetailsController::class, 'force']);
                Route::put('/restore/{id}', [TransactionDetailsController::class, 'restore']);
            });

        });
    });
});

            
            