<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateInvestorsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('investors', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id')->unique();
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
            $table->string('slug');           
            $table->unsignedBigInteger('investor_type')->nullable();
            $table->unsignedBigInteger('discount_per')->nullable();
            $table->unsignedInteger('status')->default(1);
            $table->string('share_docs')->nullable();
            $table->string('share_docs_path')->nullable();
            $table->string('share_amt')->nullable();
            $table->string('letter')->nullable();
            $table->string('letter_path')->nullable();
            $table->string('investor_image')->nullable();
            $table->string('investor_image_path')->nullable();
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
        Schema::dropIfExists('investors');
    }
}
