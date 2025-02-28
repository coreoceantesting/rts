<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Services\CommonService;
use App\Services\MobileTowerService;

class MobileTowerController extends Controller
{
    protected $commonService;
    protected $mobiletower;



    public function __construct(MobileTowerService $mobileTowerService, CommonService $commonService)
    {
        $this->mobiletower = $mobileTowerService;
        $this->commonService = $commonService;
    }



    public function index()
    {
        //
    }

    public function create()
    {
        $wards = $this->commonService->getActiveWard();


        $zones = $this->commonService->getActiveZone();

        return view('mobile-tower.create')->with([
            'wards' => $wards,
            'zones' => $zones,
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {

        $mobileTowerService = $this->mobiletower->store($request);
        //dd($request->all());
        if ($mobileTowerService[0]) {
            return response()->json([
                'success' => 'Mobile Tower Permission save successfully'
            ]);
        } else {
            return response()->json([
                'error' => $mobileTowerService[1]
            ]);
        }
    }
    public function edit($id)
    {
        // return encrypt($id);
        $mobileTowerService = $this->mobiletower->edit(decrypt($id));

        //$permissionshooting = PermissionShooting::findOrFail->edit(decrypt($id));


        $wards = $this->commonService->getActiveWard();

        $zones = $this->commonService->getActiveZone();

        //return $permissionshooting;
        // dd($permissionshooting);
        return view('mobile-tower.update')->with([
            'wards' => $wards,
            'zones' => $zones,
            'mobileTowerService' => $mobileTowerService,
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        // dd($request->all());
        $mobileTowerService = $this->mobiletower->update($request, $id);

        // dd($request->all());
        //  $permissionshooting = PermissionShooting::findOrFail->update($request, $id);
        return response()->json(['success' => 'Mobile Tower Permission update successfully!']);
    }
}
