<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateScreeningDatesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('screening_dates', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('userpackage_id');
            $table->foreign('userpackage_id')->references('id')->on('user_packages')->onUpdate('cascade')->onDelete('cascade');
            $table->unsignedBigInteger('screening_id');
            $table->foreign('screening_id')->references('id')->on('screenings')->onUpdate('cascade')->onDelete('cascade');
            $table->date('screening_date');
            $table->string('screening_time')->nullable(); 
            $table->datetime('labreport_date')->nullable(); 
            $table->date('doctorvisit_date')->nullable();
            $table->datetime('doctorreport_date')->nullable(); 
            $table->string('status'); //Pending, Lab In Progress, Report Generated, Doctor Visit, Doctor Visit Completed, Completed
            $table->tinyInteger('consultation_type')->nullable(); //1 : Physical Consultation, 2 : Online Consultation
            $table->boolean('reschedule_status')->default(0);
            $table->boolean('additional_screening_status')->default(1);
            $table->date('additional_screening_date')->nullable();
            $table->string('additional_screening_time')->nullable();
            $table->string('doctorvisit_time')->nullable();
            $table->boolean('is_verified')->default(1); 
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
        Schema::dropIfExists('screening_dates');
    }
}
