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
        Schema::create('business_partner_changes', function (Blueprint $table) {
            $table->id();
            $table->integer('user_id')->nullable();
            $table->string('ip')->nullable();
            $table->string('zone')->nullable();
            $table->string('application_no')->nullable();
            $table->integer('service_id')->nullable();
            $table->date('aapale_sarkar_payment_date')->nullable();
            $table->date('payment_date')->nullable();
            $table->boolean('is_payment_paid_aapale_sarkar')->default(0)->nullable();
            $table->boolean('is_payment_paid')->default(0)->nullable();
            $table->string('status')->nullable();
            $table->string('f_name')->nullable();
            $table->string('m_name')->nullable();
            $table->string('l_name')->nullable();
            $table->biginteger('mobile_num')->nullable();
            $table->string('email')->nullable();
            $table->biginteger('aadhar_num')->nullable();
            $table->biginteger('propert_number')->nullable();
            $table->string('resi_address')->nullable();
            $table->string('owner_name')->nullable();
            $table->biginteger('owner_aadhar_num')->nullable();
            $table->string('existing_name')->nullable();
            $table->string('new_name')->nullable();
            $table->integer('owner_status')->nullable()->comment('1:active,2:inactive');
            $table->string('business_type')->nullable();
            $table->string('new_business_name')->nullable();
            $table->string('reason')->nullable();
            $table->string('application_doc')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('business_partner_changes');
    }
};
