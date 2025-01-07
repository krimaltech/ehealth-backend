<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMedicalReportsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('medical_reports', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('member_id');
            $table->foreign('member_id')->references('id')->on('members')->onDelete('cascade')->onUpdate('cascade');
            $table->unsignedBigInteger('screeningdate_id');
            $table->unsignedBigInteger('collected_by')->nullable();
            $table->unsignedBigInteger('lab_id')->nullable();
            $table->unsignedBigInteger('verified_by')->nullable();
            $table->string('sample_no');
            $table->datetime('sample_date')->nullable();
            $table->datetime('deposited_date')->nullable();
            $table->datetime('report_date')->nullable();
            $table->datetime('consultation_report_date')->nullable();
            $table->longText('skip_reason')->nullable();
            $table->longText('sample_info')->nullable();
            $table->string('status'); //Sample to be collected, Skipped, Sample Collected, Sample Deposited, Draft Report, Report Published, Report Verified , Doctor Visit , Consultation Report , Consultation Skipped, Completed
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
        Schema::dropIfExists('medical_reports');
    }
}
