<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFamiliesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('families', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('family_id');
            $table->unsignedBigInteger('member_id');
            $table->string('family_relation')->nullable();
            $table->boolean('approved')->default(false);
            $table->boolean('primary_request')->default(false);
            $table->boolean('payment_status')->default(0); //0:unpaid family member, 1:paid family member
            $table->integer('online_consultation')->default(0);
            $table->boolean('additional_status')->default(0);
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
        Schema::dropIfExists('families');
    }
}
