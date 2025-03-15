<?php

namespace App\Http\Controllers;

use App\Http\Requests\MobileTower\UpdateRequest;
use App\Http\Requests\MobileTower\CreateRequest;
use App\Models\NatureBusiness;
use Illuminate\Http\Request;
use App\Services\CommonService;
use App\Services\MobileTowerService;
use GuzzleHttp\Promise\Create;

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

        $nature_busis = NatureBusiness::all();

        return view('mobile-tower.create')->with([
            'wards' => $wards,
            'zones' => $zones,
            'nature_busis' => $nature_busis,
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(CreateRequest $request)
    {
        // dd($request);
        $mobileTowerService = $this->mobiletower->store($request);

        //  dd($mobileTowerService);
        if ($mobileTowerService[0]) {
            return response()->json([
                'success' => 'Mobile Tower Permission save successfully',
                'redirect' => back()
            ], 200);
        } else {
            return response()->json([
                'error' => $mobileTowerService[1]
            ], 500);
        }
    }
    public function edit($id)
    {
        // return encrypt($id);
        $mobileTowerService = $this->mobiletower->edit(decrypt($id));

        //$permissionshooting = PermissionShooting::findOrFail->edit(decrypt($id));


        $wards = $this->commonService->getActiveWard();

        $zones = $this->commonService->getActiveZone();
    $nature_busis = NatureBusiness::all();
        //return $permissionshooting;
        // dd($permissionshooting);
        return view('mobile-tower.update')->with([
            'wards' => $wards,
            'zones' => $zones,
            'mobileTowerService' => $mobileTowerService,
            'nature_busis'=>$nature_busis,
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateRequest $request, $id)
    {
        // dd($request->all());
        $mobileTowerService = $this->mobiletower->update($request, $id);
        if ($mobileTowerService) {
            return response()->json([
                'success' => 'Mobile Tower Permission updated successfully'
            ]);
        } else {
            return response()->json([
                'error' => 'Something went wrong, please try again'
            ]);
        }
    }
}
