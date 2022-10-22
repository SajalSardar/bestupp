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
use App\Http\Controllers\backend\TermsConditionController;
use App\Http\Controllers\backend\ThemeController;
use App\Http\Controllers\Banner\BannerController;
use App\Http\Controllers\Course\CourseController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\NoticeController;
use Illuminate\Support\Facades\Route;

Route::get('/dashboard', [HomeController::class, 'index'])->name('dashboard');

Route::name('dashboard.')->prefix('dashboard')->group(function () {
    Route::get('/edit/profile', [HomeController::class, "editProfile"])->name('profile.edit');
    Route::post('/edit/profile/{id}', [HomeController::class, "updateProfile"])->name('profile.update');
});

Route::name('dashboard.')->prefix('dashboard')->group(function () {

    Route::group(['middleware' => ['role:super-admin', 'auth']], function () {
        Route::resource('/banner', BannerController::class)->except(['show', 'create', 'update', 'edit']);
        Route::resource('/course', CourseController::class)->except(['show']);
        Route::get('/course/status/{course}', [CourseController::class, 'courseStatusUpdate'])->name('course.status.update');

        //schedul route
        Route::get('/day-schedul', [ConfigurationController::class, 'DaySchedul'])->name('day.schedul');
        Route::post('/day-schedul', [ConfigurationController::class, 'DaySchedulStore'])->name('day.schedul.store');

        //Teacher education
        Route::resource('/teachereducation', TeacherEducationController::class)->except(['show', 'create', 'edit', 'update']);

        //about route
        Route::get('/about-us', [AboutController::class, 'aboutInfo'])->name('about.us');
        Route::post('/about-us/{id}', [AboutController::class, 'aboutUpdate'])->name('about.update');

        Route::post('/about-content', [AboutController::class, 'aboutContentInsert'])->name('about.content.insert');
        Route::get('/about-content/{id}', [AboutController::class, 'aboutContentEdit'])->name('about.content.edit');
        Route::post('/about-content/{id}', [AboutController::class, 'aboutContentUpdate'])->name('about.content.update');
        Route::get('/about-content/delete/{id}', [AboutController::class, 'aboutContentDelete'])->name('about.content.delete');

        //contact message
        Route::get('/contact/message', [ContactController::class, 'showAll'])->name('show.contact');
        Route::get('/contact/markasread/{id}', [ContactController::class, 'markasread'])->name('contact.markasread');
        Route::get('/contact/delete/{id}', [ContactController::class, 'deleteContact'])->name('contact.delete');

        //faq
        Route::get('/all/faq', [FaqController::class, 'index'])->name('faq.index');
        Route::post('/add/faq', [FaqController::class, 'store'])->name('faq.store');
        Route::get('/faq/edit/{id}', [FaqController::class, 'edit'])->name('faq.edit');
        Route::post('/faq/edit/{id}', [FaqController::class, 'update'])->name('faq.update');

        //student
        Route::get('/students', [StudentController::class, "showAll"])->name('show.all.students');
        Route::get('/students/{id}', [StudentController::class, "manageStudent"])->name('students.manage');

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
        Route::get('/learning/read/{id}', [FreeLearningController::class, 'markRead'])->name('free.learning.read');

        //order route
        Route::get('/orders', [OrderController::class, 'index'])->name('order.index');
        Route::get('/order/manage/{id}', [OrderController::class, 'manageOrder'])->name('order.manage');
        Route::get('/order/running/{id}', [OrderController::class, 'runningOrder'])->name('order.Running');
        Route::get('/order/drop-out/{id}', [OrderController::class, 'dropOrder'])->name('order.dropout');
        Route::get('/order/complete/{id}', [OrderController::class, 'completeOrder'])->name('order.complete');

        //delete route
        Route::get('/day-schedul-delete/{id}', [ConfigurationController::class, 'DaySchedulDelete'])->name('day.schedul.delete');
        Route::get('/faq/delete/{id}', [FaqController::class, 'delete'])->name('faq.delete');
        Route::get('/learning/delete/{id}', [FreeLearningController::class, 'delete'])->name('free.learning.delete');
        Route::get('/social-media/delete/{id}', [SocialController::class, "delete"])->name('social.delete');

        //terms-and-condition

        Route::resource('termscondition', TermsConditionController::class);
        Route::get('return-policy', [TermsConditionController::class, "returnPolicy"])->name('return.policy');
        Route::post('return-policy/{id}', [TermsConditionController::class, "returnPolicyUpdate"])->name('return.policy.update');

        //Privacy Policy
        Route::get('/privacy-policy', [HomeController::class, "createPolicy"])->name('privacy.policy.index');
        Route::post('/privacy-policy', [HomeController::class, "insertPolicy"])->name('privacy.policy.insert');
        Route::get('/privacy-policy/edit/{id}', [HomeController::class, "editPolicy"])->name('privacy.policy.edit');
        Route::post('/privacy-policy/{id}', [HomeController::class, "updatePolicy"])->name('update.privacy.policy');
        Route::get('/privacy-policy/delete/{id}', [HomeController::class, "deletePolicy"])->name('privacy.policy.delete');

        //all admin
        Route::get('/all-admins', [HomeController::class, "allAdmin"])->name("show.all.admin");

        //notice board
        Route::resource('/notice', NoticeController::class)->except(['show']);

        //due notification
        Route::get('/due/notification', [HomeController::class, "dueNotification"])->name("due.notification");
        Route::get('/due/notification/query', [HomeController::class, "dueNotificationSubmit"])->name("due.notification.query");

        Route::get('/due-notification-send/{id}', [HomeController::class, "dueNotificationSend"])->name("due.notification.send");
    });

    Route::group(['middleware' => ['role:student', 'auth']], function () {
        Route::get('/student/orders', [StudentController::class, 'showOrders'])->name('student.order');
        Route::get('/student/information/edit', [StudentController::class, 'studentInformationEdit'])->name('student.information.edit');
        Route::post('/student/information/edit/{id?}', [StudentController::class, 'studentInformationUpdate'])->name('student.information.update');
        Route::post('/student/information', [StudentController::class, 'studentInformation'])->name('student.information.insert');

        //student installment pay
        Route::get('/installment/pay/{id}', [StudentController::class, 'installmentpay',
        ])->name('student.installment.pay');

        //notice board
        Route::get('/student/notice', [NoticeController::class, 'studentNotice'])->name('student.notice');
        Route::get('/student/notice/{notice}', [NoticeController::class, 'studentNoticeView'])->name('student.notice.view');

    });


    Route::group(['middleware' => ['role:teacher', 'auth']], function () {
        Route::get('/teacher/information/edit', [TeacherController::class, 'teacherInformationEdit'])->name('teacher.information.edit');
        Route::post('/teacher/information/edit/{id}', [TeacherController::class, 'teacherInformationUpdate'])->name('teacher.information.update');
    });

});