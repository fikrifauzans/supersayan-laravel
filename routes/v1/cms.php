<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LaravoltController;
use App\Http\Controllers\v1\Auth\UsersController;
use App\Http\Controllers\v1\Auth\RolesController;
use App\Http\Controllers\v1\Auth\AuthController;
use App\Http\Controllers\v1\Auth\MenusController;
use App\Http\Controllers\v1\Auth\MasterMenusController;
use App\Http\Controllers\v1\Auth\PermissionsAccessController;
use App\Http\Controllers\v1\Auth\PermissionsController;
use App\Http\Controllers\v1\Auth\FilesController;

use App\Http\Controllers\InitController;
use App\Http\Controllers\v1\DashboardController;
use App\Http\Controllers\PaymentController as PaymentGatewayController;


Route::get('/hit', [InitController::class, 'init']);




Route::group(['prefix' => 'v1', 'namespace' => 'V1'], function () {
    Route::group(['prefix' => '{language}'], function () {
        // Payment routes
        Route::get('/payment-gateway/methods', [PaymentGatewayController::class, 'getPaymentMethods']);

        //LARAVOLT INDONESIA GET ALL PROVINCE AND CITY
        Route::get('provinces', [LaravoltController::class, 'provinces']);
        Route::get('cities', [LaravoltController::class, 'cities']);


        Route::post('/login', [AuthController::class, 'login']);
        Route::post('/forgot', [AuthController::class, 'forgot']);
        Route::post('/otp-verification', [AuthController::class, 'verificationOtp']);

        Route::group(['middleware' => 'auth:sanctum'], function () {
            Route::get('/me', [AuthController::class, 'me']);
            Route::get('/auth', [AuthController::class, 'check']);
            Route::post('/profile', [AuthController::class, 'profile']);
            Route::post('/logout', [AuthController::class, 'logout']);

            // Register For Customer
            Route::prefix('common')->group(function () {
                Route::post('/register', [AuthController::class, 'register']);
            });

            Route::group(['prefix' => 'dashboard'], function () {
                Route::get('/', [DashboardController::class, 'index']);
            });

            Route::group(['prefix' => 'users'], function () {
                Route::get('/', [UsersController::class, 'index']);
                Route::get('/{id}', [UsersController::class, 'show']);
                Route::post('/', [UsersController::class, 'store']);
                Route::put('/{id}', [UsersController::class, 'update']);
                Route::delete('/{id}', [UsersController::class, 'destroy']);
                Route::delete('/force/{id}', [UsersController::class, 'force']);
                Route::put('/restore/{id}', [UsersController::class, 'restore']);
            });
            Route::group(['prefix' => 'roles'], function () {
                Route::get('/', [RolesController::class, 'index']);
                Route::get('/{id}', [RolesController::class, 'show']);
                Route::post('/', [RolesController::class, 'store']);
                Route::put('/{id}', [RolesController::class, 'update']);
                Route::delete('/{id}', [RolesController::class, 'destroy']);
                Route::delete('/force/{id}', [RolesController::class, 'force']);
                Route::put('/restore/{id}', [RolesController::class, 'restore']);
            });
            Route::group(['prefix' => 'master-menus'], function () {
                Route::get('/', [MasterMenusController::class, 'index']);
                Route::get('/{id}', [MasterMenusController::class, 'show']);
                Route::post('/', [MasterMenusController::class, 'store']);
                Route::put('/{id}', [MasterMenusController::class, 'update']);
                Route::delete('/{id}', [MasterMenusController::class, 'destroy']);
                Route::delete('/force/{id}', [MasterMenusController::class, 'force']);
                Route::put('/restore/{id}', [MasterMenusController::class, 'restore']);
            });
            Route::group(['prefix' => 'menus'], function () {
                Route::get('/', [MenusController::class, 'index']);
                Route::get('/{id}', [MenusController::class, 'show']);
                Route::post('/', [MenusController::class, 'store']);
                Route::put('/{id}', [MenusController::class, 'update']);
                Route::delete('/{id}', [MenusController::class, 'destroy']);
                Route::delete('/force/{id}', [MenusController::class, 'force']);
                Route::put('/restore/{id}', [MenusController::class, 'restore']);
            });
            Route::group(['prefix' => 'permissions'], function () {
                Route::get('/', [PermissionsController::class, 'index']);
                Route::get('/{id}', [PermissionsController::class, 'show']);
                Route::post('/', [PermissionsController::class, 'store']);
                Route::put('/{id}', [PermissionsController::class, 'update']);
                Route::delete('/{id}', [PermissionsController::class, 'destroy']);
                Route::delete('/force/{id}', [PermissionsController::class, 'force']);
                Route::put('/restore/{id}', [PermissionsController::class, 'restore']);
            });
            Route::group(['prefix' => 'permission-access'], function () {
                Route::get('/', [PermissionsAccessController::class, 'index']);
                Route::get('/{id}', [PermissionsAccessController::class, 'show']);
                Route::post('/', [PermissionsAccessController::class, 'store']);
                Route::put('/{id}', [PermissionsAccessController::class, 'update']);
                Route::delete('/{id}', [PermissionsAccessController::class, 'destroy']);
                Route::delete('/force/{id}', [PermissionsAccessController::class, 'force']);
                Route::put('/restore/{id}', [PermissionsAccessController::class, 'restore']);
            });
            Route::group(['prefix' => 'files'], function () {
                Route::get('/', [FilesController::class, 'index']);
                Route::get('/{id}', [FilesController::class, 'show']);
                Route::post('/', [FilesController::class, 'store']);
                Route::post('/{id}', [FilesController::class, 'update']);
                Route::delete('/{id}', [FilesController::class, 'destroy']);
                Route::delete('/force/{id}', [FilesController::class, 'force']);
                Route::put('/restore/{id}', [FilesController::class, 'restore']);
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
        });
    });
});
