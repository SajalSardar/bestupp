<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateThemeOptionsTable extends Migration {
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up() {
        Schema::create('theme_options', function (Blueprint $table) {
            $table->id();
            $table->string('logo')->default("logo.png");
            $table->string('logo_icon')->default("logo-icon.png");
            $table->string("header_contact")->default("01601600405");
            $table->string("header_slogan")->default("<li>Learning</li><li>for</li><li>Careers</li>");
            $table->string("footer_google_store_link")->default("#");
            $table->string("footer_number")->default('<li><a href="tel:01601600405">01601600405</a></li>
            <li><a href="whatsapp:tel:+8801786600486">+88 01786600486</a> <i class="fa fa-whatsapp" aria-hidden="true"></i></li>');
            $table->string("footer_email")->default('<li><a href="mailto:bestupplearning@gmail.com">bestupplearning@gmail.com</a></li>
            <li><a href="mailto:bestupplearning@gmail.com">bestupplearning@gmail.com</a></li>');
            $table->string("footer_site_link")->default('<li><a href="//exnin.com/" target="_blank">www.exnin.com</a>
            </li>');
            $table->string("footer_copy")->default('<p>Copyright <i class="fa fa-copyright" aria-hidden="true"></i>
            2022. All Rights Reserved by <a href="//exnin.com/">exnin.</a></p>');
            $table->string('home_app_title')->default('Download app from the');
            $table->string('home_app_sub_title')->default('Google Play Store');
            $table->text('home_app_description')->nullable();
            $table->string('faq_title')->default('Frequently Asked Questions (FAQ)');
            $table->string('faq_subtitle')->default('Every moment of life should be used properly');
            $table->string('course_title')->default('Our Courses');
            $table->string('course_subtitle')->default('Every moment of life should be used properly');
            $table->string('student_title')->default('Student Registration');
            $table->string('student_subtitle')->default('Every moment of life should be used properly');

            $table->string('teacher_title')->default('Teacher Registration');
            $table->string('teacher_subtitle')->default('Every moment of life should be used properly');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down() {
        Schema::dropIfExists('theme_options');
    }
}
