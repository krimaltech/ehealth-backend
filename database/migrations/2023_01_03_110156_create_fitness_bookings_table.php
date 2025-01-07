<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFitnessBookingsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('fitness_bookings', function (Blueprint $table) {
            $table->id();
            $table->unsignedInteger('user_id');
            $table->string('slug');
            $table->unsignedInteger('membership_type');
            $table->date('booking_date');
            $table->date('joining_date')->nullable();
            $table->date('end_of_membership_date')->nullable();
            $table->date('payment_date')->nullable();
            $table->float('total_amount');
            $table->enum('payment_method',['cod','esewa','khalti'])->default('cod');
            $table->enum('payment_status',['paid','unpaid'])->default('unpaid');
            $table->enum('status',['pending','joined','expired','rejected'])->default('pending');
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
        Schema::dropIfExists('fitness_bookings');
    }
}
