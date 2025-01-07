<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateIncentiveManagersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('incentive_managers', function (Blueprint $table) {
            $table->id();
            $table->unsignedInteger('incentive_receiver');
            $table->string('incentive_percentage');
            $table->bigInteger('minimum');
            $table->string('package_type');
            $table->longText('maximum')->nullable();
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
        Schema::dropIfExists('incentive_managers');
    }
}
