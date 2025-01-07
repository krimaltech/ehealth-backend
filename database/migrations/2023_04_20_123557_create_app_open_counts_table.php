<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAppOpenCountsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('app_open_counts', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('app_id');
            $table->foreign('app_id')->references('id')->on('app_analytics')->onUpdate('cascade')->onDelete('cascade');
            $table->bigInteger('count');
            $table->boolean('status')->default(0);
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
        Schema::dropIfExists('app_open_counts');
    }
}
