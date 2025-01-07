<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTripsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('trips', function (Blueprint $table) {
            $table->id();
            $table->date('date');
            $table->string('start_time');
            $table->string('end_time')->nullable();
            $table->unsignedBigInteger('notification_id');
            $table->unsignedBigInteger('driver_id');
            $table->unsignedBigInteger('user_id');
            $table->string('patient_name')->nullable();
            $table->string('patient_number')->nullable();
            $table->string('visitor_name')->nullable();
            $table->string('visitor_number')->nullable();
            $table->unsignedBigInteger('ambulamce_fare_id')->nullable();
            $table->unsignedBigInteger('medical_support')->nullable();
            $table->bigInteger('total_km_covered')->nullable();
            $table->bigInteger('total_time_consumed')->nullable();
            $table->date('payment_date')->nullable();
            $table->bigInteger('payment_amount')->nullable();
            $table->string('payment_method')->nullable();
            $table->bigInteger('extended_total_km_covered')->nullable();
            $table->bigInteger('extended_total_time_consumed')->nullable();
            $table->bigInteger('extended_payment_amount')->nullable();
            $table->string('extended_payment_method')->nullable();
            $table->unsignedBigInteger('status')->default(0);
            $table->string('driver_source_longitude',50);
            $table->string('driver_source_latitude',50);
            $table->string('destination_longitude',50)->nullable();
            $table->string('destination_latitude',50)->nullable();
            $table->string('extended_longitude',50)->nullable();
            $table->string('extended_latitude',50)->nullable();
            $table->string('hospital_name')->nullable();
            $table->string('doctor_name')->nullable();
            $table->string('hospitalization_file')->nullable();
            $table->string('hospitalization_file_path')->nullable();
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
        Schema::dropIfExists('trips');
    }
}