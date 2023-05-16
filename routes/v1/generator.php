<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LaravoltController;
use App\Http\Controllers\V1\Master\Lesson_timetableController;





Route::group(['prefix' => 'v1', 'namespace' => 'V1'], function () {
    Route::group(['prefix' => '{language}'], function () {
        Route::group(['middleware' => 'auth:sanctum'], function () {
                
            Route::group(['prefix' => 'lesson_timetable'], function () {
                Route::get('/', [Lesson_timetableController::class, 'index']);
                Route::get('/{id}', [Lesson_timetableController::class, 'show']);
                Route::post('/', [Lesson_timetableController::class, 'store']);
                Route::put('/{id}', [Lesson_timetableController::class, 'update']);
                Route::delete('/{id}', [Lesson_timetableController::class, 'destroy']);
                Route::delete('/force/{id}', [Lesson_timetableController::class, 'force']);
                Route::put('/restore/{id}', [Lesson_timetableController::class, 'restore']);
            });

        });
    });
});

            
            