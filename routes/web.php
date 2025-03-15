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
use App\Http\Controllers\PaymentController;
use App\Http\Controllers\SbiPaymentController;
use App\Http\Controllers\PlinthCertificateController;
use App\Http\Controllers\OccupancyCertificateController;
use App\Http\Controllers\AdvertisementPermissionController;
use App\Http\Controllers\PermissionShootingController;
use App\Http\Controllers\HoardingPermissionController;
use App\Http\Controllers\HealthLicenseController;

use App\Http\Controllers\StallBoardLicenseController;

use App\Http\Controllers\AbattoirLicenseController;
use App\Http\Controllers\GardensFilmingController;
use App\Http\Controllers\ParkCulturePermissionController;
use App\Http\Controllers\PermissionForPmcOwnController;
use App\Http\Controllers\TentsPermissionController;
use App\Http\Controllers\ClassroomsForRentController;

use App\Http\Controllers\ProcessionAndParadeController;
use App\Http\Controllers\RecordObjectionsController;
use App\Http\Controllers\MobileTowerController;

use App\Http\Controllers\StateLicenseController;
use App\Http\Controllers\HealthNocMunciController;
use App\Http\Controllers\MovableAdvertisementPermissionController;

use App\Http\Controllers\CfcController;
use App\Http\Controllers\NewTaxAssessmentController;
use App\Http\Controllers\DivSubDivisionController;
use App\Http\Controllers\DemolishingPropertyController;
use App\Http\Controllers\MallaNisaranDepartment\DrainageController;
use App\Http\Controllers\Master\FeesController;
use App\Http\Controllers\Master\NatureOfBusinessController;
use App\Http\Controllers\Master\SignatureController;
use App\Http\Controllers\MedicalHealth\ChangeNursingLicenseController;
use App\Http\Controllers\MedicalHealth\DepMedicalHealthController;
use App\Http\Controllers\MedicalHealth\GrantNursingLicenseController;
use App\Http\Controllers\MedicalHealth\RenewalNursingLicenseController;
use App\Http\Controllers\Nulm\HawkerRegisterController;
use App\Http\Controllers\Pwd\GrantingTelecomController;
use App\Http\Controllers\TownPlaning\BuildingPermissionController;
use App\Http\Controllers\TownPlaning\OccupancyCetificateController;
use App\Http\Controllers\Trade\ChangeHolderPartnerController;
use App\Http\Controllers\Trade\IssuanceLicenseMarriageController;
use App\Http\Controllers\Trade\LicenseLoadgingHouseController;
use App\Http\Controllers\Trade\MovieShootingController;
use App\Http\Controllers\Trade\RenewalLicenseMarriageController;
use App\Http\Controllers\Trade\RenewLicenseLoadgingController;
use App\Http\Controllers\Trade\TradeNocController;
use App\Http\Controllers\TreeAuth\TreeProtectionController;

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



Route::get('make-payment', [App\Http\Controllers\PaymentController::class, 'index']);
// Guest Users
Route::middleware(['guest', 'PreventBackHistory', 'firewall.all'])->group(function () {
    Route::get('login', [App\Http\Controllers\Registeration\AuthController::class, 'showLogin'])->name('login');
    Route::post('login', [App\Http\Controllers\Registeration\AuthController::class, 'login'])->name('signin');
    Route::get('register', [App\Http\Controllers\Registeration\AuthController::class, 'showRegister'])->name('register');
    Route::post('register', [App\Http\Controllers\Registeration\AuthController::class, 'register'])->name('signup');
});

