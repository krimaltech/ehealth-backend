<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOnlineConsultationMeetingsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('online_consultation_meetings', function (Blueprint $table) {
            $table->id();
            $table->string('topic');
            $table->string('start_time');
            $table->string('agenda');
            $table->string('join_url');
            $table->longText('start_url');
            $table->bigInteger('meeting_id');
            $table->string('meeting_password');
            $table->boolean('status')->default(0);
            $table->integer('member_id');
            $table->string('end_time')->nullable();
            $table->unsignedInteger('doctor_id')->nullable();
            $table->longText('history')->nullable();
            $table->longText('examination')->nullable();
            $table->longText('treatment')->nullable();
            $table->longText('progress')->nullable();
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
        Schema::dropIfExists('online_consultation_meetings');
    }
}
