<?php

namespace App\Services\Trade\LicenseTransfer;

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Log;
use App\Models\Trade\TradeLicenseTransfer;
use App\Models\ServiceCredential;
use App\Services\CurlAPiService;
use App\Services\AapaleSarkarLoginCheckService;

class LicenseTransferService
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
            if ($request->hasFile('application_documents')) {
                $request['application_document'] = $request->application_documents->store('trade/license-transfer');
            }

            if ($request->hasFile('no_dues_documents')) {
                $request['no_dues_document'] = $request->no_dues_documents->store('trade/license-transfer');
            }

            TradeLicenseTransfer::create($request->all());

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
        return TradeLicenseTransfer::find($id);
    }

    public function update($request, $id)
    {
        DB::beginTransaction();
        try {
            // Find the existing record
            $tradeLicenseTransfer = TradeLicenseTransfer::findOrFail($id);

            // Handle file uploads and update original file names
            if ($request->hasFile('application_documents')) {
                if ($tradeLicenseTransfer && Storage::exists($tradeLicenseTransfer->application_document)) {
                    Storage::delete($tradeLicenseTransfer->application_document);
                }
                $request['application_document'] = $request->application_documents->store('trade/license-transfer');
            }

            if ($request->hasFile('no_dues_documents')) {
                if ($tradeLicenseTransfer && Storage::exists($tradeLicenseTransfer->no_dues_document)) {
                    Storage::delete($tradeLicenseTransfer->no_dues_document);
                }
                $request['no_dues_document'] = $request->no_dues_documents->store('trade/license-transfer');
            }
            $tradeLicenseTransfer->update($request->all());

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
