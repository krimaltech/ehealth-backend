<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUploadMedicalHistoryConsultationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('upload_medical_history_consultations', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('member_id')->nullable();
            $table->unsignedBigInteger('doctor_id')->nullable();
            $table->date('check_date')->nullable();
            $table->string('hospital')->nullable();
            $table->string('doctor_name')->nullable();
            $table->string('doctor_nmc')->nullable();
            $table->longText('observation')->nullable();
            $table->longText('finding')->nullable();
            $table->longText('medication')->nullable();
            $table->longText('reject_reason')->nullable();
            $table->unsignedInteger('status')->nullable();
            $table->longText('doctor_reject_reason')->nullable();
            $table->unsignedInteger('department_id')->nullable();
            $table->string('is_other')->nullable();
            $table->unsignedInteger('is_packaged')->default(0);
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
        Schema::dropIfExists('upload_medical_history_consultations');
    }
}
