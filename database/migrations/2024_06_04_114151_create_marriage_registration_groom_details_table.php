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
        Schema::create('marriage_reg_groom_infos', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('marriage_reg_form_id');
            $table->foreign('marriage_reg_form_id')->references('id')->on('marriage_reg_forms');

            $table->string('groom_info_fname_in_english')->nullable();
            $table->string('groom_info_mname_in_english')->nullable();
            $table->string('groom_info_lname_in_english')->nullable();
            $table->string('groom_info_fname_in_marathi')->nullable();
            $table->string('groom_info_mname_in_marathi')->nullable();
            $table->string('groom_info_lname_in_marathi')->nullable();
            $table->text('groom_info_address_in_english')->nullable();
            $table->text('groom_info_address_in_marathi')->nullable();
            $table->string('groom_info_pincode')->nullable();
            $table->string('groom_info_pincode_in_marathi')->nullable();
            $table->string('groom_info_mobile_no')->nullable();
            $table->string('groom_info_email')->nullable();
            $table->string('groom_info_aadhar_card_no')->nullable();
            $table->date('groom_info_dob')->nullable();
            $table->string('groom_info_age')->nullable();
            $table->string('groom_info_gender')->nullable();
            $table->string('groom_info_religion_by_birth')->nullable();
            $table->string('groom_info_religion_by_adoption')->nullable();
            $table->string('groom_info_photo')->nullable();
            $table->string('groom_info_id_proof')->nullable();
            $table->string('groom_info_residential_proof')->nullable();
            $table->string('groom_info_age_proof')->nullable();
            $table->string('groom_info_id_proof_file')->nullable();
            $table->string('groom_info_residential_proof_file')->nullable();
            $table->string('groom_info_age_proof_file')->nullable();
            $table->string('groom_info_upload_signature')->nullable();
            $table->string('groom_info_previous_status')->nullable();
            $table->string('groom_info_previous_status_proof')->nullable();
            $table->string('groom_info_upload_previous_status_proof')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('marriage_reg_groom_infos');
    }
};
