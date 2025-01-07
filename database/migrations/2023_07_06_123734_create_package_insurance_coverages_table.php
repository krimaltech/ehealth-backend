<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePackageInsuranceCoveragesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('package_insurance_coverages', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('package_id');   
            $table->foreign('package_id')->references('id')->on('packages')->onUpdate('cascade')->onDelete('cascade');   
            $table->unsignedBigInteger('insurance_type_id'); 
            $table->foreign('insurance_type_id')->references('id')->on('insurance_types')->onUpdate('cascade')->onDelete('cascade');         
            $table->string('amount');
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
        Schema::dropIfExists('package_insurance_coverages');
    }
}
