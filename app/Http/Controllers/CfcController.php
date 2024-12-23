<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Services\CommonService;
use App\Services\CFCService;


class CfcController extends Controller
{
    protected $commonService;
    protected $cfc;


    public function __construct(CFCService $cfcservice, CommonService $commonService)
    {
        $this->cfc = $cfcservice;
        $this->commonService = $commonService;
    }


    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $wards = $this->commonService->getActiveWard();


        $zones = $this->commonService->getActiveZone();

        return view('cfc.create')->with([
            'wards' => $wards,
            'zones' => $zones,
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //dd($request->all());
        $cfcservice = $this->cfc->store($request);

        if ($cfcservice[0]) {
            return response()->json([
                'success' => 'Hoarding Permission save successfully'
            ]);
        } else {
            return response()->json([
                'error' => $cfcservice[1]
            ]);
        }
    }

    /**
     * Display the specified resource.
     */


    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {

        $cfcservice = $this->cfc->edit(decrypt($id));

        $wards = $this->commonService->getActiveWard();

        $zones = $this->commonService->getActiveZone();

        return view('cfc.update')->with([
            'wards' => $wards,
            'zones' => $zones,
            'cfc' => $cfcservice,

        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $cfcservice = $this->cfc->update($request, $id);

        return response()->json(['success' => ' Hoarding permission  update successfully!']);
    }
}
