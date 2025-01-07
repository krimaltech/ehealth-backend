<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateNurseBookingsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('nurse_bookings', function (Blueprint $table) {
            $table->id();
            $table->string('slug')->unique();
            $table->unsignedBigInteger('member_id');
            $table->unsignedBigInteger('nurseshift_id');
            $table->longText('messages');
            $table->enum('booking_status',['Not Scheduled','Scheduled','Completed','Cancelled','Rejected']);
            $table->boolean('status')->default(0);
            $table->string('payment_method')->nullable();
            $table->date('payment_date')->nullable();
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
        Schema::dropIfExists('nurse_bookings');
    }
}
