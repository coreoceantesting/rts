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
        Schema::create('marriage_reg_witness_info', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('marriage_reg_form_id');
            $table->foreign('marriage_reg_form_id')->references('id')->on('marriage_reg_forms');

            // Columns for first witness information
            $table->string('first_witness_info_fname_in_english')->nullable();
            $table->string('first_witness_info_fname_in_marathi')->nullable();
            $table->string('first_witness_info_mobile_no')->nullable();
            $table->string('first_witness_info_dob')->nullable();
            $table->string('first_witness_info_age')->nullable();
            $table->string('first_witness_info_gender')->nullable();
            $table->string('first_witness_info_relation')->nullable();
            $table->text('first_witness_info_address_in_english')->nullable();
            $table->text('first_witness_info_address_in_marathi')->nullable();
            $table->string('first_witness_info_id_proof')->nullable();
            $table->string('first_witness_info_witness_photo')->nullable();
            $table->string('first_witness_info_upload_signature')->nullable();
            $table->string('first_witness_info_upload_document')->nullable();

            // Columns for second witness information
            $table->string('second_witness_info_fname_in_english')->nullable();
            $table->string('second_witness_info_fname_in_marathi')->nullable();
            $table->string('second_witness_info_mobile_no')->nullable();
            $table->string('second_witness_info_dob')->nullable();
            $table->string('second_witness_info_age')->nullable();
            $table->string('second_witness_info_gender')->nullable();
            $table->string('second_witness_info_relation')->nullable();
            $table->text('second_witness_info_address_in_english')->nullable();
            $table->text('second_witness_info_address_in_marathi')->nullable();
            $table->string('second_witness_info_id_proof')->nullable();
            $table->string('second_witness_info_witness_photo')->nullable();
            $table->string('second_witness_info_upload_signature')->nullable();
            $table->string('second_witness_info_upload_document')->nullable();

            // Columns for third witness information
            $table->string('third_witness_info_fname_in_english')->nullable();
            $table->string('third_witness_info_fname_in_marathi')->nullable();
            $table->string('third_witness_info_mobile_no')->nullable();
            $table->string('third_witness_info_dob')->nullable();
            $table->string('third_witness_info_age')->nullable();
            $table->string('third_witness_info_gender')->nullable();
            $table->string('third_witness_info_relation')->nullable();
            $table->text('third_witness_info_address_in_english')->nullable();
            $table->text('third_witness_info_address_in_marathi')->nullable();
            $table->string('third_witness_info_id_proof')->nullable();
            $table->string('third_witness_info_witness_photo')->nullable();
            $table->string('third_witness_info_upload_signature')->nullable();
            $table->string('third_witness_info_upload_document')->nullable();

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('marriage_reg_witness_info');
    }
};
