<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePackageScreeningTeamsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('package_screening_teams', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('screeningdate_id');
            $table->unsignedBigInteger('employee_id');
            $table->string('type');
            $table->boolean('online_status')->default(0);
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
        Schema::dropIfExists('package_screening_teams');
    }
}
