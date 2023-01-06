<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class ColumnTypeToStudentRegistrationTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('student_registrations', function (Blueprint $table) {
            $table->date('birthday')->nullable()->change();
            $table->string('mobile')->nullable()->change();
            $table->string('nationality')->nullable()->change();
            $table->string('fathername')->nullable()->change();
            $table->string('gender')->nullable()->change();
            $table->text('address')->nullable()->change();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('student_registrations', function (Blueprint $table) {
            $table->date('birthday')->change();
            $table->string('mobile')->change();
            $table->string('nationality')->change();
            $table->string('fathername')->change();
            $table->string('gender')->change();
            $table->text('address')->change();
        });
    }
}
