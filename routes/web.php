<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MarriageController;
use App\Http\Controllers\AapaleSarkarLoginCheckController;
use App\Http\Controllers\ServiceInformationController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\MyProfileController;
use App\Http\Controllers\PropertyTaxController;

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




// Authenticated users
Route::middleware(['auth', 'PreventBackHistory', 'firewall.all'])->group(function () {

    // Auth Routes
    Route::post('logout', [App\Http\Controllers\Registeration\AuthController::class, 'Logout'])->name('logout');
    Route::get('show-change-password', [App\Http\Controllers\Registeration\AuthController::class, 'showChangePassword'])->name('show-change-password');
    Route::post('change-password', [App\Http\Controllers\Registeration\AuthController::class, 'changePassword'])->name('change-password');
    Route::get('home', fn () => redirect()->route('dashboard'))->name('home');
    Route::get('dashboard', [DashboardController::class, 'index'])->name('dashboard');
    Route::get('service/{id}', [DashboardController::class, 'subService'])->name('service.my-service');
    Route::get('my-application', [DashboardController::class, 'myApplication'])->name('my-application');



    // Users Roles n Permissions
    // Route::resource('users', App\Http\Controllers\Admin\UserController::class);
    // Route::get('users/{user}/toggle', [App\Http\Controllers\Admin\UserController::class, 'toggle'])->name('users.toggle');
    // Route::get('users/{user}/retire', [App\Http\Controllers\Admin\UserController::class, 'retire'])->name('users.retire');
    // Route::put('users/{user}/change-password', [App\Http\Controllers\Admin\UserController::class, 'changePassword'])->name('users.change-password');
    // Route::get('users/{user}/get-role', [App\Http\Controllers\Admin\UserController::class, 'getRole'])->name('users.get-role');
    // Route::put('users/{user}/assign-role', [App\Http\Controllers\Admin\UserController::class, 'assignRole'])->name('users.assign-role');
    // Route::resource('roles', App\Http\Controllers\Admin\RoleController::class);


    // Route::get('marriage-registration-certificate/list', [MarriageController::class, 'list'])->name('marriage.list');
    // Route::get('marriage-registration-certificate/add', [MarriageController::class, 'add'])->name('marriage.add');
    // Route::post('marriage-registration-certificate/store', [MarriageController::class, 'store'])->name('marriage.store');
    // Route::get('marriage-registration-certificate/edit/{id}', [MarriageController::class, 'edit'])->name('marriage.edit');
    // Route::put('marriage-registration-certificate/update', [MarriageController::class, 'update'])->name('marriage.update');

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

    // profile route
    Route::get('/profile', [MyProfileController::class, 'profile'])->name('user.profile');
});

// Route::get('check-aapalesarkar-user', [AapaleSarkarLoginCheckController::class, 'check']);



Route::get('/php', function (Request $request) {
    if (!auth()->check())
        return 'Unauthorized request';

    Artisan::call($request->artisan);
    return dd(Artisan::output());
});
