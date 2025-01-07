<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateInsuranceClaimsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('insurance_claims', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id');
            $table->foreign('user_id')->references('id')->on('users')->onUpdate('cascade')->onDelete('cascade');
            $table->unsignedBigInteger('package_insurance_id');
            $table->foreign('package_insurance_id')->references('id')->on('package_insurance_coverages')->onUpdate('cascade')->onDelete('cascade');
            $table->string('slug')->unique();
            $table->float('claim_amount');
            $table->string('hand_written_letter')->nullable();
            $table->string('hand_written_letter_path')->nullable();
            $table->string('medical_report')->nullable();
            $table->string('medical_report_path')->nullable();
            $table->string('invoice')->nullable();
            $table->string('invoice_path')->nullable();
            $table->date('approved_date')->nullable();
            $table->date('setelled_date')->nullable();
            $table->date('rejected_date')->nullable();
            $table->unsignedBigInteger('claiming_user_id')->nullable();
            $table->foreign('claiming_user_id')->references('id')->on('users')->onUpdate('cascade')->onDelete('cascade');
            $table->unsignedBigInteger('userpackage_id');
            $table->foreign('userpackage_id')->references('id')->on('user_packages')->onUpdate('cascade')->onDelete('cascade');
            $table->enum('insurance_status',['Pending','Approved','Processing(Insurance Partner)','Processing(Insurance Company)','Processing(Claim Department)','Processing(Finance Department)','Processing(Forward To GD)','Claim Settelled','Rejected'])->default('Pending');
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
        Schema::dropIfExists('insurance_claims');
    }
}
