<?php

use App\Http\Controllers\Api\AuthController;
use App\Http\Controllers\Api\CartController;
use App\Http\Controllers\Api\CommonController;
use App\Http\Controllers\Api\CourseController;
use App\Http\Controllers\Api\SslCommerzApiController;
use App\Http\Controllers\Api\StudentController;
use App\Http\Controllers\Api\TeacherController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
 */

// Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
//     return $request->user();
// });
// public route
Route::get('/banners', [CommonController::class, 'allBanners']);
Route::get('/about-us', [CommonController::class, 'aboutUs']);
Route::get('/about-content', [CommonController::class, 'aboutContent']);
Route::get('/course-day', [CommonController::class, 'courseDay']);
Route::get('/teacher-education', [CommonController::class, 'teacherEducation']);
Route::get('/social-icon', [CommonController::class, 'socialNetwork']);
Route::get('/options', [CommonController::class, 'themeOption']);
Route::get('/privacy-policy', [CommonController::class, 'privacyPolicy']);
Route::get('/terms-condition', [CommonController::class, "termsCondition"]);
Route::get('/return-refund', [CommonController::class, "returnRefund"]);
Route::get('/course', [CourseController::class, 'index']);
Route::get('/course/{course}', [CourseController::class, 'show']);

Route::post('/student/registration', [StudentController::class, 'studentRegistration']);
Route::post('/teacher/registration', [TeacherController::class, 'teacherRegistration']);
Route::post('/login', [AuthController::class, 'login']);
Route::post('/free-learning', [CommonController::class, 'freeLearning']);
Route::post('/contact-us', [CommonController::class, 'contactUs']);

//prvate route

Route::group(['middleware' => ['auth:sanctum']], function () {
    Route::post('/logout', [AuthController::class, 'logout']);

    //cart
    Route::get('/carts', [CartController::class, 'index']);
    Route::post('/enroll', [CartController::class, 'enroll']);
    Route::get('/cart/delete/{id}', [CartController::class, 'cartDelete']);

    //Notice
    Route::get('/notice', [CommonController::class, 'notice']);

    //student
    Route::get('/student/profile', [StudentController::class, 'studentProfile']);
    Route::post('/student/profile/update', [StudentController::class, 'studentUpdate']);

    //teacher
    Route::get('/teacher/profile', [TeacherController::class, 'teacherProfile']);
    Route::post('/teacher/profile/update', [TeacherController::class, 'teacherUpdate']);

    //user account update
    Route::post('user/edit', [AuthController::class, "updateProfile"]);

    //order
    Route::get('/our/orders', [StudentController::class, 'showOrders']);

    Route::post('/pay', [SslCommerzApiController::class, 'index']);
    Route::post('/success', [SslCommerzApiController::class, 'success']);
    Route::post('/fail', [SslCommerzApiController::class, 'fail']);
    Route::post('/cancel', [SslCommerzApiController::class, 'cancel']);

    Route::post('/ipn', [SslCommerzApiController::class, 'ipn']);
});
