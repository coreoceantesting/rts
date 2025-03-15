<?php

namespace App\Http\Controllers\MallaNisaranDepartment;

use App\Http\Controllers\Controller;
use App\Http\Requests\MallaNisaranDepartment\CreateRequest;
use App\Http\Requests\MallaNisaranDepartment\UpdateRequest;
use App\Services\CommonService;
use App\Services\MallaNisaranDepartment\DrainageService;

use Illuminate\Http\Request;

class DrainageController extends Controller
{
    protected $commonService;
    protected $drainageService;



    public function __construct(DrainageService $drainageService, CommonService $commonService)
    {
        $this->drainageService = $drainageService;
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

        // $nature_busis = NatureBusiness::all();

        return view('mallanisarandepartment.drainage.create')->with([
            'wards' => $wards,
            'zones' => $zones,
            // 'nature_busis' => $nature_busis,
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(CreateRequest $request)
    {
        // dd($request);
        $drainageService = $this->drainageService->store($request);

        //  dd($drainageService);
        if ($drainageService[0]) {
            return response()->json([
                'success' => 'Drainage save successfully',
                'redirect' => back()
            ], 200);
        } else {
            return response()->json([
                'error' => $drainageService[1]
            ], 500);
        }
    }
    public function edit($id)
    {
        // return encrypt($id);
        $drainageService = $this->drainageService->edit(decrypt($id));

        //$permissionshooting = PermissionShooting::findOrFail->edit(decrypt($id));


        $wards = $this->commonService->getActiveWard();

        $zones = $this->commonService->getActiveZone();
    // $nature_busis = NatureBusiness::all();
        //return $permissionshooting;
        // dd($permissionshooting);
        return view('mallanisarandepartment.drainage.update')->with([
            'wards' => $wards,
            'zones' => $zones,
            'drainageService' => $drainageService,
            // 'nature_busis'=>$nature_busis,
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateRequest $request, $id)
    {
        // dd($request->all());
        $drainageService = $this->drainageService->update($request, $id);
        if ($drainageService) {
            return response()->json([
                'success' => 'Drainage updated successfully'
            ]);
        } else {
            return response()->json([
                'error' => 'Something went wrong, please try again'
            ]);
        }
    }
}
