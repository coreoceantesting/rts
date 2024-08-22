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
        Schema::create('fire_no_objections', function (Blueprint $table) {
            $table->id();
            $table->integer('user_id')->nullable();
            $table->integer('service_id')->nullable();
            $table->date('aapale_sarkar_payment_date')->nullable();
            $table->string('status')->nullable();
            $table->boolean('is_aapale_sarkar_payment_paid')->nullable();
            $table->string('upic_id')->nullable();
            $table->string('application_no')->nullable();
            $table->string('applicant_full_name')->nullable();
            $table->string('building_type')->nullable();
            $table->string('building_name')->nullable();
            $table->text('address')->nullable();
            $table->string('mobile_no')->nullable();
            $table->string('email_id')->nullable();
            $table->string('aadhar_no')->nullable();
            $table->string('zone')->nullable();
            $table->string('ward_area')->nullable();
            $table->string('subject')->nullable();
            $table->string('uploaded_application')->nullable();
            $table->string('no_dues_document')->nullable();
            $table->string('architect_application_document')->nullable();
            $table->string('fire_prevention_document')->nullable();
            $table->string('capitation_fee_document')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('fire_no_objections');
    }
};
