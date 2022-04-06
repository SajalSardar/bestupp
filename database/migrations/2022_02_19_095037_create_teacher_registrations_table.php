<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTeacherRegistrationsTable extends Migration {
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up() {
        Schema::create('teacher_registrations', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained()->onDelete('cascade');
            $table->foreignId('course_id')->constrained();
            $table->foreignId('teachereducation_id')->constrained();
            $table->date('birthday');
            $table->string('mobile');
            $table->string('address');
            $table->string('national');
            $table->string('father_name');
            $table->string('gender');
            $table->string('parmanet_address');
            $table->string('university');
            $table->string('nid');
            $table->string('photo');
            $table->string('certificate');
            $table->string('status')->default(1);
            $table->softDeletes();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down() {
        Schema::dropIfExists('teacher_registrations');
    }
}
