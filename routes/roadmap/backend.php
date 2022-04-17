<?php

use App\Http\Controllers\backend\AboutController;
use App\Http\Controllers\backend\ConfigurationController;
use App\Http\Controllers\backend\ContactController;
use App\Http\Controllers\backend\education\TeacherEducationController;
use App\Http\Controllers\backend\FaqController;
use App\Http\Controllers\backend\FreeLearningController;
use App\Http\Controllers\backend\OrderController;
use App\Http\Controllers\backend\SocialController;
use App\Http\Controllers\backend\StudentController;
use App\Http\Controllers\backend\TeacherController;
use App\Http\Controllers\backend\ThemeController;
use App\Http\Controllers\Banner\BannerController;
use App\Http\Controllers\Course\CourseController;
use App\Http\Controllers\HomeController;
use Illuminate\Support\Facades\Route;

Route::get('/dashboard', [HomeController::class, 'index'])->name('dashboard');

Route::name('dashboard.')->prefix('dashboard')->group(function () {
    Route::get('/edit/profile', [HomeController::class, "editProfile"])->name('profile.edit');
    Route::post('/edit/profile/{id}', [HomeController::class, "updateProfile"])->name('profile.update');
});

Route::name('dashboard.')->prefix('dashboard')->group(function () {
    Route::group(['middleware' => ['role:super-admin|admin', 'auth']], function () {
        Route::resource('/banner', BannerController::class)->except(['show', 'create']);
        Route::resource('/course', CourseController::class)->except(['show']);

        //schedul route
        Route::get('/day-schedul', [ConfigurationController::class, 'DaySchedul'])->name('day.schedul');
        Route::post('/day-schedul', [ConfigurationController::class, 'DaySchedulStore'])->name('day.schedul.store');
        Route::get('/day-schedul-delete/{id}', [ConfigurationController::class, 'DaySchedulDelete'])->name('day.schedul.delete');

        //Teacher education
        Route::resource('/teachereducation', TeacherEducationController::class)->except(['show', 'create', 'edit']);

        //about route
        Route::get('/about-us', [AboutController::class, 'aboutInfo'])->name('about.us');
        Route::post('/about-us/{id}', [AboutController::class, 'aboutUpdate'])->name('about.update');

        //contact message
        Route::get('/contact/message', [ContactController::class, 'showAll'])->name('show.contact');

        //faq
        Route::get('/all/faq', [FaqController::class, 'index'])->name('faq.index');
        Route::post('/add/faq', [FaqController::class, 'store'])->name('faq.store');

        //student
        Route::get('/students', [StudentController::class, "showAll"])->name('show.all.students');
        Route::get('/students/{id}', [StudentController::class, "manageStudent"])->name('students.manage');
        Route::get('/students/complete/{id}', [StudentController::class, "studentComplete"])->name('students.complete');
        Route::get('/students/drop/{id}', [StudentController::class, "studentDrop"])->name('students.drop');
        Route::get('/students/running/{id}', [StudentController::class, "studentRunning"])->name('students.running');

        //Teacher
        Route::get('/teacher', [TeacherController::class, "showAll"])->name('show.all.teachers');
        Route::get('/teacher/view/{id}', [TeacherController::class, "teacherView"])->name('teachers.view');
        Route::get('/teacher/reject/{id}', [TeacherController::class, "teacherreject"])->name('teachers.reject');
        Route::get('/teacher/approve/{id}', [TeacherController::class, "teacherapprove"])->name('teachers.approve');

        //social network
        Route::get('/social-media', [SocialController::class, "index"])->name('social.media');
        Route::post('/social-media', [SocialController::class, "store"])->name('social.store');

        //theme option
        Route::get('/theme/options', [ThemeController::class, "index"])->name('theme.option');
        Route::post('/theme/options/{id}', [ThemeController::class, "update"])->name('theme.option.update');

        //free learning route
        Route::get('/free/learning', [FreeLearningController::class, 'index'])->name('free.learning');

        //order route
        Route::get('/orders', [OrderController::class, 'index'])->name('order.index');
    });

    Route::group(['middleware' => ['role:student', 'auth']], function () {
        Route::get('/student/order', [StudentController::class, 'showOrders'])->name('student.order');
        Route::get('/student/information/edit', [StudentController::class, 'studentInformationEdit'])->name('student.information.edit');
        Route::post('/student/information/edit/{id}', [StudentController::class, 'studentInformationUpdate'])->name('student.information.update');
    });

    Route::group(['middleware' => ['role:teacher', 'auth']], function () {
        Route::get('/teacher/information/edit', [TeacherController::class, 'teacherInformationEdit'])->name('teacher.information.edit');
        Route::post('/teacher/information/edit/{id}', [TeacherController::class, 'teacherInformationUpdate'])->name('teacher.information.update');
    });

});