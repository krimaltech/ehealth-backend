<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSkipTestsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('skip_tests', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('report_id');
            $table->foreign('report_id')->references('id')->on('medical_reports')->onDelete('cascade')->onUpdate('cascade');     
            $table->unsignedInteger('labprofile_id')->nullable();
            $table->unsignedInteger('labtest_id')->nullable();
            $table->longText('skip_reason');
            $table->boolean('upload_status')->default(0);
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
        Schema::dropIfExists('skip_tests');
    }
}
