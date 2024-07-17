<?php

namespace App\Services\Trade\LicenseCancellation;

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Log;
use App\Models\Trade\TradeLicenseCancellation;
use App\Models\ServiceCredential;
use App\Services\CurlAPiService;
use App\Services\AapaleSarkarLoginCheckService;

class LicenseCancellationService
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
                $request['application_document'] = $request->application_documents->store('trade/license-cancellation');
            }

            TradeLicenseCancellation::create($request->all());

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
        return TradeLicenseCancellation::find($id);
    }

    public function update($request, $id)
    {
        DB::beginTransaction();

        try {

            // Find the existing record
            $tradeLicenseCancellation = TradeLicenseCancellation::findOrFail($id);

            // Handle file uploads and update original file names
            if ($request->hasFile('application_documents')) {
                if ($tradeLicenseCancellation && Storage::exists($tradeLicenseCancellation->application_document)) {
                    Storage::delete($tradeLicenseCancellation->application_document);
                }
                $request['application_document'] = $request->application_documents->store('trade/license-cancellation');
            }
            $tradeLicenseCancellation->update($request->all());

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
