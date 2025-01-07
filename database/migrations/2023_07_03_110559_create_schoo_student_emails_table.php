<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSchooStudentEmailsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('schoo_student_emails', function (Blueprint $table) {
            $table->id();
            $table->string('member_id');
            $table->string('parent_email')->nullable();
            $table->string('parent_phone')->nullable();
            $table->string('year')->nullable();
            $table->string('class')->nullable();
            $table->string('section')->nullable();
            $table->string('roll')->nullable();
            $table->unsignedBigInteger('primary_member_id');
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
        Schema::dropIfExists('schoo_student_emails');
    }
}
