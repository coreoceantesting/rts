<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MarriageController;
use App\Http\Controllers\AapaleSarkarLoginCheckController;
use App\Http\Controllers\ServiceInformationController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\MyProfileController;
use App\Http\Controllers\ServiceController;
use App\Http\Controllers\PropertyTaxController;
use App\Http\Controllers\TaxProperty\IssuanceController;
use App\Http\Controllers\TaxProperty\NewTaxationController;
use App\Http\Controllers\TaxProperty\NoDueController;
use App\Http\Controllers\TaxProperty\RetaxationController;
use App\Http\Controllers\TaxProperty\TaxDemandController;
use App\Http\Controllers\TaxProperty\TaxExemptionController;
use App\Http\Controllers\TaxProperty\TransferPropertyController;
use App\Http\Controllers\TaxProperty\TaxExemptionNonResidentController;
use App\Http\Controllers\TaxProperty\SelfAssessmentController;
use App\Http\Controllers\TaxProperty\RegistrationOfObjectionController;
use App\Http\Controllers\TaxProperty\TransferRegistrationCertificateController;
use App\Http\Controllers\fireDepartment\FireNoObjectionController;
use App\Http\Controllers\fireDepartment\FinalFireNoObjectionController;
use App\Http\Controllers\TownPlaning\BhagNakashaController;
use App\Http\Controllers\TownPlaning\ZoneCertificateController;
use App\Http\Controllers\WaterSupplyDepartment\NewWaterConnectionController;
use App\Http\Controllers\WaterSupplyDepartment\IllegalWaterConnectionController;
use App\Http\Controllers\ConstructionDepartment\DrainageConnectionController;
use App\Http\Controllers\ConstructionDepartment\RoadCuttingPermissionController;
use App\Http\Controllers\WaterSupplyDepartment\ChangeInOwnershipController;
use App\Http\Controllers\WaterSupplyDepartment\ChangeWaterConnectionSizeController;
use App\Http\Controllers\WaterSupplyDepartment\WaterReConnectionController;
use App\Http\Controllers\WaterSupplyDepartment\DisconnectWaterSupplyController;
use App\Http\Controllers\WaterSupplyDepartment\ChangeConnecionUsageController;
use App\Http\Controllers\WaterSupplyDepartment\WaterTaxController;
use App\Http\Controllers\WaterSupplyDepartment\NoDuesController;
use App\Http\Controllers\WaterSupplyDepartment\UnavailabilityOfWaterSupplyController;
use App\Http\Controllers\WaterSupplyDepartment\DefectiveWaterMeterController;
use App\Http\Controllers\WaterSupplyDepartment\WaterPressureController;
use App\Http\Controllers\Trade\RenewalPlumberLicenseController;
use App\Http\Controllers\WaterSupplyDepartment\WaterQualityComplaintController;
use App\Http\Controllers\Trade\PlumberLicenseController;
use App\Http\Controllers\Trade\NewTradeLicensePermissionController;
use App\Http\Controllers\Trade\RenewalOfLicenseController;
use App\Http\Controllers\Trade\AutoRenewalController;
use App\Http\Controllers\Trade\LicenseTransferController;
use App\Http\Controllers\Trade\PerLicenseController;
use App\Http\Controllers\Trade\NOCForMandapController;
use App\Http\Controllers\Trade\ChangeLicenseNameController;
use App\Http\Controllers\Trade\ChangeLicenseTypeController;
use App\Http\Controllers\Trade\ChangeOwnerPartnerCountController;
use App\Http\Controllers\Trade\ChangeOwnerNameController;
use App\Http\Controllers\Trade\LicenseCancellationController;

use App\Http\Controllers\PlinthCertificateController;
use App\Http\Controllers\OccupancyCertificateController;



/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return redirect()->route('login');
})->name('/');




// Guest Users
Route::middleware(['guest', 'PreventBackHistory', 'firewall.all'])->group(function () {
    Route::get('login', [App\Http\Controllers\Registeration\AuthController::class, 'showLogin'])->name('login');
    Route::post('login', [App\Http\Controllers\Registeration\AuthController::class, 'login'])->name('signin');
    Route::get('register', [App\Http\Controllers\Registeration\AuthController::class, 'showRegister'])->name('register');
    Route::post('register', [App\Http\Controllers\Registeration\AuthController::class, 'register'])->name('signup');
});

Route::get('rts-service', [AapaleSarkarLoginCheckController::class, 'check'])->name('rts.check');




