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
        Schema::table('mobile_towers', function (Blueprint $table) {
            $table->string('marathi_name')->nullable()->after('applicant_name');
            $table->year('license_year')->nullable()->after('ward_area');
            $table->string('to_year')->nullable()->after('license_year');
            

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('mobile_towers', function (Blueprint $table) {
            //
        });
    }
};
