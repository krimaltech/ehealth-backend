<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBookLabtestReportsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('book_labtest_reports', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('book_id');
            $table->foreign('book_id')->references('id')->on('book_labtests')->onUpdate('cascade')->onDelete('cascade');
            $table->unsignedBigInteger('labtest_id')->nullable();
            $table->foreign('labtest_id')->references('id')->on('lab_tests')->onDelete('cascade')->onUpdate('cascade');     
            $table->unsignedBigInteger('labvalue_id')->nullable();
            $table->foreign('labvalue_id')->references('id')->on('lab_values')->onDelete('cascade')->onUpdate('cascade');     
            $table->float('min_range')->nullable();
            $table->float('max_range')->nullable();
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
        Schema::dropIfExists('book_labtest_reports');
    }
}
