<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOurServicesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('our_services', function (Blueprint $table) {
            $table->id();
            $table->string('slug')->unique();
            $table->string('service_title');
            $table->longText('short_description')->nullable();
            $table->longText('long_description')->nullable();
            $table->string('image')->nullable();
            $table->string('image_path')->nullable();
            $table->string('icon')->nullable();
            $table->string('icon_path')->nullable();
            $table->boolean('status')->default(1);
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
        Schema::dropIfExists('our_services');
    }
}
