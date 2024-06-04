<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('marriage_reg_bride_info', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('marriage_reg_form_id');
            $table->foreign('marriage_reg_form_id')->references('id')->on('marriage_reg_forms');

            $table->string('bride_info_fname_in_english')->nullable();
            $table->string('bride_info_mname_in_english')->nullable();
            $table->string('bride_info_lname_in_english')->nullable();
            $table->string('bride_info_fname_in_marathi')->nullable();
            $table->string('bride_info_mname_in_marathi')->nullable();
            $table->string('bride_info_lname_in_marathi')->nullable();
            $table->text('bride_info_address_in_english')->nullable();
            $table->text('bride_info_address_in_marathi')->nullable();
            $table->bigInteger('bride_info_pincode')->nullable();
            $table->string('bride_info_pincode_in_marathi')->nullable();
            $table->bigInteger('bride_info_mobile_no')->nullable();
            $table->string('bride_info_email')->nullable();
            $table->bigInteger('bride_info_aadhar_card_no')->nullable();
            $table->date('bride_info_dob')->nullable();
            $table->bigInteger('bride_info_age')->nullable();
            $table->string('bride_info_gender')->nullable();
            $table->string('bride_info_religion_by_birth')->nullable();
            $table->string('bride_info_religion_by_adoption')->nullable();
            $table->string('bride_info_photo')->nullable();
            $table->string('bride_info_id_proof')->nullable();
            $table->string('bride_info_residential_proof')->nullable();
            $table->string('bride_info_age_proof')->nullable();
            $table->string('bride_info_id_proof_file')->nullable();
            $table->string('bride_info_residential_proof_file')->nullable();
            $table->string('bride_info_age_proof_file')->nullable();
            $table->string('bride_info_upload_signature')->nullable();
            $table->string('bride_info_previous_status')->nullable();
            $table->string('bride_info_previous_status_proof')->nullable();
            $table->string('bride_info_upload_previous_status_proof')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('marriage_reg_bride_info');
    }
};
