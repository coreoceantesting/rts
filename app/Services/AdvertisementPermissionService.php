<?php

namespace App\Services;

use App\Services\AapaleSarkarLoginCheckService;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;
use App\Models\ServiceCredential;
use App\Models\AdvertisementPermission;
use Illuminate\Support\Facades\Storage;

class AdvertisementPermissionService
{
    protected $aapaleSarkarLoginCheckService;

    public function __construct(AapaleSarkarLoginCheckService $aapaleSarkarLoginCheckService)
    {
        $this->aapaleSarkarLoginCheckService = $aapaleSarkarLoginCheckService;
    }

    public function store($request)
    {
        // DB::beginTransaction();
        // try {
        //     $request['user_id'] = Auth::user()->id;
        //     $request['service_id'] = '241';
        //     $request['application_no'] = "PMC-" . time();

        // Handle file uploads and store original file names
        $request['user_id'] = Auth::user()->id;
        $request['service_id'] = "2002";
        $request['application_no'] = "PMC-" . time();

        if ($request->hasFile('applications')) {
            $request['application'] = $request->applications->store('advertisement-permission');
        }

        if ($request->hasFile('owner_lands')) {
            $request['owner_land'] = $request->owner_lands->store('advertisement-permission');
        }
        if ($request->hasFile('society_letters')) {
            $request['society_letter'] = $request->society_letters->store('advertisement-permission');
        }

        if ($request->hasFile('resolution_socs')) {
            $request['resolution_soc'] = $request->resolution_socs->store('advertisement-permission');
        }

        if ($request->hasFile('light_bills')) {
            $request['light_bill'] = $request->light_bills->store('advertisement-permission');
        }

        if ($request->hasFile('structural_engineers')) {
            $request['structural_engineer'] = $request->structural_engineers->store('advertisement-permission');
        }

        if ($request->hasFile('stability_certificates')) {
            $request['stability_certificate'] = $request->stability_certificates->store('advertisement-permission');
        }

        if ($request->hasFile('police_nocs')) {
            $request['police_noc'] = $request->police_nocs->store('advertisement-permission');
        }

        if ($request->hasFile('location_plans')) {
            $request['location_plan'] = $request->location_plans->store('advertisement-permission');
        }

        if ($request->hasFile('site_dtps')) {
            $request['site_dtp'] = $request->site_dtps->store('advertisement-permission');
        }

        if ($request->hasFile('taking_is')) {
            $request['taking_i'] = $request->taking_is->store('advertisement-permission');
        }

        if ($request->hasFile('taking_iis')) {
            $request['taking_ii'] = $request->taking_iis->store('advertisement-permission');
        }

        if ($request->hasFile('advertising_insurances')) {
            $request['advertising_insurance'] = $request->advertising_insurances->store('advertisement-permission');
        }

        if ($request->hasFile('advertising_sizes')) {
            $request['advertising_size'] = $request->advertising_sizes->store('advertisement-permission');
        }

        if ($request->hasFile('rental_agreements')) {
            $request['rental_agreement'] = $request->rental_agreements->store('advertisement-permission');
        }

        $advertisemenent = AdvertisementPermission::create($request->all());

        if ($advertisemenent) {
            $applicationId = $request->application_no;

            if (Auth::user()->is_aapale_sarkar_user) {
                $aapaleSarkarCredential = ServiceCredential::where('dept_service_id', $request->service_id)->first();
                $serviceDay = ($aapaleSarkarCredential->service_day) ? $aapaleSarkarCredential->service_day : 20;

                $send = $this->aapaleSarkarLoginCheckService->encryptAndSendRequestToAapaleSarkar(
                    Auth::user()->trackid,
                    $aapaleSarkarCredential->client_code,
                    Auth::user()->user_id,
                    $aapaleSarkarCredential->service_id,
                    $applicationId,
                    'N',
                    'NA',
                    'N',
                    'NA',
                    $serviceDay,
                    date('Y-m-d', strtotime("+$serviceDay days")),
                    config('rtsapiurl.amount'),
                    config('rtsapiurl.requestFlag'),
                    config('rtsapiurl.applicationStatus'),
                    config('rtsapiurl.applicationPendingStatusTxt'),
                    $aapaleSarkarCredential->ulb_id,
                    $aapaleSarkarCredential->ulb_district,
                    'NA',
                    'NA',
                    'NA',
                    $aapaleSarkarCredential->check_sum_key,
                    $aapaleSarkarCredential->str_key,
                    $aapaleSarkarCredential->str_iv,
                    $aapaleSarkarCredential->soap_end_point_url,
                    $aapaleSarkarCredential->soap_action_app_status_url
                );

                if (!$send) {
                    $this->aapaleSarkarLoginCheckService->savePendingAapaleSarkarData($applicationId, $request->service_id, Auth::user()->user_id);
                    DB::commit();
                    return [true];
                }
            }
        } else {
            DB::rollback();
            return [false, 'Something went wrong, please try again!'];
        }

        DB::commit();
        return [true];

        // } catch (\Exception $e) {
        //     DB::rollback();
        //     Log::error('Error in store method: ' . $e->getMessage());
        //     return [false, $e->getMessage()];
        // }
    }

