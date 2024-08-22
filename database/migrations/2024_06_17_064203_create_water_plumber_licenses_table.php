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
        Schema::create('water_plumber_licenses', function (Blueprint $table) {
            $table->id();
            $table->integer('user_id')->nullable();
            $table->integer('service_id')->nullable();
            $table->date('aapale_sarkar_payment_date')->nullable();
            $table->string('status')->nullable();
            $table->boolean('is_aapale_sarkar_payment_paid')->nullable();
            $table->string('upic_id')->nullable();
            $table->string('application_no')->nullable();
            $table->string('applicant_name')->nullable();
            $table->text('address')->nullable();
            $table->string('aadhar_no')->nullable();
            $table->string('mobile_no')->nullable();
            $table->string('email_id')->nullable();
            $table->string('zone')->nullable();
            $table->string('ward_area')->nullable();
            $table->string('education_institutation')->nullable();
            $table->string('education_qualification')->nullable();
            $table->string('training_institute_name')->nullable();
            $table->string('year_of_passing')->nullable();
            $table->string('have_experience')->nullable();
            $table->string('application_document')->nullable();
            $table->string('nodues_document')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('water_plumber_licenses');
    }
};
