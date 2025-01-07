<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddAdviceToOphthalmologistScreeningFormsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('ophthalmologist_screening_forms', function (Blueprint $table) {
            $table->string('advice')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('ophthalmologist_screening_forms', function (Blueprint $table) {
            $table->dropColumn('advice');
        });
    }
}
