<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateVendorAgreementsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('vendor_agreements', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('vendor_id');
            $table->foreign('vendor_id')->references('id')->on('vendors')->onUpdate('cascade')->onDelete('cascade');
            $table->string('registration_no');
            $table->string('company_contact');
            $table->string('guarantor_name');
            $table->string('guarantor_address');
            $table->string('guarantor_contact');
            $table->string('nominator_name');
            $table->string('nominator_address');
            $table->string('nominator_contact');
            $table->string('membership_time_frame');
            $table->integer('membership_fee');
            $table->string('payment_time_frame');
            $table->string('termination_time_frame');
            $table->date('commencement_date')->nullable();
            $table->tinyInteger('status')->default(0);
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
        Schema::dropIfExists('vendor_agreements');
    }
}
