<?php

use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\VerificationController;
use App\Http\Controllers\SslCommerzPaymentController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

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

Auth::routes(['verify' => true]);

require_once "roadmap/backend.php";
require_once "roadmap/frontend.php";

Route::post('/login', [LoginController::class, 'login'])->name('login');
Route::get('/resend/verification', [VerificationController::class, 'verificationResend'])->name('resend.verification');
// SSLCOMMERZ Start
Route::group(['middleware' => ['verified','auth']], function () {
  Route::get('/checkout', [SslCommerzPaymentController::class, 'exampleHostedCheckout']);
  Route::post('/pay', [SslCommerzPaymentController::class, 'index']);

  Route::post('/success', [SslCommerzPaymentController::class, 'success']);
  Route::post('/fail', [SslCommerzPaymentController::class, 'fail']);
  Route::post('/cancel', [SslCommerzPaymentController::class, 'cancel']);

  Route::post('/ipn', [SslCommerzPaymentController::class, 'ipn']);
});
//SSLCOMMERZ END

// Route::get('/tokens/create', function (Request $request) {
//     $token = $request->user()->createToken(auth()->user()->name);

//     return ['token' => $token->plainTextToken];
// });