    public function edit($id)
    {
        return AdvertisementPermission::findOrFail($id);
    }

    public function update($request, $id)
    {
        DB::beginTransaction();
        try {
            // Find the existing record
            $advertisemenent = AdvertisementPermission::find($id);

            // Handle file uploads and update original file names

            if ($request->hasFile('applications')) {
                if ($advertisemenent && Storage::exists($advertisemenent->application)) {
                    Storage::delete($advertisemenent->application);
                }
                $request['application'] = $request->applications->store('advertisement-permission');
            }

            if ($request->hasFile('owner_lands')) {
                if ($advertisemenent && Storage::exists($advertisemenent->owner_land)) {
                    Storage::delete($advertisemenent->owner_land);
                }
                $request['owner_land'] = $request->owner_lands->store('advertisement-permission');
            }

            if ($request->hasFile('ownership')) {
                if ($advertisemenent && Storage::exists($advertisemenent->society_letter)) {
                    Storage::delete($advertisemenent->society_letter);
                }
                $request['society_letter'] = $request->ownership->store('advertisement-permission');
            }


            if ($request->hasFile('resolution_socs')) {
                if ($advertisemenent && Storage::exists($advertisemenent->resolution_soc)) {
                    Storage::delete($advertisemenent->resolution_soc);
                }
                $request['resolution_soc'] = $request->resolution_socs->store('advertisement-permission');
            }


            if ($request->hasFile('light_bills')) {
                if ($advertisemenent && Storage::exists($advertisemenent->light_bill)) {
                    Storage::delete($advertisemenent->light_bill);
                }
                $request['light_bill'] = $request->light_bills->store('advertisement-permission');
            }


            if ($request->hasFile('place')) {
                if ($advertisemenent && Storage::exists($advertisemenent->structural_engineer)) {
                    Storage::delete($advertisemenent->structural_engineer);
                }
                $request['structural_engineer'] = $request->place->store('advertisement-permission');
            }

            if ($request->hasFile('property')) {
                if ($advertisemenent && Storage::exists($advertisemenent->stability_certificate)) {
                    Storage::delete($advertisemenent->stability_certificate);
                }
                $request['stability_certificate'] = $request->property->store('advertisement-permission');
            }

            if ($request->hasFile('tenancy')) {
                if ($advertisemenent && Storage::exists($advertisemenent->police_noc)) {
                    Storage::delete($advertisemenent->police_noc);
                }
                $request['police_noc'] = $request->tenancy->store('advertisement-permission');
            }




            if ($request->hasFile('occupancy')) {
                if ($advertisemenent && Storage::exists($advertisemenent->location_plan)) {
                    Storage::delete($advertisemenent->location_plan);
                }
                $request['location_plan'] = $request->occupancy->store('advertisement-permission');
            }

            if ($request->hasFile('medical')) {
                if ($advertisemenent && Storage::exists($advertisemenent->site_dtp)) {
                    Storage::delete($advertisemenent->site_dtp);
                }
                $request['site_dtp'] = $request->medical->store('advertisement-permission');
            }

            if ($request->hasFile('control')) {
                if ($advertisemenent && Storage::exists($advertisemenent->taking_i)) {
                    Storage::delete($advertisemenent->taking_i);
                }
                $request['taking_i'] = $request->control->store('advertisement-permission');
            }


            if ($request->hasFile('registration')) {
                if ($advertisemenent && Storage::exists($advertisemenent->taking_ii)) {
                    Storage::delete($advertisemenent->taking_ii);
                }
                $request['taking_ii'] = $request->registration->store('advertisement-permission');
            }

            if ($request->hasFile('food')) {
                if ($advertisemenent && Storage::exists($advertisemenent->advertising_insurance)) {
                    Storage::delete($advertisemenent->advertising_insurance);
                }
                $request['advertising_insurance'] = $request->food->store('advertisement-permission');
            }


            if ($request->hasFile('fire')) {
                if ($advertisemenent && Storage::exists($advertisemenent->advertising_size)) {
                    Storage::delete($advertisemenent->advertising_size);
                }
                $request['advertising_size'] = $request->fire->store('advertisement-permission');
            }


            if ($request->hasFile('liquor')) {
                if ($advertisemenent && Storage::exists($advertisemenent->rental_agreement)) {
                    Storage::delete($advertisemenent->rental_agreement);
                }
                $request['rental_agreement'] = $request->liquor->store('advertisement-permission');
            }


            // Update the rest of the fields
            $advertisemenent->update($request->all());

            DB::commit();
            return [true];
        } catch (\Exception $e) {
            DB::rollback();
            Log::error('Error in update method: ' . $e->getMessage());
            return [false, $e->getMessage()];
        }
    }
}