// Authenticated users
Route::get('my-application', [DashboardController::class, 'myApplication'])->name('my-application');
Route::middleware(['auth', 'PreventBackHistory', 'firewall.all'])->group(function () {

    // Auth Routes
    Route::post('logout', [App\Http\Controllers\Registeration\AuthController::class, 'Logout'])->name('logout');
    Route::get('show-change-password', [App\Http\Controllers\Registeration\AuthController::class, 'showChangePassword'])->name('show-change-password');
    Route::post('change-password', [App\Http\Controllers\Registeration\AuthController::class, 'changePassword'])->name('change-password');
    Route::get('home', fn() => redirect()->route('dashboard'))->name('home');
    Route::get('dashboard', [DashboardController::class, 'index'])->name('dashboard');
    Route::get('service/{id}', [DashboardController::class, 'subService'])->name('service.my-service');
    Route::get('generate-payment-url', [DashboardController::class, 'generatePaymentUrl'])->name('generate-payment-url');
    Route::get('payment-return-url', [DashboardController::class, 'paymentReturnUrl'])->name('payment-return-url');


    // start of marriage registration form
    Route::post('marriage-registration/store-marriage-registration-form', [MarriageController::class, 'storeMarriageRegistrationForm'])->name('marriage-registration.store-marriage-registration-form');
    Route::post('marriage-registration/store-marriage-registration-details', [MarriageController::class, 'storeMarriageRegistrationDetails'])->name('marriage-registration.store-marriage-registration-details');
    Route::post('marriage-registration/store-groom-information', [MarriageController::class, 'storeGroomInformation'])->name('marriage-registration.store-groom-information');
    Route::post('marriage-registration/store-bride-information', [MarriageController::class, 'storeBrideInformation'])->name('marriage-registration.store-bride-information');
    Route::post('marriage-registration/store-priest-information', [MarriageController::class, 'storePriestInformation'])->name('marriage-registration.store-priest-information');
    Route::post('marriage-registration/store-witness_information', [MarriageController::class, 'storeWitnessInformation'])->name('marriage-registration.store-witness-information');
    Route::resource('marriage-registration', MarriageController::class);
    // end of marriage registration form

    Route::get('service-information', [ServiceInformationController::class, 'serviceInformation'])->name('service-information');

    // property Tax Routes
    Route::resource('issuance-of-property-tax', IssuanceController::class);
    Route::resource('transfer-property', TransferPropertyController::class);
    Route::resource('tax-exemption', TaxExemptionController::class);
    Route::resource('tax-demand', TaxDemandController::class);
    Route::resource('retaxation', RetaxationController::class);
    Route::resource('new-taxation', NewTaxationController::class);
    Route::resource('no-dues', NoDueController::class);
    Route::resource('tax-exemption-non-resident', TaxExemptionNonResidentController::class);
    Route::resource('self-assessment', SelfAssessmentController::class);
    Route::resource('registration-of-objection', RegistrationOfObjectionController::class);
    // Route::resource('transfer-registration-certificate', TransferRegistrationCertificateController::class);

    // Fire Department Routes
    Route::resource('fire-no-objection', FireNoObjectionController::class);
    Route::resource('fire-final-no-objection', FinalFireNoObjectionController::class);

    // Water Supply Department Routes
    Route::resource('water-new-connection', NewWaterConnectionController::class);
    Route::resource('water-illegal-connection', IllegalWaterConnectionController::class);
    Route::resource('water-change-ownership', ChangeInOwnershipController::class);
    Route::resource('water-connection-size-change', ChangeWaterConnectionSizeController::class);
    Route::resource('water-reconnection', WaterReConnectionController::class);
    Route::resource('water-disconnect-supply', DisconnectWaterSupplyController::class);
    Route::resource('water-change-connection-usage', ChangeConnecionUsageController::class);
    Route::resource('water-Tax-bill', WaterTaxController::class);
    Route::resource('water-no-dues', NoDuesController::class);
    Route::resource('water-unavailability-supply', UnavailabilityOfWaterSupplyController::class);
    Route::resource('water-defective-meter', DefectiveWaterMeterController::class);
    Route::resource('water-pressure-complaint', WaterPressureController::class);
    Route::resource('water-quality-complaint', WaterQualityComplaintController::class);

    // Trade Routes
    Route::resource('trade-plumber-license', PlumberLicenseController::class);
    Route::resource('renewal-plumber-license', RenewalPlumberLicenseController::class);
    Route::resource('trade-new-license', NewTradeLicensePermissionController::class);
    Route::resource('trade-renewal-license', RenewalOfLicenseController::class);
    Route::resource('trade-autorenewal-license', AutoRenewalController::class);
    Route::resource('trade-license-transfer', LicenseTransferController::class);
    Route::resource('trade-per-license', PerLicenseController::class);
    Route::resource('trade-noc-mandap', NOCForMandapController::class);
    Route::resource('trade-change-license-name', ChangeLicenseNameController::class);
    Route::resource('trade-change-license-type', ChangeLicenseTypeController::class);
    Route::resource('trade-change-owner-count', ChangeOwnerPartnerCountController::class);
    Route::resource('trade-change-owner-name', ChangeOwnerNameController::class);
    Route::resource('trade-license-cancellation', LicenseCancellationController::class);

    // profile route
    Route::get('/profile', [MyProfileController::class, 'profile'])->name('user.profile');

    // route for town planing
    Route::resource('town-planing-zone-certificate', ZoneCertificateController::class);
    Route::resource('town-planing-bhag-nakasha', BhagNakashaController::class);

    // route for construction department
    Route::resource('construction-drainage-connection', DrainageConnectionController::class);
    Route::resource('construction-road-cutting', RoadCuttingPermissionController::class);

    Route::resource('ward', \App\Http\Controllers\Master\WardController::class);
    Route::resource('zone', \App\Http\Controllers\Master\ZoneController::class);

    Route::resource('plinth-certificate', PlinthCertificateController::class);
    Route::resource('occupancy-certificate', OccupancyCertificateController::class);
});
Route::post('rts-service-status', [AapaleSarkarLoginCheckController::class, 'updateStatus'])->name('rts.status');


Route::post('check-app-user', [App\Http\Controllers\AppLoginController::class, 'checkAppUser']);
Route::get('app-login', [App\Http\Controllers\AppLoginController::class, 'appLogin'])->name('app-login');

// Route::get('check-aapalesarkar-user', [AapaleSarkarLoginCheckController::class, 'check']);



Route::get('/php', function (Request $request) {
    if (!auth()->check())
        return 'Unauthorized request';

    Artisan::call($request->artisan);
    return dd(Artisan::output());
});
