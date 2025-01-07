<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCompanySchoolProfilesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('company_school_profiles', function (Blueprint $table) {
            $table->id();
            $table->unsignedInteger('member_id')->nullable();
            $table->string('owner_name')->nullable();
            $table->string('company_name')->nullable();
            $table->string('company_address')->nullable();
            $table->string('company_start_date')->nullable();
            $table->longText('description')->nullable();
            $table->string('pan_number')->nullable();
            $table->string('contact_number')->nullable();
            $table->string('company_image')->nullable();
            $table->string('company_image_path')->nullable();
            $table->string('paper_work_pdf')->nullable();
            $table->string('paper_work_pdf_path')->nullable();
            $table->string('types')->nullable();
            $table->string('user_name')->nullable();
            $table->string('status')->nullable();
            $table->longText('reject_reason')->nullable();
            $table->string('school_regd_file')->nullable();
            $table->string('school_regd_file_path')->nullable();
            $table->string('longitude')->nullable();
            $table->string('latitude')->nullable();
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
        Schema::dropIfExists('company_school_profiles');
    }
}
