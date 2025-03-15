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
        Schema::create('cfcs', function (Blueprint $table) {
            $table->id();
            $table->integer('user_id')->nullable();
            $table->string('ip')->nullable();
            $table->integer('service_id')->nullable();
            $table->date('aapale_sarkar_payment_date')->nullable();
            $table->string('status')->nullable();
            $table->string('application_no')->nullable();
            $table->boolean('is_payment_paid_aapale_sarkar')->default(0)->nullable();
            $table->text('status_remark')->nullable();
            $table->date('payment_date')->nullable();
            $table->boolean('is_payment_paid')->default(0)->nullable();
            $table->boolean('is_aapale_sarkar_payment_paid')->nullable();
            $table->string('applicant_name')->nullable();
            $table->string('email_id')->nullable();
            $table->string('mobile_no')->nullable();
            $table->string('zone')->nullable();
            $table->string('ward_area')->nullable();
            $table->string('pancard_number')->nullable();
            $table->string('aadhar_number')->nullable();
            $table->string('full_address')->nullable();
            $table->string('business_name')->nullable();
            $table->string('business_type')->nullable();
            $table->string('business')->nullable();
            $table->string('gst')->nullable();
            $table->string('area')->nullable();
            $table->date('date_commencement')->nullable();
            $table->string('address_est')->nullable();
            $table->string('advance_device')->nullable();
            $table->string('first_aid')->nullable();
            $table->string('numb_of_worker')->nullable();
            $table->string('number_of_women')->nullable();
            $table->string('number_of_men')->nullable();
            $table->string('other')->nullable();
            $table->string('gumasta_certificate')->nullable();
            $table->string('aadhar_pan')->nullable();
            $table->string('land_ownership')->nullable();
            $table->string('water_bill')->nullable();
            $table->string('no_objection_certificate')->nullable();
            $table->string('photo_of_place')->nullable();
            $table->string('property_tax')->nullable();
            $table->string('tenancy_agreement')->nullable();
            $table->string('site_occupancy')->nullable();
            $table->string('medical_certificate')->nullable();
            $table->string('pest_control')->nullable();
            $table->string('gst_registration')->nullable();
            $table->string('drug_administration')->nullable();
            $table->string('fire_rigade')->nullable();
            $table->string('liquor_license')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('cfcs');
    }
};
