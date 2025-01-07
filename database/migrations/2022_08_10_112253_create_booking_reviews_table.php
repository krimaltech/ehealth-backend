<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBookingReviewsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('booking_reviews', function (Blueprint $table) {
            $table->id();
            $table->string('slug')->unique();
            $table->unsignedBigInteger('user_id');
            $table->foreign('user_id')->references('id')->on('users')->onUpdate('cascade')->onDelete('cascade');
            $table->unsignedBigInteger('booking_id');
            $table->unsignedBigInteger('doctor_id');
            $table->string('doctor_service_type');
            $table->foreign('booking_id')->references('id')->on('slots')->onUpdate('cascade')->onDelete('cascade');
            $table->longText('messages');
            $table->string('booking_status'); //Not Scheduled, Scheduled, Cancelled, Rejected, Slot Unavailable, Slot Expired
            $table->boolean('status')->default(0);
            $table->string('payment_method')->nullable();
            $table->date('payment_date')->nullable();
            $table->longText('cancel_reason')->nullable();
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
        Schema::dropIfExists('booking_reviews');
    }
}