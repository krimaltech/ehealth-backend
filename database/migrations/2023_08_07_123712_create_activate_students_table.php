<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateActivateStudentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('activate_students', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('profile_id');
            $table->foreign('profile_id')->references('id')->on('company_school_profiles')->onUpdate('cascade')->onDelete('cascade');
            $table->unsignedBigInteger('deactivate_student_id');
            $table->foreign('deactivate_student_id')->references('id')->on('deactivate_student_lists')->onUpdate('cascade')->onDelete('cascade');
            $table->tinyInteger('status')->default(0); //0:pending,1:approved,2:rejected
            $table->longText('activate_reason');
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
        Schema::dropIfExists('activate_students');
    }
}
