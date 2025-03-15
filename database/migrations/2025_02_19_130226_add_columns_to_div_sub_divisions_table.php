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
        Schema::table('div_sub_divisions', function (Blueprint $table) {
            $table->string('application_no')->nullable()->after('zone');
            $table->integer('service_id')->nullable()->after('application_no');
            $table->date('aapale_sarkar_payment_date')->nullable()->after('service_id');
            $table->date('payment_date')->nullable()->after('aapale_sarkar_payment_date');
            $table->boolean('is_payment_paid_aapale_sarkar')->default(0)->nullable()->after('payment_date');
            $table->boolean('is_payment_paid')->default(0)->nullable()->after('is_payment_paid_aapale_sarkar');
            $table->string('status')->nullable()->after('is_payment_paid');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('div_sub_divisions', function (Blueprint $table) {
            $table->string('application_no')->nullable()->after('zone');
            $table->integer('service_id')->nullable()->after('application_no');
            $table->date('aapale_sarkar_payment_date')->nullable()->after('service_id');
            $table->date('payment_date')->nullable()->after('aapale_sarkar_payment_date');
            $table->boolean('is_payment_paid_aapale_sarkar')->default(0)->nullable()->after('payment_date');
            $table->boolean('is_payment_paid')->default(0)->nullable()->after('is_payment_paid_aapale_sarkar');
            $table->string('status')->nullable()->after('is_payment_paid');
        });
    }
};
