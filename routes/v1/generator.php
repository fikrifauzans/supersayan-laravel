<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LaravoltController;
use App\Http\Controllers\V1\Transaction\TransactionDetailsController;
use App\Http\Controllers\v1\Master\ProductsController;
use App\Http\Controllers\v1\Auth\CategoriesController;
use App\Http\Controllers\v1\Master\CustomersController;
use App\Http\Controllers\v1\Transaction\TransactionsController;

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
            Route::group(['prefix' => 'products'], function () {
                Route::get('/', [ProductsController::class, 'index']);
                Route::get('/{id}', [ProductsController::class, 'show']);
                Route::post('/', [ProductsController::class, 'store']);
                Route::put('/{id}', [ProductsController::class, 'update']);
                Route::delete('/{id}', [ProductsController::class, 'destroy']);
                Route::delete('/force/{id}', [ProductsController::class, 'force']);
                Route::put('/restore/{id}', [ProductsController::class, 'restore']);
            });
            Route::group(['prefix' => 'categories'], function () {
                Route::get('/', [CategoriesController::class, 'index']);
                Route::get('/{id}', [CategoriesController::class, 'show']);
                Route::post('/', [CategoriesController::class, 'store']);
                Route::put('/{id}', [CategoriesController::class, 'update']);
                Route::delete('/{id}', [CategoriesController::class, 'destroy']);
                Route::delete('/force/{id}', [CategoriesController::class, 'force']);
                Route::put('/restore/{id}', [CategoriesController::class, 'restore']);
            });
            Route::group(['prefix' => 'customers'], function () {
                Route::get('/', [CustomersController::class, 'index']);
                Route::get('/{id}', [CustomersController::class, 'show']);
                Route::post('/', [CustomersController::class, 'store']);
                Route::put('/{id}', [CustomersController::class, 'update']);
                Route::delete('/{id}', [CustomersController::class, 'destroy']);
                Route::delete('/force/{id}', [CustomersController::class, 'force']);
                Route::put('/restore/{id}', [CustomersController::class, 'restore']);
            });
            Route::group(['prefix' => 'customers'], function () {
                Route::get('/', [TransactionsController::class, 'index']);
                Route::get('/{id}', [TransactionsController::class, 'show']);
                Route::post('/', [TransactionsController::class, 'store']);
                Route::put('/{id}', [TransactionsController::class, 'update']);
                Route::delete('/{id}', [TransactionsController::class, 'destroy']);
                Route::delete('/force/{id}', [TransactionsController::class, 'force']);
                Route::put('/restore/{id}', [TransactionsController::class, 'restore']);
            });
        });
    });
});
