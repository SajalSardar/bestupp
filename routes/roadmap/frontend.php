<?php

use App\Http\Controllers\backend\CartController;
use App\Http\Controllers\backend\ContactController;
use App\Http\Controllers\backend\FreeLearningController;
use App\Http\Controllers\backend\StudentController;
use App\Http\Controllers\backend\TeacherController;
use App\Http\Controllers\frontend\FrontendController;
use Illuminate\Support\Facades\Route;

Route::name('frontend.')->group(function () {
    Route::get('/', [FrontendController::class, 'index'])->name('home');

    Route::get('/teacher/registration', [TeacherController::class, 'teacheRegistrationView'])->name('teacher.registration.view');
    Route::post('/teacher/registration', [TeacherController::class, 'teacheRegistrationStore'])->name('teacher.registration.store');

    Route::get('/student/registration', [StudentController::class, 'studentRegistrationView'])->name('student.registration.view');
    Route::post('/student/registration', [StudentController::class, 'studentRegistration'])->name('student.registration');

    Route::get('/courses', [FrontendController::class, 'allCourse'])->name('all.course');
    Route::get('/course/{slug}', [FrontendController::class, 'viewCourse'])->name('view.course');

    Route::get('/abouts', [FrontendController::class, 'about'])->name('about');

    Route::get('/contacts', [ContactController::class, 'contact'])->name('contact');
    Route::post('/contacts', [ContactController::class, 'contactStore'])->name('contact.store');
    Route::get('/reload-captcha', [ContactController::class, 'reloadCaptcha'])->name('reload.captcha');

    //free learning route
    Route::post('/free/learning', [FreeLearningController::class, 'store'])->name('free.learning');

    //cart route
    Route::group(['middleware' => ['role:student', 'auth','verified']], function () {
        Route::get('/cart', [CartController::class, 'index'])->name('cart');
        Route::get('/enroll/{id}', [CartController::class, 'enroll'])->name('enroll');
        Route::get('/cart/delete/{id}', [CartController::class, 'cartDelete'])->name('cart.delete');
    });

    //Privacy Policy
    Route::get('/privacy-policy', [FrontendController::class, "policy"])->name('privacy.policy');

    //Terms And Condition
    Route::get('/terms-condition', [FrontendController::class, "termsCondition"])->name('terms.condition');
    Route::get('/return-refund', [FrontendController::class, "returnRefund"])->name('return.refund');

});
