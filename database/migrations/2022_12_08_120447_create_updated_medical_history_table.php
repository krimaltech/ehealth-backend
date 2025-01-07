<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUpdatedMedicalHistoryTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('updated_medical_history', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('member_id');
            $table->bigInteger('weight')->nullable();
            $table->bigInteger('height')->nullable();
            $table->string('blood_pressure')->nullable();
            $table->bigInteger('heart_rate')->nullable();
            $table->bigInteger('steps_count')->nullable();
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
        Schema::dropIfExists('updated_medical_history_tables');
    }
}
