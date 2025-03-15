<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Services\CommonService;
use App\Services\RecordObjectionService;

class RecordObjectionsController extends Controller
{
    protected $commonService;
    protected $recordobjection;

    public function __construct(RecordObjectionService $recordObjectionService, CommonService $commonService)
    {
        $this->recordobjection = $recordObjectionService;
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

        return view('record-objections.create')->with([
            'wards' => $wards,
            'zones' => $zones,
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {

        $recordObjectionService = $this->recordobjection->store($request);
        //dd($request->all());
        if ($recordObjectionService[0]) {
            return response()->json([
                'success' => 'permissions Shooting save successfully'
            ]);
        } else {
            return response()->json([
                'error' => $recordObjectionService[1]
            ]);
        }
    }
    public function edit($id)
    {
        // return encrypt($id);
        $recordObjectionService = $this->recordobjection->edit(decrypt($id));

        //$permissionshooting = PermissionShooting::findOrFail->edit(decrypt($id));


        $wards = $this->commonService->getActiveWard();

        $zones = $this->commonService->getActiveZone();

        //return $permissionshooting;
        // dd($permissionshooting);
        return view('record-objections.update')->with([
            'wards' => $wards,
            'zones' => $zones,
            'recordObjectionService' => $recordObjectionService,
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        // dd($request->all());
        $recordObjectionService = $this->recordobjection->update($request, $id);

        // dd($request->all());
        //  $permissionshooting = PermissionShooting::findOrFail->update($request, $id);
        return response()->json(['success' => 'Park Culture Permission update successfully!']);
    }
}
