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
        Schema::create('transfer_property_certificates', function (Blueprint $table) {
            $table->id();
            $table->integer('user_id')->nullable();
            $table->boolean('is_aapale_sarkar_payment_paid')->nullable();
            $table->boolean('applicant_full_name')->nullable();
            $table->string('applicant_full_address')->nullable();
            $table->string('applicant_mobile_no')->nullable();
            $table->string('email_id')->nullable();
            $table->string('aadhar_no')->nullable();
            $table->string('property_owner_name')->nullable();
            $table->text('property_address')->nullable();
            $table->string('survey_number')->nullable();
            $table->string('zone')->nullable();
            $table->string('ward_area')->nullable();
            $table->string('property_no')->nullable();
            $table->string('house_no')->nullable();
            $table->date('date_of_notice')->nullable();
            $table->date('date_of_documentation')->nullable();
            $table->string('name_of_seller')->nullable();
            $table->string('name_of_buyer')->nullable();
            $table->double('compensation_amount', 7, 2)->nullable();
            $table->string('what_are_they')->nullable();
            $table->date('date_of_registration_document')->nullable();
            $table->string('place')->nullable();
            $table->integer('no_from_determined_book')->nullable();
            $table->string('no_of_officer')->nullable();
            $table->string('length_width_of_land')->nullable();
            $table->string('border')->nullable();
            $table->string('uploaded_application')->nullable();
            $table->string('certificate_of_no_dues')->nullable();
            $table->string('copy_of_document')->nullable();
            $table->text('remark')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('transfer_property_certificates');
    }
};
