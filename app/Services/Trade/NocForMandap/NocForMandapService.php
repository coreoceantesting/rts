<?php

namespace App\Services\Trade\NocForMandap;

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Log;
use App\Models\Trade\TradeNocForMandap;

class NocForMandapService
{
    public function store($request)
    {
        DB::beginTransaction();

        try {
            $user_id = Auth::user()->id;
            // Handle file uploads and store original file names
            $board_registration_document = null;
            $no_objection_document = null;
            $location_map_document = null;
            $fire_last_year_noObjection_document = null;
            $traffic_last_year_noObjection_document = null;
            $annexure = null;


            if ($request->hasFile('board_registration_document')) {
                $fileone = $request->file('board_registration_document');
                $board_registration_document = time() . '_' . $fileone->getClientOriginalName();
                $fileone->storeAs('public/Trade/NocForMandap', $board_registration_document);
            }

            if ($request->hasFile('no_objection_document')) {
                $filetwo = $request->file('no_objection_document');
                $no_objection_document = time() . '_' . $filetwo->getClientOriginalName();
                $filetwo->storeAs('public/Trade/NocForMandap', $no_objection_document);
            }

            if ($request->hasFile('location_map_document')) {
                $filethree = $request->file('location_map_document');
                $location_map_document = time() . '_' . $filethree->getClientOriginalName();
                $filethree->storeAs('public/Trade/NocForMandap', $location_map_document);
            }

            if ($request->hasFile('fire_last_year_noObjection_document')) {
                $filefour = $request->file('fire_last_year_noObjection_document');
                $fire_last_year_noObjection_document = time() . '_' . $filefour->getClientOriginalName();
                $filefour->storeAs('public/Trade/NocForMandap', $fire_last_year_noObjection_document);
            }

            if ($request->hasFile('traffic_last_year_noObjection_document')) {
                $filefive = $request->file('traffic_last_year_noObjection_document');
                $traffic_last_year_noObjection_document = time() . '_' . $filefive->getClientOriginalName();
                $filefive->storeAs('public/Trade/NocForMandap', $traffic_last_year_noObjection_document);
            }

            if ($request->hasFile('annexure')) {
                $filesix = $request->file('annexure');
                $annexure = time() . '_' . $filesix->getClientOriginalName();
                $filesix->storeAs('public/Trade/NocForMandap', $annexure);
            }

            TradeNocForMandap::create([
                'user_id' => $user_id,
                'applicant_name' => $request->input('applicant_name'),
                'event_name' => $request->input('event_name'),
                'commissioner_name' => $request->input('commissioner_name'),
                'registration_no' => $request->input('registration_no'),
                'registration_year' => $request->input('registration_year'),
                'name_of_chairman' => $request->input('name_of_chairman'), 
                'president_mobile_no' => $request->input('president_mobile_no'),
                'ownership_of_place' => $request->input('ownership_of_place'),
                'stage_permission_date' => $request->input('stage_permission_date'),
                'stage_permission_end_date' => $request->input('stage_permission_end_date'),
                'no_of_days' => $request->input('no_of_days'),
                'stage_address' => $request->input('stage_address'),
                'zone' => $request->input('zone'),
                'ward_area' => $request->input('ward_area'),
                'plot_no' => $request->input('plot_no'),
                'stage_height' => $request->input('stage_height'),
                'stage_length' => $request->input('stage_length'),
                'stage_Width' => $request->input('stage_Width'),
                'stage_area' => $request->input('stage_area'),
                'no_of_volunteer_workers' => $request->input('no_of_volunteer_workers'),
                'stage_contractor_address' => $request->input('stage_contractor_address'),
                'contractor_contact_no' => $request->input('contractor_contact_no'),
                'decorator_or_electrical_contractor_name' => $request->input('decorator_or_electrical_contractor_name'),
                'decorator_or_contractor_address' => $request->input('decorator_or_contractor_address'),
                'decorator_or_electrical_contractor_contact_no' => $request->input('decorator_or_electrical_contractor_contact_no'),
                'sound_or_speaker_contractor_name' => $request->input('sound_or_speaker_contractor_name'),
                'sound_or_speaker_address' => $request->input('sound_or_speaker_address'),
                'sound_or_speaker_contractor_contact_no' => $request->input('sound_or_speaker_contractor_contact_no'),
                'sound_or_speaker_type' => $request->input('sound_or_speaker_type'),
                'concerned_police_station' => $request->input('concerned_police_station'),
                'concerned_traffic_police_station' => $request->input('concerned_traffic_police_station'),
                'nearest_fire_station' => $request->input('nearest_fire_station'),
                'board_registration_document' => $board_registration_document,
                'no_objection_document' => $no_objection_document,
                'location_map_document' => $location_map_document,
                'fire_last_year_noObjection_document' => $fire_last_year_noObjection_document,
                'traffic_last_year_noObjection_document' => $traffic_last_year_noObjection_document,
                'annexure' => $annexure,
            ]);

            DB::commit();
            return true;
        } catch (\Exception $e) {
            DB::rollback();
            Log::error('Error in store method: ' . $e->getMessage());
            return false;
        }
    }


