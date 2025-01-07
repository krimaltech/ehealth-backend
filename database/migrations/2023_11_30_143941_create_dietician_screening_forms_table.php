<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDieticianScreeningFormsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('dietician_screening_forms', function (Blueprint $table) {
            $table->id();
            $table->unsignedInteger('campaign_user_id');
            $table->unsignedInteger('register_campaign_user_id');
            $table->unsignedInteger('doctor_id');
            $table->longText('chief_complaint')->nullable();
            $table->string('how_eat_daily')->nullable();
            $table->string('what_eat_daily')->nullable();
            $table->string('junk_food')->nullable();
            $table->string('extracurricular')->nullable();
            $table->longText('problems')->nullable();
            $table->longText('dietary_management')->nullable();
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
        Schema::dropIfExists('dietician_screening_forms');
    }
}
