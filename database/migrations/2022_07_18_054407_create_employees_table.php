<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEmployeesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('employees', function (Blueprint $table) {
            $table->id();
            $table->string('employee_code')->unique()->nullable();
            $table->string('slug')->unique();
            $table->string('gd_id')->unique()->nullable();
            $table->unsignedBigInteger('employee_id');
            $table->unsignedBigInteger('head_employee_id')->nullable();
            $table->foreign('employee_id')->references('id')->on('users')->onDelete('cascade');
            $table->string('gender')->nullable();           
            $table->string('address')->nullable();
            $table->string('nmc_no')->nullable();
            $table->string('nnc_no')->nullable();
            $table->unsignedBigInteger('department')->nullable();
            $table->unsignedBigInteger('sub_role_id')->nullable();
            $table->string('salutation')->nullable();
            $table->string('qualification')->nullable();
            $table->string('year_practiced')->nullable();
            $table->string('specialization')->nullable();
            $table->string('hospital')->nullable();
            $table->string('image')->nullable();
            $table->string('image_path')->nullable();
            $table->string('file')->nullable();
            $table->string('file_path')->nullable();
            $table->unsignedInteger('is_user')->nullable();
            $table->boolean('status')->default(1);
            $table->unsignedBigInteger('percentage')->nullable();
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
        Schema::dropIfExists('employees');
    }
}