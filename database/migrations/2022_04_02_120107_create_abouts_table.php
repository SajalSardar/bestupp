<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAboutsTable extends Migration {
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up() {
        Schema::create('abouts', function (Blueprint $table) {
            $table->id();
            $table->string('section_title')->default('About Exnin');
            $table->text('section_description')->nullable();
            $table->longText('about_us')->nullable();
            $table->string('about_banner')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down() {
        Schema::dropIfExists('abouts');
    }
}
