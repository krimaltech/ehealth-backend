<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDriversTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('drivers', function (Blueprint $table) {
            $table->id();
            $table->string('slug')->unique();
            $table->unsignedBigInteger('driver_id')->unique();
            $table->foreign('driver_id')->references('id')->on('users')->onDelete('cascade');
            $table->string('address');
            $table->string('salary')->nullable();
            $table->string('status')->default(1);  //1-free 2-in trip/busy
            $table->string('activeStatus')->default(0);  // 0-inactive 1-active
            $table->string('latitude')->nullable();
            $table->string('longitude')->nullable();
            $table->string('image')->nullable();
            $table->string('image_path')->nullable();
            $table->string('file')->nullable();
            $table->string('file_path')->nullable();
            $table->string('agreement_file')->nullable();
            $table->string('agreement_file_path')->nullable();
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
        Schema::dropIfExists('drivers');
    }
}