<?php

namespace App\Http\Controllers\Trade;

use App\Http\Controllers\Controller;
use App\Services\CommonService;
use Illuminate\Http\Request;
use App\Services\Trade\TradeNocService;


class TradeNocController extends Controller
{
    protected $commonService;
    protected $tradenoc;


    // Constructor for dependency injection
    public function __construct(TradeNocService $trade, CommonService $commonService)
    {
        $this->tradenoc = $trade;
        $this->commonService = $commonService;
    }

    // Display the create form
    public function create()
    {
        // Get active wards and zones from CommonService
        $wards = $this->commonService->getActiveWard();
        $zones = $this->commonService->getActiveZone();

        // Return the create view with wards and zones data
        return view('trade.trade-noc.create')->with([
            'wards' => $wards,
            'zones' => $zones,
        ]);
    }

    // Store the newly created abattoir license
    public function store(Request $request)
    {

        // Call the store method in the service and get the response
        $trade = $this->tradenoc->store($request);

        // dd($request);
        // Check if the license was successfully saved
        if ($trade[0]) {
            return response()->json([
                'success' => 'New Trade saved successfully'
            ]);
        } else {
            return response()->json([
                'error' => $trade[1]
            ]);
        }
    }



    public function edit($id)
    {
    //  return encrypt($id);
        $trade = $this->tradenoc->edit(decrypt($id));

        // $advertisementPermission = AdvertisementPermission::find($id);

        //  //return $advertisementPermission;

        $wards = $this->commonService->getActiveWard();

        $zones = $this->commonService->getActiveZone();

        // $data = AdvertisementPermission::findOrFail($id);

        return view('trade.trade-noc.update')->with([
            'trade'=>  $trade,
            'wards' => $wards,
            'zones' => $zones,
            // 'data' => '$data',

            'advertisemenent' => $trade
        ]);
    }
    public function update(Request $request, $id)
    {
        // dd($request->all());
        $trade = $this->tradenoc->update($request, $id);

        return response()->json(['success' => 'New Trade update successfully!']);
    }
}
