<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDailyWaterIntakesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('daily_water_intakes', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('intake_id');
            $table->foreign('intake_id')->references('id')->on('water_intakes')->onUpdate('cascade')->onDelete('cascade');
            $table->string('day');
            $table->float('intake');
            $table->float('last_week_intake');
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
        Schema::dropIfExists('daily_water_intakes');
    }
}
