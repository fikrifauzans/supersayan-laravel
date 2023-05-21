<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LaravoltController;
use App\Http\Controllers\v1\Master\SchoolsController;
use App\Http\Controllers\v1\Master\StudiesController;
use App\Http\Controllers\v1\Master\ClassesController;
use App\Http\Controllers\v1\Master\LessonTimetableController;
use App\Http\Controllers\v1\Master\PresencesController;
use App\Http\Controllers\v1\Master\ContentsController;





Route::group(['prefix' => 'v1', 'namespace' => 'V1'], function () {
    Route::group(['prefix' => '{language}'], function () {
        Route::group(['middleware' => 'auth:sanctum'], function () {
                
       
            Route::group(['prefix' => 'contents'], function () {
                Route::get('/', [ContentsController::class, 'index']);
                Route::get('/{id}', [ContentsController::class, 'show']);
                Route::post('/', [ContentsController::class, 'store']);
                Route::put('/{id}', [ContentsController::class, 'update']);
                Route::delete('/{id}', [ContentsController::class, 'destroy']);
                Route::delete('/force/{id}', [ContentsController::class, 'force']);
                Route::put('/restore/{id}', [ContentsController::class, 'restore']);
            });

        });
    });
});

            
            