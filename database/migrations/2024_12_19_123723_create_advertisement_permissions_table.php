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
        Schema::create('advertisement_permissions', function (Blueprint $table) {
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
            $table->string('application')->nullable();
            $table->string('owner_land')->nullable();
            $table->string('society_letter')->nullable();
            $table->string('resolution_soc')->nullable();
            $table->string('light_bill')->nullable();
            $table->string('structural_engineer')->nullable();
            $table->string('stability_certificate')->nullable();
            $table->string('police_noc')->nullable();
            $table->string('location_plan')->nullable();
            $table->string('site_dtp')->nullable();
            $table->string('taking_i')->nullable();
            $table->string('taking_ii')->nullable();
            $table->string('advertising_insurance')->nullable();
            $table->string('advertising_size')->nullable();
            $table->string('rental_agreement')->nullable();
            $table->timestamps();
            $table->string('applicant')->nullable();
            $table->string('applicant_object')->nullable();
            $table->string('statuss')->nullable();
            $table->string('faxid')->nullable();
            $table->string('advertisement_medium')->nullable();
            $table->string('advertisement_type')->nullable();
            $table->string('format')->nullable();
            $table->string('displaying_sign')->nullable();
            $table->string('length_foot')->nullable();
            $table->string('length_meter')->nullable();
            $table->string('width_foot')->nullable();
            $table->string('width_meter')->nullable();
            $table->string('total_foot')->nullable();
            $table->string('total_meter')->nullable();
            $table->string('land_owner')->nullable();
            $table->string('no_objection_certificates')->nullable();
            $table->string('rule_19')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('advertisement_permissions');
    }
};
