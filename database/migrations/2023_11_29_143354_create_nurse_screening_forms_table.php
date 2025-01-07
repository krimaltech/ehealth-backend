<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateNurseScreeningFormsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('nurse_screening_forms', function (Blueprint $table) {
            $table->id();
            $table->unsignedInteger('campaign_user_id');
            $table->unsignedInteger('doctor_id');
            $table->unsignedInteger('register_campaign_user_id');
            $table->string('past_illness')->nullable();
            $table->string('past_illness_comment')->nullable();
            $table->string('hospitalization')->nullable();
            $table->string('hospitalization_comment')->nullable();
            $table->string('injuries_accident')->nullable();
            $table->string('injuries_accident_comment')->nullable();
            $table->string('surgeries')->nullable();
            $table->string('surgeries_comment')->nullable();
            $table->string('temperature')->nullable();
            $table->string('pulse')->nullable();
            $table->string('resp')->nullable();
            $table->string('spo2')->nullable();
            $table->string('bp')->nullable();
            $table->string('muac')->nullable();
            $table->string('height')->nullable();
            $table->string('weight')->nullable();
            $table->string('bmi')->nullable();
            $table->string('environmental_factor')->nullable();
            $table->string('environmental_factor_comment')->nullable();
            $table->string('food_allergie')->nullable();
            $table->string('food_allergie_comment')->nullable();
            $table->string('durg_allergie')->nullable();
            $table->string('durg_allergie_comment')->nullable();
            $table->string('insect_allergie')->nullable();
            $table->string('insect_allergie_comment')->nullable();
            $table->string('drug_history')->nullable();
            $table->string('drug_history_comment')->nullable();
            $table->string('mentural_history')->nullable();
            $table->string('mentural_history_comment')->nullable();
            $table->string('family_history')->nullable();
            $table->longText('family_history_details')->nullable();
            $table->string('childhood_disease')->nullable();
            $table->string('childhood_disease_comment')->nullable();
            $table->string('immunization')->nullable();
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
        Schema::dropIfExists('nurse_screening_forms');
    }
}
