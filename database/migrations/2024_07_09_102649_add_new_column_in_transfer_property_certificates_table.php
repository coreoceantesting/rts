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
        Schema::table('transfer_property_certificates', function (Blueprint $table) {
            $table->string('applicant_full_name')->nullable()->change();
        });

        Schema::table('tax_exemptions', function (Blueprint $table) {
            $table->string('is_construction_authorized')->nullable()->change();
            $table->string('is_there_water_connection')->nullable()->change();
        });

        Schema::table('tax_exemption_non_resident_properties', function (Blueprint $table) {
            $table->string('is_construction_authorized')->nullable()->change();
            $table->string('is_there_water_connection')->nullable()->change();
        });

        Schema::table('self_assessments', function (Blueprint $table) {
            $table->string('is_construction_authorized')->nullable()->change();
            $table->string('is_there_water_connection')->nullable()->change();
        });

        Schema::table('registration_of_objections', function (Blueprint $table) {
            $table->string('is_construction_authorized')->nullable()->change();
            $table->string('is_there_water_connection')->nullable()->change();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('transfer_property_certificates', function (Blueprint $table) {
            $table->integer('applicant_full_name')->change();
        });

        Schema::table('transfer_property_certificates', function (Blueprint $table) {
            $table->integer('is_construction_authorized')->change();
            $table->integer('is_there_water_connection')->change();
        });

        Schema::table('tax_exemption_non_resident_properties', function (Blueprint $table) {
            $table->integer('is_construction_authorized')->change();
            $table->integer('is_there_water_connection')->change();
        });

        Schema::table('self_assessments', function (Blueprint $table) {
            $table->integer('is_construction_authorized')->change();
            $table->integer('is_there_water_connection')->change();
        });

        Schema::table('registration_of_objections', function (Blueprint $table) {
            $table->integer('is_construction_authorized')->change();
            $table->integer('is_there_water_connection')->change();
        });
    }
};
