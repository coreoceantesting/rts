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
        Schema::create('service_credentials', function (Blueprint $table) {
            $table->id();
            $table->string('dept_service_id')->nullable();
            $table->string('service_name');
            $table->string('service_url');
            $table->string('client_code');
            $table->string('check_sum_key');
            $table->string('str_key');
            $table->string('str_iv');
            $table->string('soap_end_point_url');
            $table->string('soap_action_url');
            $table->string('soap_action_app_status_url');
            $table->string('validate_payment_url');
            $table->string('out_payment_url');
            $table->string('service_id');
            $table->string('ulb_id');
            $table->string('ulb_district');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('service_credentials');
    }
};
