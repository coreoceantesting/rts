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
        Schema::create('trade_per_licenses', function (Blueprint $table) {
            $table->id();
            $table->integer('user_id')->nullable();
            $table->boolean('is_aapale_sarkar_payment_paid')->nullable();
            $table->string('applicant_full_name')->nullable();
            $table->text('address')->nullable();
            $table->text('office_address')->nullable();
            $table->string('mobile_no')->nullable();
            $table->string('email_id')->nullable();
            $table->string('aadhar_no')->nullable();
            $table->date('current_permission_date')->nullable();
            $table->date('business_start_date')->nullable();
            $table->string('business_or_trade_name')->nullable();
            $table->string('area_size')->nullable();
            $table->string('new_permission_details')->nullable();
            $table->string('zone')->nullable();
            $table->string('ward_area')->nullable();
            $table->string('plot_no')->nullable();
            $table->string('description_of_new_trade_place')->nullable();
            $table->string('is_preveious_permission_declined_by_council')->nullable();
            $table->string('previous_permission_decline_reason')->nullable();
            $table->string('is_place_owned_by_council')->nullable();
            $table->string('is_any_dues_pending_of_council')->nullable();
            $table->string('trade_or_business_type')->nullable();
            $table->string('is_any_partnership_in_trade')->nullable();
            $table->string('partner_count')->nullable();
            $table->string('partner_names')->nullable();
            $table->string('property_no')->nullable();
            $table->string('no_dues_document')->nullable();
            $table->string('application_document')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('trade_per_licenses');
    }
};