Route::prefix('/payment')->group(function(){
    
    Route::get('/sbi/create', [App\Http\Controllers\SbiPaymentController::class, 'initPaymentRequest'])->name('create-payment');
    Route::any('/sbi/success', [App\Http\Controllers\SbiPaymentController::class, 'successResponse'])->name('success-payment');
    Route::any('/sbi/failed', [App\Http\Controllers\SbiPaymentController::class, 'failedResponse'])->name('failed-payment');
    Route::any('redirect-payment', [App\Http\Controllers\SbiPaymentController::class, 'redirectPayment'])->name('redirect-payment');

    
    Route::get('double-verification', [App\Http\Controllers\PaymentController::class, 'doubleverificationReq'])->name('double-verification');
});



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
    Route::resource('tradenoc', TradeNocController::class);
    Route::resource('trade-license-loading', LicenseLoadgingHouseController::class);
    Route::resource('trade-renew-license-loading', RenewLicenseLoadgingController::class);
    Route::resource('trade-issuance-license-marriage', IssuanceLicenseMarriageController::class);
    Route::resource('trade-renew-license-marriage', RenewalLicenseMarriageController::class);
    Route::resource('movie-shooting', MovieShootingController::class);
    Route::resource('trade-change-holder-partner', ChangeHolderPartnerController::class);



    // NULM
    Route::resource('hawker-register', HawkerRegisterController::class);

    //PWD
    Route::resource('grant-telecome', GrantingTelecomController::class);

    //Tree Auth
    Route::resource('tree-protection', TreeProtectionController::class);




    // profile route
    Route::get('/profile', [MyProfileController::class, 'profile'])->name('user.profile');

    // route for town planing
    Route::resource('town-planing-zone-certificate', ZoneCertificateController::class);
    Route::resource('town-planing-bhag-nakasha', BhagNakashaController::class);
    Route::resource('town-building-permission', BuildingPermissionController::class);
    Route::resource('town-occupancy-certificate', OccupancyCetificateController::class);


    // route for construction department
    Route::resource('construction-drainage-connection', DrainageConnectionController::class);
    Route::resource('construction-road-cutting', RoadCuttingPermissionController::class);

    Route::resource('ward', \App\Http\Controllers\Master\WardController::class);
    Route::resource('zone', \App\Http\Controllers\Master\ZoneController::class);

    Route::resource('plinth-certificate', PlinthCertificateController::class);

    Route::resource('occupancy-certificate', OccupancyCertificateController::class);
    
 
    //  Route::resource('occupancy-certificate', OccupancyCertificateController::class);

    Route::resource('permission-shooting', PermissionShootingController::class);


    Route::resource('hoarding-permission', HoardingPermissionController::class);

    Route::resource('health-license', HealthLicenseController::class);


    Route::resource('stallboard-license', StallBoardLicenseController::class);

    Route::resource('abattoir-license', AbattoirLicenseController::class);


    Route::resource('gardens-filming', GardensFilmingController::class);

    Route::resource('park-culture', ParkCulturePermissionController::class);

    Route::resource('pmc-owned', PermissionForPmcOwnController::class);

    Route::resource('tents-permission', TentsPermissionController::class);
    Route::resource('classroom-rent', ClassroomsForRentController::class);
    Route::resource('procession-parade', ProcessionAndParadeController::class);
    Route::resource('record-objections', RecordObjectionsController::class);
    Route::resource('mobile-tower', MobileTowerController::class);
    Route::resource('state-license', StateLicenseController::class);
    Route::resource('healthnoc-munici', HealthNocMunciController::class);
    Route::resource('movable-advertisement', MovableAdvertisementPermissionController::class);
    Route::resource('cfc', CfcController::class);
    Route::resource('advertisement-permission', AdvertisementPermissionController::class);
    Route::resource('newtax-assessment', NewTaxAssessmentController::class);
    Route::resource('divsub-division', DivSubDivisionController::class);
    Route::resource('demolishingproperty', DemolishingPropertyController::class);



    //Department Of Medical Health
    Route::resource('grantnursing-license', GrantNursingLicenseController::class);
    Route::resource('renewnursing-license', RenewalNursingLicenseController::class);
    Route::resource('changenursing-license', ChangeNursingLicenseController::class);

    Route::resource('fees', FeesController::class);
    Route::resource('signature', SignatureController::class);
    Route::resource('nature-business', NatureOfBusinessController::class);

    Route::resource('drainage', DrainageController::class);

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
