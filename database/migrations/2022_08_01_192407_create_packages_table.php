<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePackagesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('packages', function (Blueprint $table) {
            $table->id();
            $table->string('slug')->unique();
            $table->tinyInteger('type')->nullable(); //1:budget, 2: premium, 3: corporate, 4: school
            $table->string('package_type');
            $table->longText('description');
            $table->integer('visits')->nullable();
            $table->string('registration_fee');
            $table->string('monthly_fee');
            $table->boolean('screening')->default(0);
            $table->boolean('checkup')->default(0);
            $table->boolean('ambulance')->default(0);
            $table->boolean('insurance')->default(0);
            $table->double('insurance_amount')->nullable();
            $table->integer('order');
            $table->boolean('schedule_flexibility')->default(0);
            $table->tinyInteger('schedule_times')->nullable();
            $table->integer('online_consultation')->nullable();
            $table->integer('tests')->nullable();
            $table->string('seo_keyword')->nullable();
            $table->string('seo_description')->nullable();
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
        Schema::dropIfExists('packages');
    }
}
