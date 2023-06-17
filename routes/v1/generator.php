<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LaravoltController;
use App\Http\Controllers\V1\Transaction\TransactionsController;
use App\Http\Controllers\V1\Transaction\TransactionDetailsController;





Route::group(['prefix' => 'v1', 'namespace' => 'V1'], function () {
    Route::group(['prefix' => '{language}'], function () {
        Route::group(['middleware' => 'auth:sanctum'], function () {
                
            Route::group(['prefix' => 'transactions'], function () {
                Route::get('/', [TransactionsController::class, 'index']);
                Route::get('/{id}', [TransactionsController::class, 'show']);
                Route::post('/', [TransactionsController::class, 'store']);
                Route::put('/{id}', [TransactionsController::class, 'update']);
                Route::delete('/{id}', [TransactionsController::class, 'destroy']);
                Route::delete('/force/{id}', [TransactionsController::class, 'force']);
                Route::put('/restore/{id}', [TransactionsController::class, 'restore']);
            });

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

            
            