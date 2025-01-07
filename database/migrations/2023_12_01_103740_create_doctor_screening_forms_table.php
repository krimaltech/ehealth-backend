<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDoctorScreeningFormsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('doctor_screening_forms', function (Blueprint $table) {
            $table->id();
            $table->unsignedInteger('campaign_user_id');
            $table->unsignedInteger('register_campaign_user_id');
            $table->unsignedInteger('doctor_id');
            $table->longText('chief_complaint')->nullable();
            $table->longText('investigation')->nullable();
            $table->longText('treatment_medication')->nullable();
            $table->longText('prevention')->nullable();
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
        Schema::dropIfExists('doctor_screening_forms');
    }
}
