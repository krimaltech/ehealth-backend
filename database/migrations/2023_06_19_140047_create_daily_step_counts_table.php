<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDailyStepCountsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('daily_step_counts', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('stepcount_id');
            $table->foreign('stepcount_id')->references('id')->on('step_counts')->onUpdate('cascade')->onDelete('cascade');
            $table->string('day');
            $table->bigInteger('step_count')->default(0);
            $table->bigInteger('credit')->default(0);
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
        Schema::dropIfExists('daily_step_counts');
    }
}
