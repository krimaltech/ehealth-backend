<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateKnowYourCustomersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('know_your_customers', function (Blueprint $table) {
            $table->id();
            $table->string('slug')->unique();
            $table->unsignedBigInteger('user_id');
            $table->string('salutation',20);
            $table->string('first_name',50);
            $table->string('middle_name',50)->nullable();
            $table->string('last_name',50);
            $table->string('gender',20);
            $table->string('nationality',30);
            $table->date('birth_date',20);
            $table->string('account_branch',50);
            $table->string('currency',20);
            $table->string('mobile_number',30);
            $table->string('email',50);
            $table->string('country',30);
            //temporary address
            $table->string('temp_house_number',20)->nullable();
            $table->unsignedBigInteger('temp_province_id')->nullable();
            $table->unsignedBigInteger('temp_district_id')->nullable();
            $table->unsignedBigInteger('temp_municipality_id')->nullable();
            $table->unsignedBigInteger('temp_ward_id')->nullable();
            $table->string('temp_location',50)->nullable();

            //permanent address
            $table->string('perm_house_number',20)->nullable();
            $table->unsignedBigInteger('perm_province_id')->nullable();
            $table->unsignedBigInteger('perm_district_id')->nullable();
            $table->unsignedBigInteger('perm_municipality_id')->nullable();
            $table->unsignedBigInteger('perm_ward_id')->nullable();
            $table->string('perm_location',50)->nullable();

            //occupation
            $table->string('work_status',50)->nullable();
            $table->string('account_purpose')->nullable();
            $table->string('source_of_income',100)->nullable();
            $table->string('annual_income',30)->nullable();
            $table->string('occupation',50)->nullable();
            $table->string('pan_number',20)->nullable();
            $table->string('organization_name',100)->nullable();
            $table->string('designation',50)->nullable();
            $table->string('organization_address',50)->nullable();
            $table->string('organization_number',20)->nullable();

            // family details
            $table->string('father_full_name',80)->nullable();
            $table->string('mother_full_name',80)->nullable();
            $table->string('grandfather_full_name',80)->nullable();
            $table->string('grandmother_full_name',80)->nullable();
            $table->string('husband_wife_full_name',80)->nullable();
            $table->string('marital_status',20)->nullable();

            //transaction
            $table->string('max_amount_per_tansaction',30)->nullable();
            $table->string('number_of_monthly_transaction',30)->nullable();
            $table->string('monthly_amount_of_transaction',30)->nullable();
            $table->string('number_of_yearly_transaction',30)->nullable();
            $table->string('yearly_amount_of_transaction',30)->nullable();

            //education
            $table->string('education',50)->nullable();
            //identification details
            $table->string('identification_type',50)->nullable();
            $table->string('identification_no',50)->nullable();
            $table->date('citizenship_date')->nullable();
            $table->string('citizenship_issue_district',50)->nullable();

            //nominee details
            $table->string('nominee_name',80)->nullable();
            $table->string('nominee_father_name',80)->nullable();
            $table->string('nominee_grandfather_name',80)->nullable();
            $table->string('nominee_relation',40)->nullable();
            $table->string('nominee_citizenship_issued_place',40)->nullable();
            $table->string('nominee_citizenship_number',40)->nullable();
            $table->date('nominee_citizenship_issued_date')->nullable();
            $table->date('nominee_birthdate')->nullable();
            $table->string('nominee_permanent_address',80)->nullable();
            $table->string('nominee_current_address',80)->nullable();
            $table->string('nominee_phone_number',20)->nullable();

            //beneficiary details
            $table->string('beneficiary_name',80)->nullable();
            $table->string('beneficiary_address',80)->nullable();
            $table->string('beneficiary_contact_number',20)->nullable();
            $table->string('beneficiary_relation',30)->nullable();

            //clecklist
            $table->boolean('are_you_nrn')->default(0)->nullable();
            $table->boolean('us_citizen')->default(0)->nullable();
            $table->boolean('us_residence')->default(0)->nullable();
            $table->boolean('criminal_offence')->default(0)->nullable();
            $table->boolean('green_card')->default(0)->nullable();
            $table->boolean('account_in_other_banks')->default(0)->nullable();
            $table->string('service_form')->nullable();

            //documents
            $table->string('self_image')->nullable();
            $table->string('self_image_path')->nullable();
            $table->string('citizenship_front')->nullable();
            $table->string('citizenship_front_path')->nullable();
            $table->string('citizenship_back')->nullable();
            $table->string('citizenship_back_path')->nullable();

            $table->string('latitude',80)->nullable();
            $table->string('longitude',80)->nullable();
            $table->string('form_status',80)->nullable();
            $table->enum('status', ['Pending', 'Rejected', 'Active'])->default('Pending');
            $table->text('reject_reason')->nullable();
            $table->string('insurance_file')->nullable();
            $table->string('insurance_file_path')->nullable();
            $table->string('nic_file')->nullable();
            $table->string('nic_file_path')->nullable();

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
        Schema::dropIfExists('know_your_customers');
    }
}
