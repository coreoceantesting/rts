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
        Schema::create('construction_road_cuttings', function (Blueprint $table) {
            $table->id();
            $table->integer('user_id')->nullable();
            $table->integer('service_id')->nullable();
            $table->date('aapale_sarkar_payment_date')->nullable();
            $table->date('status')->nullable();
            $table->boolean('is_aapale_sarkar_payment_paid')->nullable();
            $table->string('upic_id')->nullable();
            $table->string('application_no')->nullable();
            $table->string('applicant_type')->nullable();
            $table->string('applicant_name')->nullable();
            $table->text('applicant_full_address')->nullable();
            $table->string('zone')->nullable();
            $table->string('ward')->nullable();
            $table->string('company_name')->nullable();
            $table->string('designation')->nullable();
            $table->string('mobile_no')->nullable();
            $table->string('email_id')->nullable();
            $table->string('aadhar_no')->nullable();
            $table->string('road_cutting_purpose')->nullable();
            $table->string('road_length')->nullable();
            $table->string('no_of_location')->nullable();
            $table->text('road_cutting_address')->nullable();
            $table->string('location_size')->nullable();
            $table->string('upload_prescribed_format')->nullable();
            $table->string('upload_no_dues_certificate')->nullable();
            $table->string('upload_gov_instructed_doc')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('construction_road_cuttings');
    }
};
