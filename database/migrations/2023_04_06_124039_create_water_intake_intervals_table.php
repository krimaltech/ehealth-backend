<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateWaterIntakeIntervalsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('water_intake_intervals', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('intake_id');
            $table->foreign('intake_id')->references('id')->on('water_intakes')->onUpdate('cascade')->onDelete('cascade');
            $table->time('time');
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
        Schema::dropIfExists('water_intake_intervals');
    }
}
