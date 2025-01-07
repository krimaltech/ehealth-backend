<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCampaignsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('campaigns', function (Blueprint $table) {
            $table->id();
            $table->string('slug')->unique();
            $table->string('campaign_no')->unique();
            $table->string('campaign_type'); //Family, School, Corporate
            $table->string('title');
            $table->longText('description');
            $table->string('address');
            $table->string('venue');
            $table->dateTime('start_date');
            $table->dateTime('end_date');
            $table->string('image')->nullable();
            $table->string('image_path')->nullable();
            $table->boolean('status')->default(1);
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
        Schema::dropIfExists('campaigns');
    }
}
