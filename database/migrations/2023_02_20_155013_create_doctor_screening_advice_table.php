<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDoctorScreeningAdviceTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('doctor_screening_advice', function (Blueprint $table) {
            $table->id();
            $table->unsignedInteger('package_screening_teams_id');
            $table->unsignedInteger('report_id');
            $table->longText('feedback')->nullable();
            $table->string('file')->nullable();
            $table->string('file_path')->nullable();
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
        Schema::dropIfExists('doctor_screening_advice');
    }
}
