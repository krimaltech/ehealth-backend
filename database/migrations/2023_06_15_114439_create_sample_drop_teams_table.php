<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSampleDropTeamsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sample_drop_teams', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('employee_id');
            $table->foreign('employee_id')->references('id')->on('employees')->onUpdate('cascade')->onDelete('cascade');
            $table->unsignedBigInteger('familyname_id');
            $table->foreign('familyname_id')->references('id')->on('family_names')->onUpdate('cascade')->onDelete('cascade');
            $table->unsignedBigInteger('screeningdate_id');
            $table->foreign('screeningdate_id')->references('id')->on('screening_dates')->onUpdate('cascade')->onDelete('cascade');
            $table->unsignedBigInteger('medicalreport_id');
            $table->foreign('medicalreport_id')->references('id')->on('medical_reports')->onUpdate('cascade')->onDelete('cascade');
            $table->boolean('collection_status')->default(0);
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
        Schema::dropIfExists('sample_drop_teams');
    }
}
