<?php

use App\Http\Controllers\backend\AboutController;
use App\Http\Controllers\backend\ConfigurationController;
use App\Http\Controllers\backend\ContactController;
use App\Http\Controllers\backend\education\TeacherEducationController;
use App\Http\Controllers\backend\FaqController;
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
    Route::group(['middleware' => ['role:super-admin|admin']], function () {
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

        //student show in dashboard
        Route::get('/students', [StudentController::class, "showAll"])->name('show.all.students');

        //Teacher show in dashboard
        Route::get('/teacher', [TeacherController::class, "showAll"])->name('show.all.teachers');

        //social network
        Route::get('/social-media', [SocialController::class, "index"])->name('social.media');
        Route::post('/social-media', [SocialController::class, "store"])->name('social.store');

        //theme option
        Route::get('/theme/options', [ThemeController::class, "index"])->name('theme.option');
        Route::post('/theme/options/{id}', [ThemeController::class, "update"])->name('theme.option.update');
    });

});