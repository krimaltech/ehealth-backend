<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRequestScreeningsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('request_screenings', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('member_id');
            $table->foreign('member_id')->references('id')->on('members')->onUpdate('cascade')->onDelete('cascade');
            $table->unsignedBigInteger('userpackage_id');
            $table->foreign('userpackage_id')->references('id')->on('user_packages')->onUpdate('cascade')->onDelete('cascade');
            $table->unsignedBigInteger('screeningdate_id');
            $table->foreign('screeningdate_id')->references('id')->on('screening_dates')->onUpdate('cascade')->onDelete('cascade');
            $table->date('date');
            $table->string('time');
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
        Schema::dropIfExists('request_screenings');
    }
}