    public function edit($id)
    {
        return TradeNocForMandap::find($id);
    }

    public function update($request, $id)
    {
        DB::beginTransaction();

        try {

                // Find the existing record
                $TradeNocForMandap = TradeNocForMandap::findOrFail($id);

                // Handle file uploads and update original file names
                if ($request->hasFile('board_registration_document')) {
                    $fileone = $request->file('board_registration_document');
                    $board_registration_document = time() . '_' . $fileone->getClientOriginalName();
                    $fileone->storeAs('public/Trade/NocForMandap', $board_registration_document);
                    $TradeNocForMandap->board_registration_document = $board_registration_document;
                }

                if ($request->hasFile('no_objection_document')) {
                    $filetwo = $request->file('no_objection_document');
                    $no_objection_document = time() . '_' . $filetwo->getClientOriginalName();
                    $filetwo->storeAs('public/Trade/NocForMandap', $no_objection_document);
                    $TradeNocForMandap->no_objection_document = $no_objection_document;
                }
                if ($request->hasFile('location_map_document')) {
                    $filethree = $request->file('location_map_document');
                    $location_map_document = time() . '_' . $filethree->getClientOriginalName();
                    $filethree->storeAs('public/Trade/NocForMandap', $location_map_document);
                    $TradeNocForMandap->location_map_document = $location_map_document;
                }
                if ($request->hasFile('fire_last_year_noObjection_document')) {
                    $filefour = $request->file('fire_last_year_noObjection_document');
                    $fire_last_year_noObjection_document = time() . '_' . $filefour->getClientOriginalName();
                    $filefour->storeAs('public/Trade/NocForMandap', $fire_last_year_noObjection_document);
                    $TradeNocForMandap->fire_last_year_noObjection_document = $fire_last_year_noObjection_document;
                }
                if ($request->hasFile('traffic_last_year_noObjection_document')) {
                    $filefive = $request->file('traffic_last_year_noObjection_document');
                    $traffic_last_year_noObjection_document = time() . '_' . $filefive->getClientOriginalName();
                    $filefive->storeAs('public/Trade/NocForMandap', $traffic_last_year_noObjection_document);
                    $TradeNocForMandap->traffic_last_year_noObjection_document = $traffic_last_year_noObjection_document;
                }
                if ($request->hasFile('annexure')) {
                    $filesix = $request->file('annexure');
                    $annexure = time() . '_' . $filesix->getClientOriginalName();
                    $filesix->storeAs('public/Trade/NocForMandap', $annexure);
                    $TradeNocForMandap->annexure = $annexure;
                }

                $TradeNocForMandap->update([
                    'applicant_name' => $request->input('applicant_name'),
                    'event_name' => $request->input('event_name'),
                    'commissioner_name' => $request->input('commissioner_name'),
                    'registration_no' => $request->input('registration_no'),
                    'registration_year' => $request->input('registration_year'),
                    'name_of_chairman' => $request->input('name_of_chairman'), 
                    'president_mobile_no' => $request->input('president_mobile_no'),
                    'ownership_of_place' => $request->input('ownership_of_place'),
                    'stage_permission_date' => $request->input('stage_permission_date'),
                    'stage_permission_end_date' => $request->input('stage_permission_end_date'),
                    'no_of_days' => $request->input('no_of_days'),
                    'stage_address' => $request->input('stage_address'),
                    'zone' => $request->input('zone'),
                    'ward_area' => $request->input('ward_area'),
                    'plot_no' => $request->input('plot_no'),
                    'stage_height' => $request->input('stage_height'),
                    'stage_length' => $request->input('stage_length'),
                    'stage_Width' => $request->input('stage_Width'),
                    'stage_area' => $request->input('stage_area'),
                    'no_of_volunteer_workers' => $request->input('no_of_volunteer_workers'),
                    'stage_contractor_address' => $request->input('stage_contractor_address'),
                    'contractor_contact_no' => $request->input('contractor_contact_no'),
                    'decorator_or_electrical_contractor_name' => $request->input('decorator_or_electrical_contractor_name'),
                    'decorator_or_contractor_address' => $request->input('decorator_or_contractor_address'),
                    'decorator_or_electrical_contractor_contact_no' => $request->input('decorator_or_electrical_contractor_contact_no'),
                    'sound_or_speaker_contractor_name' => $request->input('sound_or_speaker_contractor_name'),
                    'sound_or_speaker_address' => $request->input('sound_or_speaker_address'),
                    'sound_or_speaker_contractor_contact_no' => $request->input('sound_or_speaker_contractor_contact_no'),
                    'sound_or_speaker_type' => $request->input('sound_or_speaker_type'),
                    'concerned_police_station' => $request->input('concerned_police_station'),
                    'concerned_traffic_police_station' => $request->input('concerned_traffic_police_station'),
                    'nearest_fire_station' => $request->input('nearest_fire_station'),
                ]);

                // Commit the transaction
                DB::commit();


            return true;
        } catch (\Exception $e) {
            DB::rollback();
            Log::info($e);
            return false;
        }
    }
}
