<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBookLabtestsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('book_labtests', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('member_id');
            $table->foreign('member_id')->references('id')->on('members')->opUpdate('cascade')->onDelete('cascade');
            $table->unsignedBigInteger('labtechnician_id')->nullable();
            $table->foreign('labtechnician_id')->references('id')->on('employees')->opUpdate('cascade')->onDelete('cascade');
            $table->unsignedBigInteger('labprofile_id')->nullable();
            $table->foreign('labprofile_id')->references('id')->on('lab_profiles')->opUpdate('cascade')->onDelete('cascade');
            $table->unsignedBigInteger('labtest_id')->nullable();
            $table->foreign('labtest_id')->references('id')->on('lab_tests')->opUpdate('cascade')->onDelete('cascade');
            $table->date('date');
            $table->string('time');
            $table->string('booking_status');
            $table->boolean('status')->default(0);
            $table->string('price')->default(0);
            $table->string('payment_method')->nullable();
            $table->date('payment_date')->nullable();
            $table->string('sample_no')->nullable();
            $table->datetime('sample_date')->nullable();
            $table->datetime('report_date')->nullable();
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
        Schema::dropIfExists('book_labtests');
    }
}
