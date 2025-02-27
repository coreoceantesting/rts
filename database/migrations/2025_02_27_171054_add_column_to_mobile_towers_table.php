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
            $table->string('m_name')->nullable()->after('applicant_name');
            $table->renameColumn('applicant_name', 'name');
            $table->renameColumn('address_est', 'landlord_address');
            $table->renameColumn('gumasta_certificate', 'other_documents');
            $table->renameColumn('land_ownership', 'market_license');
            $table->renameColumn('water_bill', 'food_drug_img');
            $table->renameColumn('no_objection_certificate', 'shop_act');
            $table->renameColumn('photo_of_place', 'fire_safety_certificate');
            $table->renameColumn('property_tax', 'aadharcard_image');
            $table->renameColumn('tenancy_agreement', 'tax_receipt_img');
            $table->renameColumn('site_occupancy', 'interior_photo');
            $table->renameColumn('medical_certificate', 'exterior_photo');
            $table->date('financial_year')->nullable()->after('full_address');
            $table->date('to_year')->nullable()->after('financial_year');
            $table->integer('amount')->nullable()->after('to_year');
            $table->string('trade_type')->nullable()->after('amount');
            $table->integer('rate')->nullable()->after('trade_type');
            $table->string('trade')->nullable()->after('rate');
            $table->string('manufactured')->nullable()->after('trade');
            $table->string('business_premises')->nullable()->after('manufactured');
            $table->string('owner_place')->nullable()->after('business_premises');
            $table->string('rental_agreement')->nullable()->after('owner_place');
            $table->string('noc_certificate')->nullable()->after('rental_agreement');
            $table->integer('business_start')->nullable()->after('noc_certificate');
            $table->string('registration_no')->nullable()->after('business_start');
            $table->string('food_drug')->nullable()->after('registration_no');
            $table->string('director_name')->nullable()->after('food_drug');
            $table->bigInteger('contact_no')->nullable()->after('director_name');
            $table->string('alternet_email')->nullable()->after('contact_no');
            $table->string('gender')->nullable()->after('alternet_email');
            $table->string('alternet_address')->nullable()->after('gender');
            $table->string('application_type')->nullable()->after('alternet_address');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('mobile_towers', function (Blueprint $table) {
            $table->dropColumn('m_name')->nullable()->after('applicant_name');
            $table->renameColumn('applicant_name', 'name');
            $table->renameColumn('landlord_address','address_est');
            $table->renameColumn( 'other_documents','gumasta_certificate');
            $table->renameColumn( 'market_license', 'land_ownership');
            $table->renameColumn( 'food_drug_img', 'water_bill');
            $table->renameColumn('shop_act', 'no_objection_certificate');
            $table->renameColumn('fire_safety_certificate', 'photo_of_place');
            $table->renameColumn( 'aadharcard_image', 'property_tax');
            $table->renameColumn( 'tax_receipt_img' , 'tenancy_agreement');
            $table->renameColumn( 'interior_photo' , 'site_occupancy');
            $table->renameColumn( 'exterior_photo' , 'medical_certificate');
            $table->dropColumn('financial_year')->nullable()->after('full_address');
            $table->dropColumn('to_year')->nullable()->after('financial_year');
            $table->dropColumn('amount')->nullable()->after('to_year');
            $table->dropColumn('trade_type')->nullable()->after('amount');
            $table->dropColumn('rate')->nullable()->after('trade_type');
            $table->dropColumn('trade')->nullable()->after('rate');
            $table->dropColumn('manufactured')->nullable()->after('trade');
            $table->dropColumn('business_premises')->nullable()->after('manufactured');
            $table->dropColumn('owner_place')->nullable()->after('business_premises');
            $table->dropColumn('rental_agreement')->nullable()->after('owner_place');
            $table->dropColumn('noc_certificate')->nullable()->after('rental_agreement');
            $table->dropColumn('business_start')->nullable()->after('noc_certificate');
            $table->dropColumn('registration_no')->nullable()->after('business_start');
            $table->dropColumn('food_drug')->nullable()->after('registration_no');
            $table->dropColumn('director_name')->nullable()->after('food_drug');
            $table->dropColumn('contact_no')->nullable()->after('director_name');
            $table->dropColumn('alternet_email')->nullable()->after('contact_no');
            $table->dropColumn('gender')->nullable()->after('alternet_email');
            $table->dropColumn('alternet_address')->nullable()->after('gender');
            $table->dropColumn('application_type')->nullable()->after('alternet_address');
        });
    }
};
