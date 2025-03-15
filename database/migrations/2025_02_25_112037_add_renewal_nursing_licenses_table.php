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
        Schema::table('renewal_nursing_licenses', function (Blueprint $table) {
            $table->string('noc_type')->nullable()->after('zone');
            $table->integer('property_number')->nullable()->after('aadhar_num');
            $table->integer('residential_number')->nullable()->after('property_number');
            $table->string('name_institute')->nullable()->after('residential_number');
            $table->string('institute_address')->default(0)->nullable()->after('name_institute');
            $table->string('hospital_name')->default(0)->nullable()->after('institute_address');
            $table->bigInteger('alternet_mobile')->nullable()->after('hospital_name');
            $table->string('alternet_email')->nullable()->after('alternet_mobile');
            $table->string('property_tax')->nullable()->after('alternet_email');
            $table->string('water_connection')->nullable()->after('property_tax');
            $table->string('fire_noc')->nullable()->after('water_connection');
            $table->bigInteger('noc_number')->nullable()->after('fire_noc');
            $table->string('hospital_address')->nullable()->after('noc_number');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('renewal_nursing_licenses', function (Blueprint $table) {
            $table->dropColumn('noc_type')->nullable()->after('zone');
            $table->dropColumn('property_number')->nullable()->after('aadhar_num');
            $table->dropColumn('residential_number')->nullable()->after('property_number');
            $table->dropColumn('name_institute')->nullable()->after('residential_number');
            $table->dropColumn('institute_address')->default(0)->nullable()->after('name_institute');
            $table->dropColumn('hospital_name')->default(0)->nullable()->after('institute_address');
            $table->dropColumn('alternet_mobile')->nullable()->after('hospital_name');
            $table->dropColumn('alternet_email')->nullable()->after('alternet_mobile');
            $table->dropColumn('property_tax')->nullable()->after('alternet_email');
            $table->dropColumn('water_connection')->nullable()->after('property_tax');
            $table->dropColumn('fire_noc')->nullable()->after('water_connection');
            $table->dropColumn('noc_number')->nullable()->after('fire_noc');
            $table->dropColumn('hospital_address')->nullable()->after('noc_number');
        });
    }
};
