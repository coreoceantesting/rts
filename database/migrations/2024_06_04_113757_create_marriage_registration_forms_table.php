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
        Schema::create('marriage_reg_forms', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id');
            $table->foreign('user_id')->references('id')->on('users');
            $table->string('mp_id')->nullable();
            $table->string('application_no')->nullable();
            $table->string('registration_from_applicant_mobile_no')->nullable();
            $table->string('registration_from_applicant_full_name')->nullable();
            $table->text('registration_from_applicant_home_address')->nullable();
            $table->string('registration_from_pincode')->nullable();
            $table->string('registration_from_applicant_email')->nullable();
            $table->string('registration_from_aadhar_card_no')->nullable();
            $table->string('registration_from_alternate_mobile_number')->nullable();
            $table->string('registration_from_pan_card_no')->nullable();
            $table->string('registration_from_residential_ward_name')->nullable();
            $table->string('registration_from_marriage_solemnized_within_maharashtra_state')->nullable();
            $table->string('registration_from_affidavit_for_marriage_outside_maharashtra')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('marriage_reg_forms');
    }
};
