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
        Schema::table('hoarding_permissions', function (Blueprint $table) {
            $table->string('title')->nullable()->after('service_id');
            $table->renameColumn('applicant_name','f_name');
            $table->string('m_name')->nullable()->after('title');
            $table->string('l_name')->nullable()->after('m_name');
            $table->string('type_hoarding')->nullable()->after('email_id');
            $table->string('advertisement_place')->nullable()->after('type_hoarding');
            $table->string('chowk')->nullable()->after('advertisement_place');
            $table->string('plot_no')->nullable()->after('chowk');
            $table->string('size_hoarding')->nullable()->after('plot_no');
            $table->string('bussiness_hoarding')->nullable()->after('size_hoarding');
            $table->string('format_advertisement')->nullable()->after('bussiness_hoarding');
            $table->string('height')->nullable()->after('format_advertisement');
            $table->string('structure')->nullable()->after('height');
            $table->string('open_populated')->nullable()->after('structure');
            $table->string('behalf')->nullable()->after('open_populated');
            $table->string('detail_address')->nullable()->after('behalf');
            $table->string('detail_property')->nullable()->after('behalf');
            $table->string('detail_property_image')->nullable()->after('detail_property');
            $table->string('postal_address')->nullable()->after('detail_property_image');
            $table->string('consent_letter')->nullable()->after('postal_address');
            $table->dateTime('start_date')->nullable()->after('consent_letter');
            $table->dateTime('end_date')->nullable()->after('start_date');
            $table->renameColumn('gumasta_certificate', 'building_permission');
            $table->renameColumn('aadhar_pan', 'paid_receipt');
            $table->renameColumn('land_ownership', 'structural_engineer');
            $table->renameColumn('water_bill', 'certificate_of_structural');
            $table->renameColumn('photo_of_place', 'sightseeing');
            $table->renameColumn('property_tax', 'drawing_provided');
            $table->renameColumn('tenancy_agreement', 'pr_card');


        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('hoarding_permissions', function (Blueprint $table) {
            $table->dropColumn('title')->nullable()->after('service_id');
            $table->renameColumn('f_name','applicant_name');
            $table->dropColumn('m_name')->nullable()->after('title');
            $table->dropColumn('l_name')->nullable()->after('m_name');
            $table->dropColumn('type_hoarding')->nullable()->after('email_id');
            $table->dropColumn('advertisement_place')->nullable()->after('type_hoarding');
            $table->dropColumn('chowk')->nullable()->after('advertisement_place');
            $table->dropColumn('plot_no')->nullable()->after('chowk');
            $table->dropColumn('size_hoarding')->nullable()->after('plot_no');
            $table->dropColumn('bussiness_hoarding')->nullable()->after('size_hoarding');
            $table->dropColumn('format_advertisement')->nullable()->after('bussiness_hoarding');
            $table->dropColumn('height')->nullable()->after('format_advertisement');
            $table->dropColumn('structure')->nullable()->after('height');
            $table->dropColumn('open_populated')->nullable()->after('structure');
            $table->dropColumn('behalf')->nullable()->after('open_populated');
            $table->dropColumn('detail_address')->nullable()->after('behalf');
            $table->dropColumn('detail_property')->nullable()->after('behalf');
            $table->dropColumn('detail_property_image')->nullable()->after('detail_property');
            $table->dropColumn('postal_address')->nullable()->after('detail_property_image');
            $table->dropColumn('consent_letter')->nullable()->after('postal_address');
            $table->dropColumn('start_date')->nullable()->after('consent_letter');
            $table->dropColumn('end_date')->nullable()->after('start_date');
            $table->renameColumn( 'building_permission','gumasta_certificate');
            $table->renameColumn('paid_receipt','aadhar_pan');
            $table->renameColumn('structural_engineer','land_ownership');
            $table->renameColumn('certificate_of_structural','water_bill');
            $table->renameColumn('sightseeing','photo_of_place');
            $table->renameColumn('drawing_provided','property_tax');
            $table->renameColumn('pr_card','tenancy_agreement');
        });
    }
};
