<?php

use App\Http\Controllers\Api\AuthController;
use App\Http\Controllers\Api\CommonController;
use App\Http\Controllers\Api\CourseController;
use App\Http\Controllers\Api\StudentController;
use App\Http\Controllers\Api\TeacherController;
use App\Models\User;
use Illuminate\Http\Request;
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

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
// public route
Route::get('/course', [CourseController::class, 'index']);
Route::get('/course/{course}', [CourseController::class, 'show']);

Route::post('/student/registration', [StudentController::class, 'studentRegistration']);
Route::post('/teacher/registration', [TeacherController::class, 'teacherRegistration']);

Route::post('/login', [AuthController::class, 'login']);
Route::get('/banners', [CommonController::class, 'allBanners']);
Route::get('/about-us', [CommonController::class, 'aboutUs']);
Route::post('/free-learning', [CommonController::class, 'freeLearning']);
Route::post('/contact-us', [CommonController::class, 'contactUs']);

//prvate route
Route::group(['middleware' => ['auth:sanctum']], function () {
    Route::post('/logout', [AuthController::class, 'logout']);

    //order
    Route::get('/our/orders', [StudentController::class, 'showOrders']);
});

Route::middleware('auth:sanctum')->get('/users', function () {
    return User::all();
});