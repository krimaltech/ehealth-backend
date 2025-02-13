<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTeamsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('teams', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('category_id');
            $table->foreign('category_id')->references('id')->on('team_categories')->onUpdate('cascade')->onDelete('cascade');
            $table->string('slug')->unique();
            $table->string('member_id');
            $table->string('position');
            $table->string('name');
            $table->string('email');
            $table->string('phone_no');
            $table->string('address');
            $table->string('image');
            $table->string('image_path');
            $table->boolean('status')->default(1);
            $table->unsignedInteger('is_user')->nullable();
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
        Schema::dropIfExists('teams');
    }
}
