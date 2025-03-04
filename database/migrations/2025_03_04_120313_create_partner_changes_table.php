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
        Schema::create('partner_changes', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('partner_change_id');
            $table->foreign('partner_change_id')->references('id')->on('business_partner_changes')->onDelete('cascade');
            $table->string('partner_name')->nullable();
            $table->bigInteger('partner_aadhar')->nullable();
            $table->string('partner_address')->nullable();
            $table->bigInteger('partner_mobile_num')->nullable();
            $table->string('partner_email')->nullable();
            $table->integer('partner_status')->nullable()->comment('1:active,2:inactive');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('partner_changes');
    }
};
