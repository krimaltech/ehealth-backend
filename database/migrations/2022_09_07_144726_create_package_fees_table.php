<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePackageFeesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('package_fees', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('package_id');
            $table->foreign('package_id')->references('id')->on('packages')->onUpdate('cascade')->onDelete('cascade');
            $table->integer('family_size');
            $table->integer('one_registration_fee');
            $table->integer('one_monthly_fee');

            // $table->integer('one_registration_fee');
            // $table->integer('two_continuation_fee');
            // $table->integer('three_continuation_fee');
            // $table->integer('one_monthly_fee');
            // $table->integer('two_monthly_fee');
            // $table->integer('three_monthly_fee');
            
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
        Schema::dropIfExists('package_fees');
    }
}
