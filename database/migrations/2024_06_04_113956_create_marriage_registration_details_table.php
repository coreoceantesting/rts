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
        Schema::create('marriage_reg_details', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('marriage_reg_form_id');
            $table->foreign('marriage_reg_form_id')->references('id')->on('marriage_reg_forms');

            $table->date('registration_details_form_filled_date')->nullable();
            $table->date('registration_details_marriage_date_in_english')->nullable();
            $table->string('registration_details_marriage_date_in_marathi')->nullable();
            $table->text('registration_details_marriage_place_in_english')->nullable();
            $table->text('registration_details_marriage_place_in_marathi')->nullable();
            $table->string('registration_details_couple_photo')->nullable();
            $table->string('registration_details_is_widow')->nullable();
            $table->string('registration_details_is_previously_divorced')->nullable();
            $table->string('registration_details_is_marriage_intercaste')->nullable();
            $table->string('registration_details_wedding_card_image')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('marriage_reg_details');
    }
};
