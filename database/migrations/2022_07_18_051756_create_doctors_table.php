<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDoctorsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('doctors', function (Blueprint $table) {
            $table->id();
            $table->string('slug')->unique()->nullable();
            $table->unsignedBigInteger('doctor_id')->unique();
            $table->foreign('doctor_id')->references('id')->on('users')->onDelete('cascade');
            $table->string('nmc_no');
            $table->string('gender')->nullable();
            $table->unsignedBigInteger('department')->nullable();
            $table->string('salutation')->nullable();
            $table->string('qualification')->nullable();
            $table->string('year_practiced')->nullable();
            $table->string('image')->nullable();
            $table->string('image_path')->nullable();
            $table->string('file')->nullable();
            $table->string('file_path')->nullable();
            $table->string('agreement_file')->nullable();
            $table->string('agreement_file_path')->nullable();
            $table->string('address')->nullable();
            $table->string('specialization')->nullable();
            $table->integer('fee')->nullable();
            $table->string('hospital')->nullable();
            $table->float('averageRating')->default(0);
            $table->float('averageReview')->default(0);
            $table->string('latitude')->nullable();
            $table->string('longitude')->nullable();
            $table->softDeletes();
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
        Schema::dropIfExists('doctors');
    }
}