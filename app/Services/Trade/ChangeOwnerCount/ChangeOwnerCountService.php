<?php

namespace App\Services\Trade\ChangeOwnerCount;

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Log;
use App\Models\Trade\TradeChangeOwnerCount;
use App\Models\ServiceCredential;
use App\Services\CurlAPiService;
use App\Services\AapaleSarkarLoginCheckService;

class ChangeOwnerCountService
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
            $application_document = null;

            if ($request->hasFile('application_documents')) {
                $request['application_document'] = $request->application_documents->store('trade/change-owner-count');
            }

            TradeChangeOwnerCount::create($request->all());

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
        return TradeChangeOwnerCount::find($id);
    }

    public function update($request, $id)
    {
        DB::beginTransaction();

        try {

            // Find the existing record
            $tradeChangeOwnerCount = TradeChangeOwnerCount::findOrFail($id);

            // Handle file uploads and update original file names
            if ($request->hasFile('application_documents')) {
                if ($tradeChangeOwnerCount && Storage::exists($tradeChangeOwnerCount->application_document)) {
                    Storage::delete($tradeChangeOwnerCount->application_document);
                }
                $request['application_document'] = $request->application_documents->store('trade/change-owner-count');
            }
            $tradeChangeOwnerCount->update($request->all());

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
