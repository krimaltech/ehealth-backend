<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTransactionStatementsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('transaction_statements', function (Blueprint $table) {
            $table->id();
            $table->unsignedInteger('user_id');
            $table->string('date');
            $table->string('name');
            $table->string('address');
            $table->string('amount');
            $table->string('status');
            $table->string('payment_method');
            $table->string('channel');
            $table->string('service_name');
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
        Schema::dropIfExists('transaction_statements');
    }
}
