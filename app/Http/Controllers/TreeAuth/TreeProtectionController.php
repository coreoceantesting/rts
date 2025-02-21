<?php

namespace App\Http\Controllers\TreeAuth;

use App\Http\Controllers\Controller;
use App\Services\CommonService;
use App\Services\TreeAuth\TreeProtectionService;
use Illuminate\Http\Request;

class TreeProtectionController extends Controller
{
    protected $commonService;
    protected $treeProtection;


    // Constructor for dependency injection
    public function __construct(TreeProtectionService $treeProtection, CommonService $commonService)
    {
        $this->treeProtection = $treeProtection;
        $this->commonService = $commonService;
    }

    // Display the create form
    public function create()
    {
        // Get active wards and zones from CommonService
        $wards = $this->commonService->getActiveWard();
        $zones = $this->commonService->getActiveZone();

        // Return the create view with wards and zones data
        return view('tree-auth.tree-protection.create')->with([
            'wards' => $wards,
            'zones' => $zones,
        ]);
    }

    // Store the newly created abattoir license
    public function store(Request $request)
    {
        // Call the store method in the service and get the response
        $treeProtection = $this->treeProtection->store($request);

        // dd($request);
        // Check if the license was successfully saved
        if ($treeProtection[0]) {
            return response()->json([
                'success' => 'Tree Protection saved successfully'
            ]);
        } else {
            return response()->json([
                'error' => $treeProtection[1]
            ]);
        }
    }



    public function edit($id)
    {
                // return encrypt($id);
        $treeProtection = $this->treeProtection->edit(decrypt($id));

        // $advertisementPermission = AdvertisementPermission::find($id);

        //  //return $advertisementPermission;

        $wards = $this->commonService->getActiveWard();

        $zones = $this->commonService->getActiveZone();

        // $data = AdvertisementPermission::findOrFail($id);

        return view('tree-auth.tree-protection.update')->with([
            'treeProtection'=>  $treeProtection,
            'wards' => $wards,
            'zones' => $zones,
            // 'data' => '$data',

            'advertisemenent' => $treeProtection
        ]);
    }
    public function update(Request $request, $id)
    {
        // dd($request->all());
        $trade = $this->treeProtection->update($request, $id);

        return response()->json(['success' => 'Tree Protection update successfully!']);
    }
}
