<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDentalScreeningFormsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('dental_screening_forms', function (Blueprint $table) {
            $table->id();
            $table->unsignedInteger('campaign_user_id');
            $table->unsignedInteger('register_campaign_user_id');
            $table->unsignedInteger('doctor_id');
            $table->longText('dental_history')->nullable();
            $table->string('last_visit_date')->nullable();
            $table->string('treated_condition')->nullable();
            $table->string('dental_habit')->nullable();
            $table->string('tobacco_products')->nullable();
            $table->string('dental_floss')->nullable();
            $table->string('dental_brush')->nullable();
            $table->string('current_dental')->nullable();
            $table->string('prevention')->nullable();
            $table->string('toothpaste_type')->nullable();
            $table->string('brush_type')->nullable();
            $table->longText('diagnosis')->nullable();
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
        Schema::dropIfExists('dental_screening_forms');
    }
}
