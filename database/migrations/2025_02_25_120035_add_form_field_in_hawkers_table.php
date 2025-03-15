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
        Schema::table('hawker_registers', function (Blueprint $table) {
            $table->string('service_type')->nullable()->after('zone');
            $table->string('licenses_no')->nullable()->after('service_type');
            $table->bigInteger('property_num')->nullable()->after('licenses_no');
            $table->string('bussiness_type')->nullable()->after('property_num');
            $table->string('bussiness_name')->nullable()->after('bussiness_type');
            $table->dateTime('from_date')->nullable()->after('bussiness_name');
            $table->dateTime('to_date')->nullable()->after('from_date');
            $table->string('reason')->nullable()->after('to_date');
            $table->string('image')->nullable()->after('reason');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('hawker_registers', function (Blueprint $table) {
            $table->dropColumn('service_type')->nullable()->after('zone');
            $table->dropColumn('licenses_no')->nullable()->after('service_type');
            $table->dropColumn('property_num')->nullable()->after('licenses_no');
            $table->dropColumn('bussiness_type')->nullable()->after('property_num');
            $table->dropColumn('bussiness_name')->nullable()->after('bussiness_type');
            $table->dropColumn('from_date')->nullable()->after('bussiness_name');
            $table->dropColumn('to_date')->nullable()->after('from_date');
            $table->dropColumn('reason')->nullable()->after('to_date');
            $table->dropColumn('image')->nullable()->after('reason');
        });
    }
};
