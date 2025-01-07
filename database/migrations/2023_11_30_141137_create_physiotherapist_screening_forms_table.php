<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePhysiotherapistScreeningFormsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('physiotherapist_screening_forms', function (Blueprint $table) {
            $table->id();
            $table->unsignedInteger('campaign_user_id');
            $table->unsignedInteger('register_campaign_user_id');
            $table->unsignedInteger('doctor_id');
            $table->longText('chief_complaint')->nullable();
            $table->longText('hopi')->nullable();
            $table->string('posture')->nullable();
            $table->string('adl')->nullable();
            $table->string('site_side')->nullable();
            $table->string('how_pain_start')->nullable();
            $table->string('type')->nullable();
            $table->string('nrs')->nullable();
            $table->string('temporal_variation')->nullable();
            $table->string('aggravating_factor')->nullable();
            $table->string('relieving_factor')->nullable();
            $table->longText('past_medical_history')->nullable();
            $table->string('appetite')->nullable();
            $table->string('sleep')->nullable();
            $table->string('habit')->nullable();
            $table->string('range_of_motion')->nullable();
            $table->string('mmt')->nullable();
            $table->longText('problem_list')->nullable();
            $table->longText('physio_management')->nullable();
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
        Schema::dropIfExists('physiotherapist_screening_forms');
    }
}
