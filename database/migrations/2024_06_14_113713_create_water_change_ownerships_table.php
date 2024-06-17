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
        Schema::create('water_change_ownerships', function (Blueprint $table) {
            $table->id();
            $table->integer('user_id')->nullable();
            $table->boolean('is_aapale_sarkar_payment_paid')->nullable();
            $table->string('application_no')->nullable();
            $table->string('service_name')->nullable();
            $table->string('new_owner_name')->nullable();
            $table->text('address')->nullable();
            $table->string('aadhar_no')->nullable();
            $table->string('mobile_no')->nullable();
            $table->string('email_id')->nullable();
            $table->string('property_no')->nullable();
            $table->string('zone')->nullable();
            $table->string('ward_area')->nullable();
            $table->string('new_tap_connection')->nullable();
            $table->string('house_no')->nullable();
            $table->string('landmark')->nullable();
            $table->string('current_connection_is_authorized')->nullable();
            $table->string('no_of_user')->nullable();
            $table->string('applicant_or_tenant')->nullable();
            $table->string('criminal_judicial_issue')->nullable();
            $table->string('old_owner_name')->nullable();
            $table->string('tap_size')->nullable();
            $table->string('existing_connection_detail')->nullable();
            $table->string('place_belongs_to_municipal')->nullable();
            $table->string('comment')->nullable();
            $table->string('ownership_document')->nullable();
            $table->string('nodues_document')->nullable();
            $table->string('application_document')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('water_change_ownerships');
    }
};
