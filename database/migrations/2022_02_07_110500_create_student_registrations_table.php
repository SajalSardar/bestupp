<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateStudentRegistrationsTable extends Migration {
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up() {
        Schema::create('student_registrations', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained()->onDelete('cascade');
            $table->date('birthday');
            $table->string('mobile');
            $table->string('nationality');
            $table->string('guardianname')->nullable();
            $table->string('fathername');
            $table->string('gender');
            $table->text('address');
            $table->string('gnumber')->nullable();
            $table->string('profile_photo')->nullable();
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
        Schema::dropIfExists('student_registrations');
    }
}
