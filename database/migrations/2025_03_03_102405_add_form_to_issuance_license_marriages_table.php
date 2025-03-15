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
        Schema::table('issuance_license_marriages', function (Blueprint $table) {
            $table->string('ward_area')->nullable()->after('zone');
            $table->string('shop_name')->nullable()->after('ward_area');
            $table->string('marathi_shop_name')->nullable()->after('shop_name');
            $table->string('pencard_num')->nullable()->after('marathi_shop_name');
            $table->string('e_mail')->nullable()->after('mobile_num');
            $table->integer('financial_year')->nullable()->after('e_mail');
            $table->integer('to_year')->nullable()->after('financial_year');
            $table->integer('amount')->nullable()->after('to_year');
            $table->string('trade_type')->nullable()->after('amount');
            $table->integer('rate')->nullable()->after('trade_type');
            $table->string('trade')->nullable()->after('rate');
            $table->string('manufactured')->nullable()->after('trade');
            $table->string('business_premises')->nullable()->after('manufactured');
            $table->string('owner_place')->nullable()->after('business_premises');
            $table->string('address_owner_premises')->nullable()->after('owner_place');
            $table->string('rental_agreement')->nullable()->after('address_owner_premises');
            $table->integer('area_used')->nullable()->after('rental_agreement');
            $table->string('noc_certificate')->nullable()->after('area_used');
            $table->integer('business_start')->nullable()->after('noc_certificate');
            $table->string('registration_no')->nullable()->after('business_start');
            $table->string('food_drug')->nullable()->after('registration_no');
            $table->bigInteger('aadharcard_number')->nullable()->after('food_drug');
            $table->string('director_name')->nullable()->after('aadharcard_number');
            $table->bigInteger('contact_no')->nullable()->after('director_name');
            $table->string('alternet_email')->nullable()->after('contact_no');
            $table->string('gender')->nullable()->after('alternet_email');
            $table->string('alternet_address')->nullable()->after('gender');
            $table->string('application_type')->nullable()->after('alternet_address');
            $table->string('director_image')->nullable()->after('application_type');
            $table->string('other_documents')->nullable()->after('director_image');
            $table->string('fire_certificate')->nullable()->after('director_image');
            $table->string('market_license')->nullable()->after('fire_certificate');
            $table->string('food_drug_img')->nullable()->after('market_license');
            $table->string('shop_act')->nullable()->after('food_drug_img');
            $table->string('pancard_image')->nullable()->after('shop_act');
            $table->string('aadharcard_image')->nullable()->after('pancard_image');
            $table->string('tax_receipt_img')->nullable()->after('aadharcard_image');
            $table->string('interior_photo')->nullable()->after('tax_receipt_img');
            $table->string('exterior_photo')->nullable()->after('interior_photo');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('issuance_license_marriages', function (Blueprint $table) {
            $table->dropColumn('ward_area')->nullable()->after('zone');
            $table->dropColumn('shop_name')->nullable()->after('ward_area');
            $table->dropColumn('marathi_shop_name')->nullable()->after('shop_name');
            $table->dropColumn('pencard_num')->nullable()->after('marathi_shop_name');
            $table->dropColumn('e_mail')->nullable()->after('mobile_num');
            $table->dropColumn('financial_year')->nullable()->after('e_mail');
            $table->dropColumn('to_year')->nullable()->after('financial_year');
            $table->dropColumn('amount')->nullable()->after('to_year');
            $table->dropColumn('trade_type')->nullable()->after('amount');
            $table->dropColumn('rate')->nullable()->after('trade_type');
            $table->dropColumn('trade')->nullable()->after('rate');
            $table->dropColumn('manufactured')->nullable()->after('trade');
            $table->dropColumn('business_premises')->nullable()->after('manufactured');
            $table->dropColumn('owner_place')->nullable()->after('business_premises');
            $table->dropColumn('address_owner_premises')->nullable()->after('owner_place');
            $table->dropColumn('rental_agreement')->nullable()->after('address_owner_premises');
            $table->dropColumn('area_used')->nullable()->after('rental_agreement');
            $table->dropColumn('noc_certificate')->nullable()->after('area_used');
            $table->dropColumn('business_start')->nullable()->after('noc_certificate');
            $table->dropColumn('registration_no')->nullable()->after('business_start');
            $table->dropColumn('food_drug')->nullable()->after('registration_no');
            $table->dropColumn('aadharcard_number')->nullable()->after('food_drug');
            $table->dropColumn('director_name')->nullable()->after('aadharcard_number');
            $table->dropColumn('contact_no')->nullable()->after('director_name');
            $table->dropColumn('alternet_email')->nullable()->after('contact_no');
            $table->dropColumn('gender')->nullable()->after('alternet_email');
            $table->dropColumn('alternet_address')->nullable()->after('gender');
            $table->dropColumn('application_type')->nullable()->after('alternet_address');
            $table->dropColumn('director_image')->nullable()->after('application_type');
            $table->dropColumn('other_documents')->nullable()->after('director_image');
            $table->dropColumn('fire_certificate')->nullable()->after('director_image');
            $table->dropColumn('market_license')->nullable()->after('fire_certificate');
            $table->dropColumn('food_drug_img')->nullable()->after('market_license');
            $table->dropColumn('shop_act')->nullable()->after('food_drug_img');
            $table->dropColumn('pancard_image')->nullable()->after('shop_act');
            $table->dropColumn('aadharcard_image')->nullable()->after('pancard_image');
            $table->dropColumn('tax_receipt_img')->nullable()->after('aadharcard_image');
            $table->dropColumn('interior_photo')->nullable()->after('tax_receipt_img');
            $table->dropColumn('exterior_photo')->nullable()->after('interior_photo');
        });
    }
};
