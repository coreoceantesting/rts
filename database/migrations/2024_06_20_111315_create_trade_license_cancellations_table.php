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
        Schema::create('trade_license_cancellations', function (Blueprint $table) {
            $table->id();
            $table->integer('user_id')->nullable();
            $table->boolean('is_aapale_sarkar_payment_paid')->nullable();
            $table->string('applicant_full_name')->nullable();
            $table->text('address')->nullable();
            $table->string('mobile_no')->nullable();
            $table->string('email_id')->nullable();
            $table->string('aadhar_no')->nullable();
            $table->string('current_permission_no')->nullable();
            $table->date('current_permission_date')->nullable();
            $table->date('business_start_date')->nullable();
            $table->string('business_or_trade_name')->nullable();
            $table->string('new_permission_detail')->nullable();
            $table->string('reason_for_trade_license_cancellation')->nullable();
            $table->string('zone')->nullable();
            $table->string('ward_area')->nullable();
            $table->string('plot_no')->nullable();
            $table->string('permission_details')->nullable();
            $table->string('is_preveious_permission_declined_by_council')->nullable();
            $table->string('previous_permission_decline_reason')->nullable();
            $table->string('is_place_owned_by_council')->nullable();
            $table->string('is_any_dues_pending_of_council')->nullable();
            $table->string('trade_or_business_type')->nullable();
            $table->string('property_no')->nullable();
            $table->string('remark')->nullable();
            $table->string('application_document')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('trade_license_cancellations');
    }
};
