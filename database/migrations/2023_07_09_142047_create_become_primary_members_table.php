<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBecomePrimaryMembersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('become_primary_members', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('family_id');
            $table->unsignedBigInteger('member_id');
            $table->unsignedBigInteger('newmember_id');
            $table->string('family_relation');
            $table->longText('change_reason');
            $table->tinyInteger('status')->default(0);  //0 = change request(Pending), 1 = Approve by admin, 2 = Reject by admin
            $table->longText('reject_reason')->nullable();
            $table->boolean('death_case')->default(0);
            $table->string('death_certificate')->nullable();
            $table->string('death_certificate_path')->nullable();
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
        Schema::dropIfExists('become_primary_members');
    }
}
