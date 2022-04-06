<?php

use App\Http\Controllers\backend\ContactController;
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

    Route::get('/payments', [FrontendController::class, 'payment'])->name('payment');
    Route::get('/payments/course/{id}', [FrontendController::class, 'paymentCourse'])->name('payment.course');
    Route::post('/payment/store', [FrontendController::class, 'paymentStore'])->name('payment.store');
});
