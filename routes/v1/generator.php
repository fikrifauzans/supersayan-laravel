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
                
            Route::group(['prefix' => 'schools'], function () {
                Route::get('/', [SchoolsController::class, 'index']);
                Route::get('/{id}', [SchoolsController::class, 'show']);
                Route::post('/', [SchoolsController::class, 'store']);
                Route::put('/{id}', [SchoolsController::class, 'update']);
                Route::delete('/{id}', [SchoolsController::class, 'destroy']);
                Route::delete('/force/{id}', [SchoolsController::class, 'force']);
                Route::put('/restore/{id}', [SchoolsController::class, 'restore']);
            });

            Route::group(['prefix' => 'studies'], function () {
                Route::get('/', [StudiesController::class, 'index']);
                Route::get('/{id}', [StudiesController::class, 'show']);
                Route::post('/', [StudiesController::class, 'store']);
                Route::put('/{id}', [StudiesController::class, 'update']);
                Route::delete('/{id}', [StudiesController::class, 'destroy']);
                Route::delete('/force/{id}', [StudiesController::class, 'force']);
                Route::put('/restore/{id}', [StudiesController::class, 'restore']);
            });

            Route::group(['prefix' => 'classes'], function () {
                Route::get('/', [ClassesController::class, 'index']);
                Route::get('/{id}', [ClassesController::class, 'show']);
                Route::post('/', [ClassesController::class, 'store']);
                Route::put('/{id}', [ClassesController::class, 'update']);
                Route::delete('/{id}', [ClassesController::class, 'destroy']);
                Route::delete('/force/{id}', [ClassesController::class, 'force']);
                Route::put('/restore/{id}', [ClassesController::class, 'restore']);
            });

            Route::group(['prefix' => 'lesson-timetable'], function () {
                Route::get('/', [LessonTimetableController::class, 'index']);
                Route::get('/{id}', [LessonTimetableController::class, 'show']);
                Route::post('/', [LessonTimetableController::class, 'store']);
                Route::put('/{id}', [LessonTimetableController::class, 'update']);
                Route::delete('/{id}', [LessonTimetableController::class, 'destroy']);
                Route::delete('/force/{id}', [LessonTimetableController::class, 'force']);
                Route::put('/restore/{id}', [LessonTimetableController::class, 'restore']);
            });

            Route::group(['prefix' => 'presences'], function () {
                Route::get('/', [PresencesController::class, 'index']);
                Route::get('/{id}', [PresencesController::class, 'show']);
                Route::post('/', [PresencesController::class, 'store']);
                Route::put('/{id}', [PresencesController::class, 'update']);
                Route::delete('/{id}', [PresencesController::class, 'destroy']);
                Route::delete('/force/{id}', [PresencesController::class, 'force']);
                Route::put('/restore/{id}', [PresencesController::class, 'restore']);
            });

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

            
            