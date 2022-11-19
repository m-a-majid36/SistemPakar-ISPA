<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFrontendsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('frontends', function (Blueprint $table) {
            $table->id();
            $table->string('email')->nullable();
            $table->string('phone')->nullable();
            $table->string('twitter')->nullable();
            $table->string('facebook')->nullable();
            $table->string('instagram')->nullable();
            $table->string('linkedin')->nullable();
            $table->string('main_picture')->nullable();
            $table->string('main_title')->nullable();
            $table->text('main_subtitle')->nullable();
            $table->string('title1')->nullable();
            $table->text('subtitle1')->nullable();
            $table->string('title2')->nullable();
            $table->text('subtitle2')->nullable();
            $table->string('title3')->nullable();
            $table->text('subtitle3')->nullable();
            $table->string('second_title')->nullable();
            $table->text('second_subtitle')->nullable();
            $table->string('second_picture')->nullable();
            $table->string('content1_picture')->nullable();
            $table->string('content1_title')->nullable();
            $table->text('content1_subtitle')->nullable();
            $table->string('content2_picture')->nullable();
            $table->string('content2_title')->nullable();
            $table->text('content2_subtitle')->nullable();
            $table->string('content3_picture')->nullable();
            $table->string('content3_title')->nullable();
            $table->text('content3_subtitle')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('frontends');
    }
}
