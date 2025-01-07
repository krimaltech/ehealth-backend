<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOphthalmologistScreeningFormsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ophthalmologist_screening_forms', function (Blueprint $table) {
            $table->id();
            $table->unsignedInteger('register_campaign_user_id');
            $table->unsignedInteger('campaign_user_id');
            $table->unsignedInteger('doctor_id');
            $table->string('ocular_history')->nullable();
            $table->string('ocular_history_positive')->nullable();
            $table->integer('visual_distance_right')->nullable();
            $table->integer('visual_distance_left')->nullable();
            $table->string('external_exam')->nullable();
            $table->string('external_exam_comment')->nullable();
            $table->string('internal_exam')->nullable();
            $table->string('internal_exam_comment')->nullable();
            $table->string('pupillary_reflex')->nullable();
            $table->string('pupillary_reflex_comment')->nullable();
            $table->string('binocular_function')->nullable();
            $table->string('binocular_function_comment')->nullable();
            $table->string('accommodation_vergence')->nullable();
            $table->string('accommodation_vergence_comment')->nullable();
            $table->string('color_vision')->nullable();
            $table->string('color_vision_comment')->nullable();
            $table->string('glaucoma_evaluation')->nullable();
            $table->string('glaucoma_evaluation_comment')->nullable();
            $table->string('oculomotor_assessment')->nullable();
            $table->string('oculomotor_assessment_comment')->nullable();
            $table->string('other_comment')->nullable();
            $table->string('diagnosis')->nullable();
            $table->string('other_diagnosis')->nullable();
            $table->string('corrective_lenses')->nullable();
            $table->string('glass_contact')->nullable();
            $table->string('reexamination')->nullable();
            $table->string('reexamination_other')->nullable();
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
        Schema::dropIfExists('ophthalmologist_screening_forms');
    }
}
