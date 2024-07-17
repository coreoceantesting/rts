<?php

namespace App\Services\Trade\NocForMandap;

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Log;
use App\Models\Trade\TradeNocForMandap;
use App\Models\ServiceCredential;
use App\Services\CurlAPiService;
use App\Services\AapaleSarkarLoginCheckService;

class NocForMandapService
{
    protected $curlAPiService;
    protected $aapaleSarkarLoginCheckService;

    public function __construct(CurlAPiService $curlAPiService, AapaleSarkarLoginCheckService $aapaleSarkarLoginCheckService)
    {
        $this->curlAPiService = $curlAPiService;
        $this->aapaleSarkarLoginCheckService = $aapaleSarkarLoginCheckService;
    }

    public function store($request)
    {
        DB::beginTransaction();

        try {
            $request['user_id'] = Auth::user()->id;
            // Handle file uploads and store original file names
            if ($request->hasFile('board_registration_documents')) {
                $request['board_registration_document'] = $request->board_registration_documents->store('trade/noc-for-mandap');
            }

            if ($request->hasFile('no_objection_documents')) {
                $request['no_objection_document'] = $request->no_objection_documents->store('trade/noc-for-mandap');
            }

            if ($request->hasFile('location_map_documents')) {
                $request['location_map_document'] = $request->location_map_documents->store('trade/noc-for-mandap');
            }

            if ($request->hasFile('fire_last_year_noObjection_documents')) {
                $request['fire_last_year_noObjection_document'] = $request->fire_last_year_noObjection_documents->store('trade/noc-for-mandap');
            }

            if ($request->hasFile('traffic_last_year_noObjection_documents')) {
                $request['traffic_last_year_noObjection_document'] = $request->traffic_last_year_noObjection_documents->store('trade/noc-for-mandap');
            }

            if ($request->hasFile('annexures')) {
                $request['annexure'] = $request->annexures->store('trade/noc-for-mandap');
            }
            TradeNocForMandap::create($request->all());

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
            $tradeNocForMandap = TradeNocForMandap::findOrFail($id);

            // Handle file uploads and update original file names
            if ($request->hasFile('board_registration_documents')) {
                if ($tradeNocForMandap && Storage::exists($tradeNocForMandap->board_registration_document)) {
                    Storage::delete($tradeNocForMandap->board_registration_document);
                }
                $request['board_registration_document'] = $request->board_registration_documents->store('trade/noc-for-mandap');
            }

            if ($request->hasFile('no_objection_documents')) {
                if ($tradeNocForMandap && Storage::exists($tradeNocForMandap->no_objection_document)) {
                    Storage::delete($tradeNocForMandap->no_objection_document);
                }
                $request['no_objection_document'] = $request->no_objection_documents->store('trade/noc-for-mandap');
            }
            if ($request->hasFile('location_map_documents')) {
                if ($tradeNocForMandap && Storage::exists($tradeNocForMandap->location_map_document)) {
                    Storage::delete($tradeNocForMandap->location_map_document);
                }
                $request['location_map_document'] = $request->location_map_documents->store('trade/noc-for-mandap');
            }
            if ($request->hasFile('fire_last_year_noObjection_documents')) {
                if ($tradeNocForMandap && Storage::exists($tradeNocForMandap->fire_last_year_noObjection_document)) {
                    Storage::delete($tradeNocForMandap->fire_last_year_noObjection_document);
                }
                $request['fire_last_year_noObjection_document'] = $request->fire_last_year_noObjection_documents->store('trade/noc-for-mandap');
            }
            if ($request->hasFile('traffic_last_year_noObjection_documents')) {
                if ($tradeNocForMandap && Storage::exists($tradeNocForMandap->traffic_last_year_noObjection_document)) {
                    Storage::delete($tradeNocForMandap->traffic_last_year_noObjection_document);
                }
                $request['traffic_last_year_noObjection_document'] = $request->traffic_last_year_noObjection_documents->store('trade/noc-for-mandap');
            }
            if ($request->hasFile('annexures')) {
                if ($tradeNocForMandap && Storage::exists($tradeNocForMandap->annexure)) {
                    Storage::delete($tradeNocForMandap->annexure);
                }
                $request['annexure'] = $request->annexures->store('trade/noc-for-mandap');
            }
            $tradeNocForMandap->update($request->all());

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
