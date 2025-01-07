<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBookServicesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('book_services', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('member_id');
            $table->foreign('member_id')->references('id')->on('members')->opUpdate('cascade')->onDelete('cascade');
            $table->unsignedBigInteger('labtechnician_id')->nullable();
            $table->foreign('labtechnician_id')->references('id')->on('employees')->opUpdate('cascade')->onDelete('cascade');
            $table->unsignedBigInteger('service_id');
            $table->foreign('service_id')->references('id')->on('services')->opUpdate('cascade')->onDelete('cascade');
            $table->date('date');
            $table->string('time');
            $table->enum('booking_status',['Not Scheduled','Scheduled','Completed','Cancelled','Rejected']);
            $table->boolean('status')->default(0);
            $table->string('price')->default(0);
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
        Schema::dropIfExists('book_services');
    }
}
