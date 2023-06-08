<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LaravoltController;
use App\Http\Controllers\V1\Transaction\KlinikKebidananController;
use App\Http\Controllers\V1\Transaction\KonselingController;
use App\Http\Controllers\V1\Transaction\PersonalisasiController;
use App\Http\Controllers\v1\Transaction\RekapSimulasiController;
use App\Http\Controllers\V1\Transaction\SimulasiController;





Route::group(['prefix' => 'v1', 'namespace' => 'V1'], function () {
    Route::group(['prefix' => '{language}'], function () {
        Route::group(['middleware' => 'auth:sanctum'], function () {
                
            Route::group(['prefix' => 'klinik-kebidanan'], function () {
                Route::get('/', [KlinikKebidananController::class, 'index']);
                Route::get('/{id}', [KlinikKebidananController::class, 'show']);
                Route::post('/', [KlinikKebidananController::class, 'store']);
                Route::put('/{id}', [KlinikKebidananController::class, 'update']);
                Route::delete('/{id}', [KlinikKebidananController::class, 'destroy']);
                Route::delete('/force/{id}', [KlinikKebidananController::class, 'force']);
                Route::put('/restore/{id}', [KlinikKebidananController::class, 'restore']);
            });

            Route::group(['prefix' => 'konseling'], function () {
                Route::get('/', [KonselingController::class, 'index']);
                Route::get('/{id}', [KonselingController::class, 'show']);
                Route::post('/', [KonselingController::class, 'store']);
                Route::put('/{id}', [KonselingController::class, 'update']);
                Route::delete('/{id}', [KonselingController::class, 'destroy']);
                Route::delete('/force/{id}', [KonselingController::class, 'force']);
                Route::put('/restore/{id}', [KonselingController::class, 'restore']);
            });

            Route::group(['prefix' => 'personalisasi'], function () {
                Route::get('/', [PersonalisasiController::class, 'index']);
                Route::get('/{id}', [PersonalisasiController::class, 'show']);
                Route::post('/', [PersonalisasiController::class, 'store']);
                Route::put('/{id}', [PersonalisasiController::class, 'update']);
                Route::delete('/{id}', [PersonalisasiController::class, 'destroy']);
                Route::delete('/force/{id}', [PersonalisasiController::class, 'force']);
                Route::put('/restore/{id}', [PersonalisasiController::class, 'restore']);
            });

            Route::group(['prefix' => 'simulasi'], function () {
                Route::get('/', [SimulasiController::class, 'index']);
                Route::get('/{id}', [SimulasiController::class, 'show']);
                Route::post('/', [SimulasiController::class, 'store']);
                Route::put('/{id}', [SimulasiController::class, 'update']);
                Route::delete('/{id}', [SimulasiController::class, 'destroy']);
                Route::delete('/force/{id}', [SimulasiController::class, 'force']);
                Route::put('/restore/{id}', [SimulasiController::class, 'restore']);
            });
            Route::group(['prefix' => 'rekap-simulasi'], function () {
                Route::get('/', [RekapSimulasiController::class, 'index']);
                Route::get('/{id}', [RekapSimulasiController::class, 'show']);
                Route::post('/', [RekapSimulasiController::class, 'store']);
                Route::put('/{id}', [RekapSimulasiController::class, 'update']);
                Route::delete('/{id}', [RekapSimulasiController::class, 'destroy']);
                Route::delete('/force/{id}', [RekapSimulasiController::class, 'force']);
                Route::put('/restore/{id}', [RekapSimulasiController::class, 'restore']);
            });

        });
    });
});

            
            