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
        Schema::create('construction_drainage_connections', function (Blueprint $table) {
            $table->id();
            $table->integer('user_id')->nullable();
            $table->integer('service_id')->nullable();
            $table->date('aapale_sarkar_payment_date')->nullable();
            $table->date('status')->nullable();
            $table->boolean('is_aapale_sarkar_payment_paid')->nullable();
            $table->string('upic_id')->nullable();
            $table->string('application_no')->nullable();
            $table->string('applicant_name')->nullable();
            $table->string('applicant_area_details')->nullable();
            $table->text('applicant_full_address')->nullable();
            $table->string('zone')->nullable();
            $table->string('ward')->nullable();
            $table->string('mobile_no')->nullable();
            $table->string('aadhar_no')->nullable();
            $table->string('email_id')->nullable();
            $table->string('property_number')->nullable();
            $table->string('property_usage')->nullable();
            $table->string('connection_size_inches')->nullable();
            $table->date('construction_date')->nullable();
            $table->date('flat_assesment_date')->nullable();
            $table->date('flat_map_date')->nullable();
            $table->string('current_water_tax_amount')->nullable();
            $table->date('current_tax_paid_date')->nullable();
            $table->string('lichpit_count')->nullable();
            $table->string('is_toilet_available')->nullable();
            $table->string('total_residencial_people_count')->nullable();
            $table->string('total_renter_count')->nullable();
            $table->string('connection_size_feet')->nullable();
            $table->string('upload_prescribed_format')->nullable();
            $table->string('upload_no_dues_certificate')->nullable();
            $table->string('upload_property_ownership')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('construction_drainage_connections');
    }
};
