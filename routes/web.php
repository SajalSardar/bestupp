<?php

use App\Http\Controllers\backend\ConfigurationController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\Banner\BannerController;
use App\Http\Controllers\Course\CourseController;
use App\Http\Controllers\frontend\FrontendController;

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
Route::name('frontend.')->group(function () {
    Route::get('/', [FrontendController::class, 'index'])->name('home');
    Route::post('/student/registration', [FrontendController::class, 'studentRegistration'])->name('student.registration');

    Route::get('/teacher/registration', [FrontendController::class, 'teacheRegistrationView'])->name('teacher.registration.view');
    Route::get('/student/registration', [FrontendController::class, 'studentRegistrationView'])->name('student.registration.view');
    Route::get('/all/course', [FrontendController::class, 'allCourse'])->name('all.course');
    Route::get('/course/{slug}', [FrontendController::class, 'viewCourse'])->name('view.course');
    
    Route::get('/aboutss', [FrontendController::class, 'about'])->name('about');
    Route::get('/contacts', [FrontendController::class, 'contact'])->name('contact');
    Route::get('/payments', [FrontendController::class, 'payment'])->name('payment');
});

Auth::routes();

Route::get('/dashboard', [HomeController::class, 'index'])->name('dashboard');

Route::name('dashboard.')->prefix('dashboard')->group(function () {
    Route::resource('/banner', BannerController::class)->except(['show','create']);
    Route::resource('/course', CourseController::class)->except(['show']);

    //schedul route
    Route::get('/day-schedul', [ConfigurationController::class, 'DaySchedul'])->name('day.schedul');
    Route::post('/day-schedul', [ConfigurationController::class, 'DaySchedulStore'])->name('day.schedul.store');
    Route::get('/day-schedul-delete/{id}', [ConfigurationController::class, 'DaySchedulDelete'])->name('day.schedul.delete');
    
});
