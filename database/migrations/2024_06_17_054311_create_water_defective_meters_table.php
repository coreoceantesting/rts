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
        Schema::create('water_defective_meters', function (Blueprint $table) {
            $table->id();
            $table->integer('user_id')->nullable();
            $table->integer('service_id')->nullable();
            $table->date('aapale_sarkar_payment_date')->nullable();
            $table->string('status')->nullable();
            $table->boolean('is_aapale_sarkar_payment_paid')->nullable();
            $table->string('water_connection_no')->nullable();
            $table->string('upic_id')->nullable();
            $table->string('application_no')->nullable();
            $table->string('owner_name')->nullable();
            $table->string('aadhar_no')->nullable();
            $table->string('mobile_no')->nullable();
            $table->string('email_id')->nullable();
            $table->string('zone')->nullable();
            $table->string('ward_area')->nullable();
            $table->string('plot_no')->nullable();
            $table->string('house_no')->nullable();
            $table->string('landmark')->nullable();
            $table->text('address')->nullable();
            $table->string('place_belongs_to_municipal')->nullable();
            $table->string('current_connection_is_illegal')->nullable();
            $table->string('applicant_or_tenant')->nullable();
            $table->string('criminal_judicial_issue')->nullable();
            $table->string('current_tap_detail')->nullable();
            $table->string('property_no')->nullable();
            $table->string('meter_reading')->nullable();
            $table->string('size')->nullable();
            $table->string('comment')->nullable();
            $table->string('application_document')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('water_defective_meters');
    }
};
