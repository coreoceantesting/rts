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
        Schema::create('trade_noc_for_mandaps', function (Blueprint $table) {
            $table->id();
            $table->integer('user_id')->nullable();
            $table->boolean('is_aapale_sarkar_payment_paid')->nullable();
            $table->string('applicant_name')->nullable();
            $table->string('event_name')->nullable();
            $table->string('commissioner_name')->nullable();
            $table->string('registration_no')->nullable();
            $table->string('registration_year')->nullable();
            $table->string('name_of_chairman')->nullable();
            $table->string('president_mobile_no')->nullable();
            $table->string('ownership_of_place')->nullable();
            $table->date('stage_permission_date')->nullable();
            $table->date('stage_permission_end_date')->nullable();
            $table->string('no_of_days')->nullable();
            $table->text('stage_address')->nullable();
            $table->string('zone')->nullable();
            $table->string('ward_area')->nullable();
            $table->string('plot_no')->nullable();
            $table->string('stage_height')->nullable();
            $table->string('stage_length')->nullable();
            $table->string('stage_Width')->nullable();
            $table->string('stage_area')->nullable();
            $table->string('no_of_volunteer_workers')->nullable();
            $table->text('stage_contractor_address')->nullable();
            $table->string('contractor_contact_no')->nullable();
            $table->string('decorator_or_electrical_contractor_name')->nullable();
            $table->text('decorator_or_contractor_address')->nullable();
            $table->string('decorator_or_electrical_contractor_contact_no')->nullable();
            $table->string('sound_or_speaker_contractor_name')->nullable();
            $table->text('sound_or_speaker_address')->nullable();
            $table->string('sound_or_speaker_contractor_contact_no')->nullable();
            $table->string('sound_or_speaker_type')->nullable();
            $table->string('concerned_police_station')->nullable();
            $table->string('concerned_traffic_police_station')->nullable();
            $table->string('nearest_fire_station')->nullable();
            $table->string('board_registration_document')->nullable();
            $table->string('no_objection_document')->nullable();
            $table->string('location_map_document')->nullable();
            $table->string('fire_last_year_noObjection_document')->nullable();
            $table->string('traffic_last_year_noObjection_document')->nullable();
            $table->string('annexure')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('trade_noc_for_mandaps');
    }
};
