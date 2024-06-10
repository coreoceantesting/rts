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
        Schema::create('property_tax_issuance_of_property_tax_assessment', function (Blueprint $table) {
            $table->id();
            $table->integer('user_id')->nullable();
            $table->string('applicant_name')->nullable();
            $table->text('applicant_full_address')->nullable();
            $table->integer('applicant_mobile_no')->nullable();
            $table->string('email_id')->nullable();
            $table->integer('aadhar_no')->nullable();
            $table->string('property_owner_name')->nullable();
            $table->string('index_number')->nullable();
            $table->string('property_no')->nullable();
            $table->text('property_address')->nullable();
            $table->integer('assessment_for_year')->nullable();
            $table->integer('zone')->nullable();
            $table->integer('ward_area')->nullable();
            $table->string('house_no')->nullable();
            $table->string('property_usage')->nullable();
            $table->string('construction_type')->nullable();
            $table->string('is_construction_authorized')->nullable();
            $table->string('is_there_water_connection')->nullable();
            $table->text('property_area')->nullable();
            $table->string('uploaded_application')->nullable();
            $table->string('certificate_of_no_dues')->nullable();
            $table->string('is_correct_info')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('property_tax_issuance_of_property_tax_assessment');
    }
};
