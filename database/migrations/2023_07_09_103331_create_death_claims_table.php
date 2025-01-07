<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDeathClaimsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('death_claims', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id');
            $table->foreign('user_id')->references('id')->on('users')->onUpdate('cascade')->onDelete('cascade');
            $table->unsignedBigInteger('package_insurance_id');
            $table->foreign('package_insurance_id')->references('id')->on('package_insurance_coverages')->onUpdate('cascade')->onDelete('cascade');
            $table->string('name');
            $table->string('email')->nullable();
            $table->string('phone');
            $table->string('claiming_name');
            $table->string('claiming_email')->nullable();
            $table->string('claiming_phone');
            $table->string('relationship_certificate');
            $table->string('relationship_certificate_path');
            $table->string('death_certificate');
            $table->string('death_certificate_path');
            $table->date('approved_date')->nullable();
            $table->date('setelled_date')->nullable();
            $table->date('rejected_date')->nullable();
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
        Schema::dropIfExists('death_claims');
    }
}
