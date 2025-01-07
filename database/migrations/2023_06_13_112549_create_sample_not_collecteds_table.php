<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSampleNotCollectedsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sample_not_collecteds', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('employee_id');
            $table->foreign('employee_id')->references('id')->on('employees')->onUpdate('cascade')->onDelete('cascade');
            $table->unsignedBigInteger('familyname_id');
            $table->foreign('familyname_id')->references('id')->on('family_names')->onUpdate('cascade')->onDelete('cascade');
            $table->unsignedBigInteger('screeningdate_id');
            $table->foreign('screeningdate_id')->references('id')->on('screening_dates')->onUpdate('cascade')->onDelete('cascade');
            $table->unsignedBigInteger('medicalreport_id');
            $table->foreign('medicalreport_id')->references('id')->on('medical_reports')->onUpdate('cascade')->onDelete('cascade');
            $table->longText('reason');
            $table->boolean('additional_collection_status')->default(0); //0: additional date assigned, 1:additional date not assigned
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
        Schema::dropIfExists('sample_not_collecteds');
    }
}
