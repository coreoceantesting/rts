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
        Schema::table('service_credentials', function (Blueprint $table) {
            $table->boolean('is_paid_service')->default(1)->after('service_day');
            $table->boolean('is_paid_service_by_aapale_sarkar')->default(1)->after('is_paid_service');
            $table->string('service_charge')->nullable()->after('is_paid_service_by_aapale_sarkar');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('service_credentials', function (Blueprint $table) {
            //
        });
    }
};
