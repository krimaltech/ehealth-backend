<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateScreeningTestsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('screening_tests', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('package_screening_id');
            $table->foreign('package_screening_id')->references('id')->on('package_screenings')->onUpdate('cascade')->onDelete('cascade');
            $table->unsignedBigInteger('labtest_id');
            $table->foreign('labtest_id')->references('id')->on('lab_tests')->onUpdate('cascade')->onDelete('cascade');
            $table->boolean('man');
            $table->boolean('woman');
            $table->boolean('child');
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
        Schema::dropIfExists('screening_tests');
    }
}
