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
        Schema::create('occupancy_certificates', function (Blueprint $table) {
            $table->id();
            $table->integer('user_id')->nullable();
            $table->integer('service_id')->nullable();
            $table->date('aapale_sarkar_payment_date')->nullable();
            $table->string('status')->nullable();
            $table->string('application_no')->nullable();
            $table->text('status_remark')->nullable();
            $table->boolean('is_aapale_sarkar_payment_paid')->nullable();
            $table->date('payment_date')->nullable();
            $table->boolean('is_payment_paid')->default(0);
            $table->string('zone')->nullable();
            $table->string('ward')->nullable();
            $table->string('survey_no')->nullable();
            $table->string('applicant_name')->nullable();
            $table->string('applicant_mobile_no')->nullable();
            $table->string('applicant_full_address')->nullable();
            $table->string('email_id')->nullable();
            $table->string('document')->nullable();
            $table->string('commencement_certificate_no')->nullable();
            $table->string('plinth_number')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('occupancy_certificates');
    }
};
