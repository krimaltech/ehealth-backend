<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUserPackagesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('user_packages', function (Blueprint $table) {
            $table->id();
            $table->string('slug')->unique();
            $table->unsignedBigInteger('familyname_id')->nullable();
            $table->unsignedBigInteger('member_id')->nullable();
            $table->unsignedBigInteger('package_id');
            $table->foreign('package_id')->references('id')->on('packages')->onUpdate('cascade')->onDelete('cascade');
            $table->unsignedBigInteger('family_id');
            $table->boolean('status')->default(0); //payment_status
            $table->string('package_status'); //Not Booked, Booked, Pending, Activated, Deactivated, Expired, Renewed
            $table->tinyInteger('renew_status');
            $table->date('booked_date')->nullable();
            $table->date('expiry_date')->nullable();
            $table->tinyInteger('grace_period')->default(0); //0:no grace period,1:in grace period, 2:exceeded
            $table->integer('year')->default(1);
            $table->date('activated_date')->nullable();
            $table->integer('additonal_members')->default(0);
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
        Schema::dropIfExists('user_packages');
    }
}
