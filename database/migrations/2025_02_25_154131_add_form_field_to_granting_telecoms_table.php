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
        Schema::table('granting_telecoms', function (Blueprint $table) {
            $table->bigInteger('property_num')->nullable()->after('aadhar_num');
            $table->string('road_type')->nullable()->after('property_num');
            $table->bigInteger('length_road')->nullable()->after('road_type');
            $table->bigInteger('width_road')->nullable()->after('length_road');
            $table->bigInteger('length_width')->nullable()->after('width_road');
            $table->bigInteger('digging_size')->nullable()->after('length_width');
            $table->string('start_point')->nullable()->after('digging_size');
            $table->string('end_point')->nullable()->after('start_point');
            $table->bigInteger('latitude')->nullable()->after('end_point');
            $table->bigInteger('longitude')->nullable()->after('latitude');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('granting_telecoms', function (Blueprint $table) {
            $table->dropColumn('property_num')->nullable()->after('aadhar_num');
            $table->dropColumn('road_type')->nullable()->after('property_num');
            $table->dropColumn('length_road')->nullable()->after('road_type');
            $table->dropColumn('width_road')->nullable()->after('length_road');
            $table->dropColumn('length_width')->nullable()->after('width_road');
            $table->dropColumn('digging_size')->nullable()->after('length_width');
            $table->dropColumn('start_point')->nullable()->after('digging_size');
            $table->dropColumn('end_point')->nullable()->after('start_point');
            $table->dropColumn('latitude')->nullable()->after('end_point');
            $table->dropColumn('longitude')->nullable()->after('latitude');
        });
    }
};
