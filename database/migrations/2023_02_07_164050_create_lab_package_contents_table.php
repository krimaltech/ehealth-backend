<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateLabPackageContentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('lab_package_contents', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('labpackage_id');
            $table->foreign('labpackage_id')->references('id')->on('lab_packages')->onDelete('cascade')->onUpdate('cascade');
            $table->unsignedBigInteger('labprofile_id')->nullable();
            $table->unsignedBigInteger('labtest_id')->nullable();
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
        Schema::dropIfExists('lab_package_contents');
    }
}
