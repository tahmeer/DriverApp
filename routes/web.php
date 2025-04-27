<?php

use Illuminate\Support\Facades\Route;

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

// Route::get('/', function () {
//     return view('home');
// });



Route::group(['prefix' => 'admin', 'middleware' => ['guest:admin']], function () {

    Route::get('dashboard', [App\Http\Controllers\Admin\DashboardController::class, 'dashboard'])->name('admin.dashboard');
    
    Route::get('logout', [App\Http\Controllers\Admin\AdminController::class, 'logout'])->name('admin.logout');

    Route::match(['GET', 'POST'], 'createUser', [App\Http\Controllers\Admin\UserController::class, 'createUser'])->name('addUser');
    Route::match(['GET', 'POST'], 'editUser/{id}', [App\Http\Controllers\Admin\UserController::class, 'editUser'])->name('editUser');
    Route::post('delete/user', [App\Http\Controllers\Admin\UserController::class, 'deleteUser'])->name('admin.user.delete');
    Route::get('user-list', [App\Http\Controllers\Admin\UserController::class, 'index'])->name('userList');

    // Country
    Route::match(['GET', 'POST'], 'createCountry', [App\Http\Controllers\Admin\UserController::class, 'createCountry'])->name('createCountry');
    Route::match(['GET', 'POST'], 'editCountry/{id}', [App\Http\Controllers\Admin\UserController::class, 'editCountry'])->name('editCountry');
    Route::post('delete/country', [App\Http\Controllers\Admin\UserController::class, 'deleteCountry'])->name('admin.country.delete');
    Route::get('order-list', [App\Http\Controllers\Admin\OrderController::class, 'orderIndex'])->name('orderList');
    Route::post('assign-order', [App\Http\Controllers\Admin\OrderController::class, 'assignOrder'])->name('admin.assign.order');

    // City
    Route::match(['GET', 'POST'], 'createCity', [App\Http\Controllers\Admin\UserController::class, 'createCity'])->name('createCity');
    Route::match(['GET', 'POST'], 'editCity/{id}', [App\Http\Controllers\Admin\UserController::class, 'editCity'])->name('editCity');
    Route::post('delete/city', [App\Http\Controllers\Admin\UserController::class, 'deleteCity'])->name('admin.city.delete');
    Route::get('city-list', [App\Http\Controllers\Admin\UserController::class, 'cityIndex'])->name('cityList');

    // Ministry
    Route::match(['GET', 'POST'], 'createMinistry', [App\Http\Controllers\Admin\UserController::class, 'createMinistry'])->name('createMinistry');
    Route::match(['GET', 'POST'], 'editMinistry/{id}', [App\Http\Controllers\Admin\UserController::class, 'editMinistry'])->name('editMinistry');
    Route::post('delete/ministry', [App\Http\Controllers\Admin\UserController::class, 'deleteMinistry'])->name('admin.ministry.delete');
    Route::get('ministry-list', [App\Http\Controllers\Admin\UserController::class, 'ministryIndex'])->name('ministryList');

    // Hotel
    Route::match(['GET', 'POST'], 'createHotel', [App\Http\Controllers\Admin\UserController::class, 'createHotel'])->name('createHotel');
    Route::match(['GET', 'POST'], 'editHotel/{id}', [App\Http\Controllers\Admin\UserController::class, 'editHotel'])->name('editHotel');
    Route::post('delete/hotel', [App\Http\Controllers\Admin\UserController::class, 'deleteHotel'])->name('admin.hotel.delete');
    Route::get('hotel-list', [App\Http\Controllers\Admin\UserController::class, 'hotelIndex'])->name('hotelList');

    // Flight
    Route::match(['GET', 'POST'], 'addFlight', [App\Http\Controllers\Admin\UserController::class, 'addFlight'])->name('addFlight');
    Route::match(['GET', 'POST'], 'editFlight/{id}', [App\Http\Controllers\Admin\UserController::class, 'editFlight'])->name('editFlight');
    Route::post('delete/flight', [App\Http\Controllers\Admin\UserController::class, 'deleteFlight'])->name('admin.flight.delete');
    Route::get('flight-list', [App\Http\Controllers\Admin\UserController::class, 'flightIndex'])->name('flightList');


    // Trips
    Route::match(['GET', 'POST'], 'addTrip', [App\Http\Controllers\Admin\UserController::class, 'addTrip'])->name('addTrip');
    Route::match(['GET', 'POST'], 'editTrip/{id}', [App\Http\Controllers\Admin\UserController::class, 'editTrip'])->name('editTrip');

    Route::get('trip-list', [App\Http\Controllers\Admin\UserController::class, 'tripsList'])->name('tripsList');
    Route::post('complete/trip', [App\Http\Controllers\Admin\UserController::class, 'completeTrip'])->name('admin.trip.complete');

    Route::get('mission/files', [App\Http\Controllers\Admin\UserController::class, 'missionFiles'])->name('admin.mission_files');

    Route::post('mission/filter',[App\Http\Controllers\Admin\UserController::class, 'missionFilter'])->name('admin.mission_filter');
    
    Route::post('get/meetings',[App\Http\Controllers\Admin\UserController::class, 'getMeetings'])->name('admin.get_meeting');
   
    Route::post('get/missions',[App\Http\Controllers\Admin\UserController::class, 'getMissions'])->name('admin.get_mission');
    
    Route::post('get/missions/person',[App\Http\Controllers\Admin\UserController::class, 'getMissionsPerson'])->name('admin.get_mission_person');

    Route::post('get/missions/files',[App\Http\Controllers\Admin\UserController::class, 'getMissionsPersonFiles'])->name('admin.get_mission_person_files');
});
Route::group(['prefix' => 'admin', 'middleware' => 'no_auth:admin'], function () {

    Route::get('login', [App\Http\Controllers\Admin\AdminController::class, 'login']);

    Route::post('authenticate', [App\Http\Controllers\Admin\AdminController::class, 'authenticate']);
});


// website
Route::get('/',[App\Http\Controllers\websiteController::class, 'homePage'])->name('home');
Route::get('/about-us',[App\Http\Controllers\websiteController::class, 'aboutUsPage'])->name('about-us');
Route::get('/our-vehicles',[App\Http\Controllers\websiteController::class, 'ourVehiclesPage'])->name('our-vehicles');
Route::get('/sector',[App\Http\Controllers\websiteController::class, 'sectorPage'])->name('sector');
Route::get('/payment',[App\Http\Controllers\websiteController::class, 'paymentPage'])->name('payment');
Route::get('/driver-recruitment',[App\Http\Controllers\websiteController::class, 'driverRecruitmentPage'])->name('driver-recruitment');
Route::get('/contact-us',[App\Http\Controllers\websiteController::class, 'contactUsPage'])->name('contact-us');
