<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFitnessPricingsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('fitness_pricings', function (Blueprint $table) {
            $table->id();
            $table->unsignedInteger('vendor_id');
            $table->unsignedInteger('fitness_name_id');
            $table->bigInteger('one_month');
            $table->bigInteger('three_month');
            $table->bigInteger('six_month');
            $table->bigInteger('one_year');
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
        Schema::dropIfExists('fitness_pricings');
    }
}
