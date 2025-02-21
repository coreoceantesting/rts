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
        Schema::table('tree_protections', function (Blueprint $table) {
            $table->string('title_of_application')->nullable()->before('f_name');
            $table->string('flat_no')->nullable()->after('l_name');
            $table->string('building_no')->nullable()->after('flat_no');
            $table->string('area')->nullable()->after('building_no');
            $table->string('city')->nullable()->after('area');
            $table->integer('pincode')->after('city');
            $table->string('landmark')->nullable()->after('pincode');
            $table->string('gut_number')->nullable()->after('landmark');
            $table->string('type_application')->nullable()->after('gut_number');
            $table->string('reason_trim')->nullable()->after('type_application');
            $table->string('owner')->nullable()->after('reason_trim');
            $table->string('type_of_tree')->nullable()->after('owner');
            $table->string('paid_receipt')->nullable()->after('type_of_tree');
            $table->string('photo_tree')->nullable()->after('paid_receipt');
            $table->string('aadhar')->nullable()->after('photo_tree');
            $table->string('building_permission')->nullable()->after('aadhar');
            $table->string('plan_construction')->nullable()->after('building_permission');
            $table->string('noc_letter')->nullable()->after('plan_construction');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('tree_protections', function (Blueprint $table) {
            $table->string('title_of_application')->nullable()->before('f_name');
            $table->string('flat_no')->nullable()->after('l_name');
            $table->string('building_no')->nullable()->after('flat_no');
            $table->string('area')->nullable()->after('building_no');
            $table->string('city')->nullable()->after('area');
            $table->integer('pincode')->after('city');
            $table->string('landmark')->nullable()->after('pincode');
            $table->string('gut_number')->nullable()->after('landmark');
            $table->string('type_application')->nullable()->after('gut_number');
            $table->string('reason_trim')->nullable()->after('type_application');
            $table->string('owner')->nullable()->after('reason_trim');
            $table->string('type_of_tree')->nullable()->after('owner');
            $table->string('paid_receipt')->nullable()->after('type_of_tree');
            $table->string('photo_tree')->nullable()->after('paid_receipt');
            $table->string('aadhar')->nullable()->after('photo_tree');
            $table->string('building_permission')->nullable()->after('aadhar');
            $table->string('plan_construction')->nullable()->after('building_permission');
            $table->string('noc_letter')->nullable()->after('plan_construction');
        });
    }
};
