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
        Schema::create('waternewconnections', function (Blueprint $table) {
            $table->id();
            $table->integer('user_id')->nullable();
            $table->boolean('is_aapale_sarkar_payment_paid')->nullable();
            $table->string('applicant_full_name')->nullable();
            $table->string('aadhar_no')->nullable();
            $table->string('mobile_no')->nullable();
            $table->string('email_id')->nullable();
            $table->string('zone')->nullable();
            $table->string('ward_area')->nullable();
            $table->string('city_servey_no')->nullable();
            $table->text('address')->nullable();
            $table->string('landmark')->nullable();
            $table->string('property_no')->nullable();
            $table->string('total_person')->nullable();
            $table->string('distance')->nullable();
            $table->string('water_connection_use')->nullable();
            $table->string('pipe_size')->nullable();
            $table->integer('no_of_tap')->nullable();
            $table->integer('current_no_of_tap')->nullable();
            $table->string('total_tenants')->nullable();
            $table->string('written_application_document')->nullable();
            $table->string('ownership_document')->nullable();
            $table->string('no_dues_document')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('waternewconnections');
    }
};
