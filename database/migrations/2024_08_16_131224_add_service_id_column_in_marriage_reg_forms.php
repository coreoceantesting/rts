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
        Schema::table('marriage_reg_forms', function (Blueprint $table) {
            $table->integer('service_id')->after('user_id')->nullable();
            $table->date('status')->after('service_id')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('marriage_reg_forms', function (Blueprint $table) {
            $table->dropColumn('service_id');
            $table->dropColumn('status');
        });
    }
};
