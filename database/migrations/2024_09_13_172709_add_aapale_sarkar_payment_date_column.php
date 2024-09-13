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
        Schema::table('transfer_registration_certificates', function (Blueprint $table) {
            $table->string('application_no')->after('service_id')->nullable();
        });

        $arrs = ['city_structure_part_maps', 'city_structure_zone_certificates', 'construction_drainage_connections', 'construction_road_cuttings', 'fire_final_no_objections', 'fire_no_objections', 'illegalwaterconnections', 'marriage_reg_forms', 'newtaxations', 'no_due_certificates', 'property_tax_issuance_of_property_tax_assessments', 'registration_of_objections', 're_taxations', 'self_assessments', 'tax_demands', 'tax_exemptions', 'tax_exemption_non_resident_properties', 'trade_auto_renewal_license_permissions', 'trade_change_license_names', 'trade_change_license_types', 'trade_change_owner_counts', 'trade_change_owner_names', 'trade_license_cancellations', 'trade_license_transfers', 'trade_new_license_permissions', 'trade_noc_for_mandaps', 'trade_per_licenses', 'trade_renewal_license_permissions', 'transfer_property_certificates', 'transfer_registration_certificates', 'waternewconnections', 'water_change_connection_sizes', 'water_change_in_uses', 'water_change_ownerships', 'water_defective_meters', 'water_disconnect_supplies', 'water_no_dues', 'water_plumber_licenses', 'water_pressure_complaints', 'water_quality_complaints', 'water_reconnections', 'water_renewal_of_plumbers', 'water_tax_bills', 'water_unavailability_supplies'];

        foreach ($arrs as $arr) {
            Schema::table($arr, function (Blueprint $table) {
                $table->boolean('is_payment_paid')->default(0)->nullable()->after('payment_date');
                $table->boolean('is_payment_paid_aapale_sarkar')->default(0)->nullable()->after('application_no');
                $table->date('aapale_sarkar_payment_date')->nullable()->after('is_payment_paid_aapale_sarkar');
            });
        }
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('transfer_registration_certificates', function (Blueprint $table) {
            $table->dropColumn('application_no');
        });
        $arrs = ['city_structure_part_maps', 'city_structure_zone_certificates', 'construction_drainage_connections', 'construction_road_cuttings', 'fire_final_no_objections', 'fire_no_objections', 'illegalwaterconnections', 'marriage_reg_forms', 'newtaxations', 'no_due_certificates', 'property_tax_issuance_of_property_tax_assessments', 'registration_of_objections', 're_taxations', 'self_assessments', 'tax_demands', 'tax_exemptions', 'tax_exemption_non_resident_properties', 'trade_auto_renewal_license_permissions', 'trade_change_license_names', 'trade_change_license_types', 'trade_change_owner_counts', 'trade_change_owner_names', 'trade_license_cancellations', 'trade_license_transfers', 'trade_new_license_permissions', 'trade_noc_for_mandaps', 'trade_per_licenses', 'trade_renewal_license_permissions', 'transfer_property_certificates', 'transfer_registration_certificates', 'waternewconnections', 'water_change_connection_sizes', 'water_change_in_uses', 'water_change_ownerships', 'water_defective_meters', 'water_disconnect_supplies', 'water_no_dues', 'water_plumber_licenses', 'water_pressure_complaints', 'water_quality_complaints', 'water_reconnections', 'water_renewal_of_plumbers', 'water_tax_bills', 'water_unavailability_supplies'];

        foreach ($arrs as $arr) {
            Schema::table($arr, function (Blueprint $table) {
                $table->dropColumn('is_payment_paid');
                $table->dropColumn('is_payment_paid_aapale_sarkar');
                $table->dropColumn('aapale_sarkar_payment_date');
            });
        }
    }
};
