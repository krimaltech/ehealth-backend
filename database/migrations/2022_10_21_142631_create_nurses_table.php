<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateNursesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('nurses', function (Blueprint $table) {
            $table->id();
            $table->string('slug')->unique()->nullable();
            $table->unsignedBigInteger('nurse_id')->unique();
            $table->foreign('nurse_id')->references('id')->on('users')->onDelete('cascade');
            $table->string('nnc_no');
            $table->string('gender')->nullable();
            $table->string('qualification')->nullable();
            $table->string('year_practiced')->nullable();
            $table->string('image')->nullable();
            $table->string('image_path')->nullable();
            $table->string('file')->nullable();
            $table->string('file_path')->nullable();
            $table->string('agreement_file')->nullable();
            $table->string('agreement_file_path')->nullable();
            $table->string('address')->nullable();
            $table->integer('fee')->nullable();
            $table->string('latitude')->nullable();
            $table->string('longitude')->nullable();
            $table->float('averageRating')->default(0);
            $table->float('averageReview')->default(0);
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
        Schema::dropIfExists('nurses');
    }
}