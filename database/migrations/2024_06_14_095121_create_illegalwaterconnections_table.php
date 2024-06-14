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
        Schema::create('illegalwaterconnections', function (Blueprint $table) {
            $table->id();
            $table->integer('user_id')->nullable();
            $table->boolean('is_aapale_sarkar_payment_paid')->nullable();
            $table->string('complainants_full_name')->nullable();
            $table->string('address')->nullable();
            $table->string('aadhar_no')->nullable();
            $table->string('mobile_no')->nullable();
            $table->string('email_id')->nullable();
            $table->string('unauthorized_tap_connection')->nullable();
            $table->string('zone')->nullable();
            $table->text('ward_area')->nullable();
            $table->string('plot_no')->nullable();
            $table->string('house_no')->nullable();
            $table->string('landmark')->nullable();
            $table->text('unauthorized_connection_address')->nullable();
            $table->string('current_connection_is_authorized')->nullable();
            $table->string('applicant_or_tenant')->nullable();
            $table->string('unauthorized_is_tenant')->nullable();
            $table->string('criminal_judicial_issue')->nullable();
            $table->string('existing_connection_detail')->nullable();
            $table->string('place_belongs_to_municipal')->nullable();
            $table->string('comment')->nullable();
            $table->string('application_document')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('illegalwaterconnections');
    }
};
