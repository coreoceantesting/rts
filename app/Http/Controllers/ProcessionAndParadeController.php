<?php

namespace App\Http\Controllers;

use App\Models\ProcessionAndParade;
use Illuminate\Http\Request;
use App\Services\CommonService;
use App\Services\ProcessionAndParadeService;

class ProcessionAndParadeController extends Controller
{
    protected $commonService;
    protected $procession;



    public function __construct(ProcessionAndParadeService $processionandparade, CommonService $commonService)
    {
        $this->procession = $processionandparade;
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

        return view('procession-parade.create')->with([
            'wards' => $wards,
            'zones' => $zones,
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {

        $processionandparade = $this->procession->store($request);
        //dd($request->all());
        if ($processionandparade[0]) {
            return response()->json([
                'success' => 'permissions Shooting save successfully'
            ]);
        } else {
            return response()->json([
                'error' => $processionandparade[1]
            ]);
        }
    }
    public function edit($id)
    {
        // return encrypt($id);
        $processionandparade = $this->procession->edit(decrypt($id));

        //$permissionshooting = PermissionShooting::findOrFail->edit(decrypt($id));


        $wards = $this->commonService->getActiveWard();

        $zones = $this->commonService->getActiveZone();

        //return $permissionshooting;
        // dd($permissionshooting);
        return view('procession-parade.update')->with([
            'wards' => $wards,
            'zones' => $zones,
            'processionandparade' => $processionandparade,
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        // dd($request->all());
        $processionandparade = $this->procession->update($request, $id);

        // dd($request->all());
        //  $permissionshooting = PermissionShooting::findOrFail->update($request, $id);
        return response()->json(['success' => 'Park Culture Permission update successfully!']);
    }
}
