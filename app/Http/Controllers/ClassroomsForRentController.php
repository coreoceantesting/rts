<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Services\CommonService;
use App\Services\ClassroomsForRentService;



class ClassroomsForRentController extends Controller
{
    protected $commonService;
    protected $classroomforrent;

    public function __construct(ClassroomsForRentService $classroomsForRentService, CommonService $commonService)
    {
        $this->classroomforrent = $classroomsForRentService;
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

        return view('classroom-rent.create')->with([
            'wards' => $wards,
            'zones' => $zones,
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {

        $classroomsForRentService = $this->classroomforrent->store($request);
        //dd($request->all());
        if ($classroomsForRentService[0]) {
            return response()->json([
                'success' => 'permissions Shooting save successfully'
            ]);
        } else {
            return response()->json([
                'error' => $classroomsForRentService[1]
            ]);
        }
    }
    public function edit($id)
    {
        // return encrypt($id);
        $classroomsForRentService = $this->classroomforrent->edit(decrypt($id));

        //$permissionshooting = PermissionShooting::findOrFail->edit(decrypt($id));


        $wards = $this->commonService->getActiveWard();

        $zones = $this->commonService->getActiveZone();

        //return $permissionshooting;
        // dd($permissionshooting);
        return view('classroom-rent.update')->with([
            'wards' => $wards,
            'zones' => $zones,
            'classroomsForRentService' => $classroomsForRentService,
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        // dd($request->all());
        $classroomsForRentService = $this->classroomforrent->update($request, $id);

        // dd($request->all());
        //  $permissionshooting = PermissionShooting::findOrFail->update($request, $id);
        return response()->json(['success' => 'Park Culture Permission update successfully!']);
    }
}
