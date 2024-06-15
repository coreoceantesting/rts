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
        Schema::create('water_change_in_uses', function (Blueprint $table) {
            $table->id();
            $table->integer('user_id')->nullable();
            $table->boolean('is_aapale_sarkar_payment_paid')->nullable();
            $table->string('property_owner_name')->nullable();
            $table->string('aadhar_no')->nullable();
            $table->string('mobile_no')->nullable();
            $table->string('email_id')->nullable();
            $table->string('zone')->nullable();
            $table->string('ward_area')->nullable();
            $table->string('plot_no')->nullable();
            $table->string('house_no')->nullable();
            $table->string('landmark')->nullable();
            $table->text('address')->nullable();
            $table->text('property_type')->nullable();
            $table->string('water_connection_no')->nullable();
            $table->string('applicant_is_on_rent')->nullable();
            $table->string('water_connection_size')->nullable();
            $table->string('water_usage')->nullable();
            $table->string('new_water_con_usage')->nullable();
            $table->string('usage_residence_type')->nullable();
            $table->string('current_connection_is_illegal')->nullable();
            $table->string('no_of_user')->nullable();
            $table->string('place_belongs_to_municipal')->nullable();
            $table->string('any_police_complaint')->nullable();
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
        Schema::dropIfExists('water_change_in_uses');
    }
};
