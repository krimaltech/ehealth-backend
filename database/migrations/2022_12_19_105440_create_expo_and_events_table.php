<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateExpoAndEventsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('expo_and_events', function (Blueprint $table) {
            $table->id();
            $table->string('slug');
            $table->date('start_date');
            $table->date('end_date');
            $table->string('title');
            $table->string('address');
            $table->longText('description');
            $table->string('image');
            $table->string('image_path');
            $table->string('longitude')->nullable();
            $table->string('latitude')->nullable();
            $table->boolean('priority')->default(0);
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
        Schema::dropIfExists('expo_and_events');
    }
}
