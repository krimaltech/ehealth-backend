<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAppointmentCompletedsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('appointment_completeds', function (Blueprint $table) {
            $table->id();
            $table->unsignedInteger('booking_id')->nullable();
            $table->longText('history')->nullable();
            $table->longText('examination')->nullable();
            $table->longText('treatment')->nullable();
            $table->longText('progress')->nullable();
            $table->string('image')->nullable();
            $table->string('image_path')->nullable();
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
        Schema::dropIfExists('appointment_completeds');
    }
}
