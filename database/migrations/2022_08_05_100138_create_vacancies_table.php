<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateVacanciesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('vacancies', function (Blueprint $table) {
            $table->id();
            $table->string('slug')->unique();
            $table->string('job_title');
            $table->longText('job_description')->nullable();
            $table->longText('job_responsibility')->nullable();
            $table->longText('job_requirements');
            $table->string('job_type');
            $table->integer('no_of_vacancy');
            $table->string('experience');
            $table->date('job_deadline');
            $table->boolean('status')->default(0);
            $table->string('form_link')->nullable(); //google form link
            $table->string('salary')->nullable();
            $table->string('salary_range')->nullable();
            $table->string('education_level')->nullable();
            $table->string('job_location')->nullable();
            $table->integer('order')->nullable();
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
        Schema::dropIfExists('vacancies');
    }
}
