<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAdditionalPackagePaymentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('additional_package_payments', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('userpackage_id');
            $table->string('payment_days');
            $table->string('payment_method');
            $table->datetime('payment_date');
            $table->float('amount');
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
        Schema::dropIfExists('additional_package_payments');
    }
}
