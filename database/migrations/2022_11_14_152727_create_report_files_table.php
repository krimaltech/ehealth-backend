<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateReportFilesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('report_files', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('report_id');
            $table->foreign('report_id')->references('id')->on('upload_reports')->onUpdate('cascade')->onDelete('cascade');
            $table->string('report');
            $table->string('report_path');
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
        Schema::dropIfExists('report_files');
    }
}
