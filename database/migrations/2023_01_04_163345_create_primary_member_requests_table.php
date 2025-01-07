<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePrimaryMemberRequestsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('primary_member_requests', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('family_id');
            $table->unsignedBigInteger('member_id');
            $table->unsignedBigInteger('newmember_id');
            $table->string('family_relation');
            $table->longText('change_reason');
            $table->tinyInteger('status')->default(0); //0 = change request(Pending), 1 = Approve by admin, 2 = Reject by admin
            $table->longText('reject_reason')->nullable();
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
        Schema::dropIfExists('primary_member_requests');
    }
}
