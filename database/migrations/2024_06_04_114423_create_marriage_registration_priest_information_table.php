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
        Schema::create('marriage_reg_priest_info', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('marriage_reg_form_id');
            $table->foreign('marriage_reg_form_id')->references('id')->on('marriage_reg_forms');

            $table->string('priest_info_fname_in_english')->nullable();
            $table->string('priest_info_mname_in_english')->nullable();
            $table->string('priest_info_lname_in_english')->nullable();
            $table->string('priest_info_fname_in_marathi')->nullable();
            $table->string('priest_info_mname_in_marathi')->nullable();
            $table->string('priest_info_lname_in_marathi')->nullable();
            $table->text('priest_info_address_in_english')->nullable();
            $table->text('priest_info_address_in_marathi')->nullable();
            $table->string('priest_info_mobile_no')->nullable();
            $table->string('priest_info_age')->nullable();
            $table->string('priest_info_religion')->nullable();
            $table->string('priest_info_upload_signature')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('marriage_reg_priest_info');
    }
};
