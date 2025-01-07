<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePackagePaymentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('package_payments', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('userpackage_id');
            $table->string('payment_interval');
            $table->string('payment_method');
            $table->datetime('payment_date')->nullable();
            $table->date('expiry_date')->nullable();
            $table->float('monthly_amount')->nullable();
            $table->float('amount');
            $table->integer('grace_days')->nullable();
            $table->boolean('prepay_status')->nullable();
            $table->integer('prepay_days')->nullable();
            $table->unsignedBigInteger('paidmember_id')->nullable();
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
        Schema::dropIfExists('package_payments');
    }
}
