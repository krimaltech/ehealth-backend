<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRelationManagersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('relation_managers', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id');
            $table->unsignedBigInteger('marketing_supervisor_id')->nullable();
            $table->foreign('user_id')->references('id')->on('users');
            $table->foreign('marketing_supervisor_id')->references('id')->on('employees');
            $table->string('slug');
            $table->string('gender');
            $table->string('address');
            $table->string('rm_tag')->nullable();
            $table->string('image')->nullable();
            $table->string('image_path')->nullable();
            $table->string('file')->nullable();
            $table->string('file_path')->nullable();
            $table->string('agreement_file')->nullable();
            $table->string('agreement_file_path')->nullable();
            $table->string('status')->nullable()->default('pending');
            $table->longText('reject_reason')->nullable();
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
        Schema::dropIfExists('relation_managers');
    }
}
