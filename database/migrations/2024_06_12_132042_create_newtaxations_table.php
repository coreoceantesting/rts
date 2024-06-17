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
        Schema::create('newtaxations', function (Blueprint $table) {
            $table->id();
            $table->integer('user_id')->nullable();
            $table->boolean('is_aapale_sarkar_payment_paid')->nullable();
            $table->string('application_no')->nullable();
            $table->string('service_name')->nullable();
            $table->string('applicant_full_name')->nullable();
            $table->text('applicant_full_address')->nullable();
            $table->string('owner_name')->nullable();
            $table->string('applicant_mobile_no')->nullable();
            $table->string('email_id')->nullable();
            $table->string('aadhar_no')->nullable();
            $table->text('property_address')->nullable();
            $table->string('property_no')->nullable();
            $table->string('survey_number')->nullable();
            $table->string('zone')->nullable();
            $table->string('ward_area')->nullable();
            $table->string('property_usage')->nullable();
            $table->string('construction_type')->nullable();
            $table->string('is_construction_authorized')->nullable();
            $table->string('is_there_water_connection')->nullable();
            $table->string('property_area')->nullable();
            $table->string('uploaded_application')->nullable();
            $table->string('certificate_of_no_dues')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('newtaxations');
    }
};
