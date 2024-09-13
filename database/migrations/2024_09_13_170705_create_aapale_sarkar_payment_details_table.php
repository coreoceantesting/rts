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
        Schema::create('aapale_sarkar_payment_details', function (Blueprint $table) {
            $table->id();
            $table->string('client_code')->nullable();
            $table->string('service_id')->nullable();
            $table->string('application_no')->nullable();
            $table->string('payment_transaction_id')->nullable();
            $table->string('bank_ref_id')->nullable();
            $table->string('bank_ref_no')->nullable();
            $table->string('bank_id')->nullable();
            $table->string('payment_date')->nullable();
            $table->string('payment_status')->nullable();
            $table->string('total_amount')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('aapale_sarkar_payment_details');
    }
};
