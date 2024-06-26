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
            $table->string('aapale_sarkar_payment_date')->nullable()->after('user_id');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('marriage_reg_forms', function (Blueprint $table) {
            $table->dropColumn('aapale_sarkar_payment_date');
        });
    }
};
