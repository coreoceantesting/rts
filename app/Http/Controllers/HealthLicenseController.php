<?php



namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Services\CommonService;
use App\Services\HealthLicenseService;


class HealthLicenseController extends Controller
{


    protected $commonService;
    protected $healthlicense;

    public function __construct(HealthLicenseService $healthlicenseservice, CommonService $commonService)
    {
        $this->healthlicense = $healthlicenseservice;
        $this->commonService = $commonService;
    }


    public function create()
    {

        $wards = $this->commonService->getActiveWard();


        $zones = $this->commonService->getActiveZone();
        return view('health-license.create')->with([
            'wards' => $wards,
            'zones' => $zones,

        ]);
    }

    public function store(Request $request)
    {
        $healthlicenseservice = $this->healthlicense->store($request);
        //  dd($request->all());
        if ($healthlicenseservice[0]) {
            return response()->json([
                'success' => 'Health License save successfully'
            ]);
        } else {
            return response()->json([
                'error' => $healthlicenseservice[1]
            ]);
        }
    }

    public function edit($id)
    {
        //return encrypt($id);
        $healthlicense = $this->healthlicense->edit(decrypt($id));

        // $advertisementPermission = AdvertisementPermission::find($id);

        $wards = $this->commonService->getActiveWard();

        $zones = $this->commonService->getActiveZone();

        //  //return $advertisementPermission;
        return view('health-license.update')->with([
            'wards' => $wards,
            'zones' => $zones,
            'healthlicense' => $healthlicense
        ]);
    }
    public function update(Request $request, $id)
    {
        // dd($request->all());
        $HealthLicenseService = $this->healthlicense->update($request, $id);

        return response()->json(['success' => 'Health License update successfully!']);
    }
}
