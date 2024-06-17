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
        Schema::create('water_unavailability_supplies', function (Blueprint $table) {
            $table->id();
            $table->integer('user_id')->nullable();
            $table->boolean('is_aapale_sarkar_payment_paid')->nullable();
            $table->string('application_no')->nullable();
            $table->string('service_name')->nullable();
            $table->string('applicant_name')->nullable();
            $table->text('email_id')->nullable();
            $table->string('mobile_no')->nullable();
            $table->text('address')->nullable();
            $table->string('police_station')->nullable();
            $table->string('name_of_commercail_establishment')->nullable();
            $table->string('zone')->nullable();
            $table->string('ward_area')->nullable();
            $table->text('address_of_com_establishment')->nullable();
            $table->string('no_of_working_person')->nullable();
            $table->string('per_day_water_demand')->nullable();
            $table->string('other_info')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('water_unavailability_supplies');
    }
};
