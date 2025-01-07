<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMembersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('members', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('member_id');
            $table->string('gd_id')->unique()->nullable();
            $table->foreign('member_id')->references('id')->on('users')->onDelete('cascade');
            $table->string('gender')->nullable();
            $table->string('address')->nullable();
            $table->string('image')->nullable();
            $table->string('image_path')->nullable();
            $table->string('file')->nullable();
            $table->string('file_path')->nullable();
            $table->date('dob')->nullable();
            $table->string('blood_group')->nullable();
            $table->string('country')->nullable();
            $table->string('weight')->nullable();
            $table->string('height')->nullable();
            $table->string('slug')->unique();
            $table->string('member_type')->nullable();
            $table->string('bp')->nullable();
            $table->date('bp_updated_date')->nullable();
            $table->string('heart_rate')->nullable();
            $table->string('steps_count')->nullable();
            $table->string('height_feet')->nullable();
            $table->string('height_inch')->nullable();
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
        Schema::dropIfExists('members');
    }
}