<?php

namespace App\Services\Trade\ChangeLicenseName;

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Log;
use App\Models\Trade\TradeChangeLicenseName;
use App\Models\ServiceCredential;
use App\Services\CurlAPiService;
use App\Services\AapaleSarkarLoginCheckService;

class ChangeLicenseNameService
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
            if ($request->hasFile('no_dues_documents')) {
                $request['no_dues_document'] = $request->no_dues_documents->store('trade/change-license-name');
            }

            if ($request->hasFile('application_documents')) {
                $request['application_document'] = $request->application_documents->store('trade/change-license-name');
            }

            TradeChangeLicenseName::create($request->all());

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
        return TradeChangeLicenseName::find($id);
    }

    public function update($request, $id)
    {
        DB::beginTransaction();

        try {

            // Find the existing record
            $tradeChangeLicenseName = TradeChangeLicenseName::findOrFail($id);

            // Handle file uploads and update original file names
            if ($request->hasFile('no_dues_documents')) {
                if ($tradeChangeLicenseName && Storage::exists($tradeChangeLicenseName->no_dues_document)) {
                    Storage::delete($tradeChangeLicenseName->no_dues_document);
                }
                $request['no_dues_document'] = $request->no_dues_documents->store('trade/change-license-name');
            }

            if ($request->hasFile('application_documents')) {
                if ($tradeChangeLicenseName && Storage::exists($tradeChangeLicenseName->application_document)) {
                    Storage::delete($tradeChangeLicenseName->application_document);
                }
                $request['application_document'] = $request->application_documents->store('trade/change-license-name');
            }


            $tradeChangeLicenseName->update($request->all());

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
