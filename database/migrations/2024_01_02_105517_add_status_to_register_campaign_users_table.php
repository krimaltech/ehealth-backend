<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddStatusToRegisterCampaignUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('register_campaign_users', function (Blueprint $table) {
            $table->tinyInteger('status')->nullable(); //1:newly added, 2:report generated, 3: report sent
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('register_campaign_users', function (Blueprint $table) {
            $table->dropColumn('status');
        });
    }
}
