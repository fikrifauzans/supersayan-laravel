<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Test\WAController;
use App\Http\Controllers\PaymentController;
use App\Http\Controllers\Test\PaymentController as TestPaymentController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/


// $router->get('/', function () use ($router) {
//     return ['data' => $router->app->version()];
// });


// $router->get('/test', function () use ($router) {
//     $user = new Users();
//     dd($user->searchable);
// });

Route::get('/', function () {
    return view('welcome');
});

Route::get("/storage-link", function () {
    $targetFolder = storage_path("app/public");
    $linkFolder = $_SERVER['DOCUMENT_ROOT'] . '/storage';
    symlink($targetFolder, $linkFolder);
});


Route::group(['prefix' => 'test'], function () {
    Route::view('payment', 'test.payment');
    Route::post('wa/jamaah-registration', [WAController::class, 'jamaahRegistration']);
    Route::post('wa/jamaah-payment', [WAController::class, 'jamaahPayment']);
    Route::post('wa/jamaah-repayment', [WAController::class, 'jamaahRepayment']);
    Route::post('wa/forgot-password', [WAController::class, 'forgotPassword']);
    Route::post('payment/booking', [TestPaymentController::class, 'booking']);
});

Route::post('payment-gateway/notification', [PaymentController::class, 'notify']);
