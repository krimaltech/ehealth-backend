<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateVendorsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('vendors', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('vendor_id')->unique();
            $table->string('store_name');
            $table->foreign('vendor_id')->references('id')->on('users')->onDelete('cascade');
            $table->unsignedBigInteger('vendor_type');
            $table->unsignedInteger('is_exculsive')->default(1);
            $table->string('image')->nullable();
            $table->string('image_path')->nullable();
            $table->string('file')->nullable();
            $table->string('file_path')->nullable();
            $table->string('agreement_file')->nullable();
            $table->string('agreement_file_path')->nullable();
            $table->string('address');
            $table->float('total_rating')->default(0);
            $table->float('averageRating')->default(0);
            $table->string('follower_count')->default(0);
            $table->string('slug')->unique();
            $table->string('tax')->nullable();
            $table->string('tax_path')->nullable();
            $table->string('ird')->nullable();
            $table->string('ird_path')->nullable();
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
        Schema::dropIfExists('vendors');
    }
}