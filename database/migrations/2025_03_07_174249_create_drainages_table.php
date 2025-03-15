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
        Schema::create('drainages', function (Blueprint $table) {
            $table->id();
            $table->integer('user_id')->nullable();
            $table->string('ip')->nullable();
            $table->integer('service_id')->nullable();
            $table->date('aapale_sarkar_payment_date')->nullable();
            $table->string('status')->nullable();
            $table->string('application_no')->nullable();
            $table->boolean('is_payment_paid_aapale_sarkar')->default(0)->nullable();
            $table->text('status_remark')->nullable();
            $table->date('payment_date')->nullable();
            $table->boolean('is_payment_paid')->default(0)->nullable();
            $table->boolean('is_aapale_sarkar_payment_paid')->nullable();
            $table->string('connection_type')->nullable();
            $table->string('conn_property_type')->nullable();
            $table->string('application_category')->nullable();
            $table->string('title')->nullable();
            $table->string('f_name')->nullable();
            $table->string('m_name')->nullable();
            $table->string('l_name')->nullable();
            $table->bigInteger('mobile_no')->nullable();
            $table->string('email')->nullable();
            $table->bigInteger('aadhar_no')->nullable();
            $table->string('gender')->nullable();
            $table->integer('age')->nullable();
            $table->string('address')->nullable();
            $table->string('landmark')->nullable();
            $table->string('permanent_address')->nullable();
            $table->string('city_name')->nullable();
            $table->bigInteger('pincode')->nullable();
            $table->string('state')->nullable();
            $table->string('csmc_prop_no')->nullable();
            $table->bigInteger('cts_no')->nullable();
            $table->string('zone')->nullable();
            $table->string('ward_no')->nullable();
            $table->string('detail_address')->nullable();
            $table->string('lacality')->nullable();
            $table->string('longitude')->nullable();
            $table->string('lattitude')->nullable();
            $table->string('near_landmark')->nullable();
            $table->string('property_city')->nullable();
            $table->string('property_state')->nullable();
            $table->bigInteger('property_pincode')->nullable();
            $table->string('place_business')->nullable();
            $table->string('sewer_diameter')->nullable();
            $table->string('branch_line')->nullable();
            $table->string('diameter_connection')->nullable();
            $table->string('sewer_line')->nullable();
            $table->string('csmc_connection')->nullable();
            $table->string('name_plumber')->nullable();
            $table->string('property_tax')->nullable();
            $table->string('property_photo')->nullable();
            $table->string('water_tax')->nullable();
            $table->string('passport_size_photo')->nullable();
            $table->string('aadharcard_photo')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('drainages');
    }
};
