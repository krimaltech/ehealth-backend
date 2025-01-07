<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddExtraInformationToDoctorTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('doctor', function (Blueprint $table) {
            // $table->string('date_of_birth')->nullable();
            // $table->string('country')->nullable();
            // $table->string('nationality')->nullable();
            // $table->string('citizenship_issue_date')->nullable();
            // $table->string('citizenship_number')->nullable();
            // $table->longText('hospital_affiliations')->nullable();
            // $table->longText('experiences')->nullable();
            // $table->longText('awards_and_recognition')->nullable();
            // $table->longText('research_journal')->nullable();
            // $table->string('doctor_license')->nullable();
            // $table->string('doctor_license_path')->nullable();
            // $table->string('pan_number')->nullable();
            // $table->string('pan_number_path')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('doctor', function (Blueprint $table) {
            // $table->dropColumn('date_of_birth');
            // $table->dropColumn('country');
            // $table->dropColumn('nationality');
            // $table->dropColumn('citizenship_issue_date');
            // $table->dropColumn('citizenship_number');
            // $table->dropColumn('hospital_affiliations');
            // $table->dropColumn('experiences');
            // $table->dropColumn('awards_and_recognition');
            // $table->dropColumn('research_journal');
            // $table->dropColumn('doctor_license');
            // $table->dropColumn('doctor_license_path');
            // $table->dropColumn('pan_number');
            // $table->dropColumn('pan_number_path');
        });
    }
}
