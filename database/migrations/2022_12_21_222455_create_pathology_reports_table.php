<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePathologyReportsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pathology_reports', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('report_id')->nullable();
            $table->foreign('report_id')->references('id')->on('medical_reports')->onDelete('cascade')->onUpdate('cascade');     
            $table->unsignedBigInteger('test_id')->nullable();
            $table->unsignedBigInteger('labvalue_id')->nullable();
            $table->float('min_range')->nullable();
            $table->float('max_range')->nullable();
            $table->float('amber_min_range')->nullable();
            $table->float('amber_max_range')->nullable();
            $table->float('red_min_range')->nullable();
            $table->float('red_max_range')->nullable();
            $table->float('value')->nullable();
            $table->longText('result')->nullable();
            $table->string('report')->nullable();
            $table->string('report_path')->nullable();
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
        Schema::dropIfExists('pathology_reports');
    }
}
