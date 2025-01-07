<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTestsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tests', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('service_id');
            $table->string('tests');
            $table->float('male_min_range')->nullable();
            $table->float('male_max_range')->nullable();
            $table->float('female_min_range')->nullable();
            $table->float('female_max_range')->nullable();
            $table->float('child_min_range')->nullable();
            $table->float('child_max_range')->nullable();
            $table->float('male_amber_min_range')->nullable();
            $table->float('male_amber_max_range')->nullable();
            $table->float('female_amber_min_range')->nullable();
            $table->float('female_amber_max_range')->nullable();
            $table->float('child_amber_min_range')->nullable();
            $table->float('child_amber_max_range')->nullable();
            $table->float('male_red_min_range')->nullable();
            $table->float('male_red_max_range')->nullable();
            $table->float('female_red_min_range')->nullable();
            $table->float('female_red_max_range')->nullable();
            $table->float('child_red_min_range')->nullable();
            $table->float('child_red_max_range')->nullable();
            $table->string('unit')->nullable();
            $table->string('price')->nullable();       
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
        Schema::dropIfExists('tests');
    }
}
