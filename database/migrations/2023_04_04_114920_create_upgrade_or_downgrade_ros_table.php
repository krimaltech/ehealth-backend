<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUpgradeOrDowngradeRosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('upgrade_or_downgrade_ros', function (Blueprint $table) {
            $table->id();
            $table->unsignedInteger('relation_manager_id');
            $table->longText('reason');
            $table->string('level_file');
            $table->string('level_file_path');
            $table->string('status')->nullable();
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
        Schema::dropIfExists('upgrade_or_downgrade_ros');
    }
}
