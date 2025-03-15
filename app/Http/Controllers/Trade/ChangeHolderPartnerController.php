<?php

namespace App\Http\Controllers\Trade;

use App\Http\Controllers\Controller;
use App\Http\Requests\Trade\ChangeHolderPartner\CreateRequest;
use App\Http\Requests\Trade\ChangeHolderPartner\UpdateRequest;
use App\Models\Trade\PartnerChange;
use App\Services\CommonService;
use App\Services\Trade\ChangeHolderPartnerService;
use Illuminate\Http\Request;

class ChangeHolderPartnerController extends Controller
{
    protected $commonService;
    protected $changeHolderPartner;


    // Constructor for dependency injection
    public function __construct(ChangeHolderPartnerService $changeHolderPartner, CommonService $commonService)
    {
        $this->changeHolderPartner = $changeHolderPartner;
        $this->commonService = $commonService;
    }

    // Display the create form
    public function create()
    {
        // Get active wards and zones from CommonService
        $wards = $this->commonService->getActiveWard();
        $zones = $this->commonService->getActiveZone();

        // Return the create view with wards and zones data

        $partnerChanges = PartnerChange::all();
        return view('trade.change-holder-partner.create', compact('partnerChanges'))->with([
            'wards' => $wards,
            'zones' => $zones,
        ]);
    }

    // Store the newly created abattoir license
    public function store(CreateRequest $request)
    {

        // Call the store method in the service and get the response
        $changeHolderPartner = $this->changeHolderPartner->store($request);

        // dd($request);
        // Check if the license was successfully saved
        if ($changeHolderPartner[0]) {
            return response()->json([
                'success' => 'Trade Change Business Holder/Partner saved successfully'
            ]);
        } else {
            return response()->json([
                'error' => $changeHolderPartner[1]
            ]);
        }
    }



    public function edit($id)
    {
            //    return encrypt($id);
        $changeHolderPartner = $this->changeHolderPartner->edit(decrypt($id));

        // $advertisementPermission = AdvertisementPermission::find($id);

        //  //return $advertisementPermission;

        $wards = $this->commonService->getActiveWard();

        $zones = $this->commonService->getActiveZone();

        $partnerchanges =PartnerChange::where('partner_change_id',decrypt($id))->get();
        // dd($partnerchanges);
        // $data = AdvertisementPermission::findOrFail($id);

        return view('trade.change-holder-partner.update',compact('partnerchanges'))->with([
            'changeHolderPartner'=>  $changeHolderPartner,
            'wards' => $wards,
            'zones' => $zones,
            // 'data' => '$data',

            'changeHolderPartner' => $changeHolderPartner
        ]);
    }
    public function update(UpdateRequest $request, $id)
    {
        // dd($request);
        $changeHolderPartner = $this->changeHolderPartner->update($request, $id);


        if ($changeHolderPartner) {
            return response()->json([
                'success' => 'Trade Change Business Holder/Partner updated successfully'
            ]);
        } else {
            return response()->json([
                'error' => 'Something went wrong, please try again'
            ]);
        }
    }
}
