<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOnlineConsultationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('online_consultations', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('screeningdate_id');
            $table->unsignedBigInteger('member_id');
            $table->string('start_time');
            $table->string('join_url');
            $table->longText('start_url');
            $table->bigInteger('meeting_id');
            $table->string('meeting_password');
            $table->boolean('status')->default(0);
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
        Schema::dropIfExists('online_consultations');
    }
}
