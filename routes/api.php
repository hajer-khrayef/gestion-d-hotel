<?php

use App\Http\Controllers\HotelController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\RoomController;
use App\Http\Controllers\RoomBookingController;
use App\Http\Controllers\BookingController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\CalendarController;
use App\Http\Controllers\CafeController;
use App\Http\Controllers\CalendrierController;
use App\Http\Controllers\ClientController;
use App\Http\Controllers\ExtraController;
use App\Http\Controllers\FactureController;
use App\Http\Controllers\RapportController;
use App\Http\Controllers\EventController;
use App\Http\Controllers\ReceptionnisteController;
use App\Http\Controllers\FoodController;
use App\Http\Controllers\SaisonController;
use App\Http\Controllers\FoodOrderController;
use App\Http\Controllers\ServiceController;
use App\Http\Controllers\SocieteController;
use App\Http\Controllers\EventBookingController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Models\User;


/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

//Route::resource('hotels',HotelController::class);
//public routes
Route::post('/register', [UserController::class, 'register']);
Route::post('/login', [UserController::class, 'login']);
Route::get('/hotels', [HotelController::class, 'index']);
Route::get('/admin', [AdminController::class, 'index']);
Route::get('/cafe', [CafeController::class, 'index']);
Route::get('/calendrier', [CalendrierController::class, 'index']);

Route::get('/Client', [ClientController::class, 'index']);
Route::get('/extra', [ExtraController::class, 'index']);
Route::get('/facture', [FactureController::class, 'index']);
Route::get('/rapport', [RapportController::class, 'index']);
Route::get('/receptionniste', [ReceptionnisteController::class, 'index']);
Route::get('/food', [FoodController::class, 'index']);
Route::get('/service', [ServiceController::class, 'index']);
Route::get('/societe', [SocieteController::class, 'index']);
Route::get('/roombooking', [RoomBookingController::class, 'index']);
Route::get('/room', [RoomController::class, 'index']);
Route::get('/booking', [BookingController::class, 'index']);
Route::get('/category', [CategoryController::class, 'index']);
Route::get('/admin/{id}', [AdminController::class, 'show']);
Route::get('/cafe/{idproduit}', [CafeController::class, 'show']);
Route::get('/extra/{id}', [ExtraController::class, 'show']);
Route::get('/client/{cin}', [ClientController::class, 'show']);
Route::get('/facture/{id}', [FactureController::class, 'show']);
Route::get('/rapport/{daterapport}', [RapportController::class, 'show']);
Route::get('/receptionniste/{idroom}', [ReceptionnisteController::class, 'show']);
Route::get('/food/{id}', [FoodController::class, 'show']);
Route::get('/service/{idservice}', [ServiceController::class, 'show']);
Route::get('/societe/{idsociete}', [SocieteController::class, 'show']);
Route::get('/booking/{id}', [BookingController::class, 'show']);
Route::get('/hotels/{id}', [HotelController::class, 'show']);
Route::get('/hotels/search/{nom}', [HotelController::class, 'search']);
Route::get('/admin/search/{nomadmin}', [AdminController::class, 'search']);
Route::get('/cafe/search/{nomproduit}', [CafeController::class, 'search']);
Route::get('/client/search/{nom}', [ClientController::class, 'search']);
Route::get('/extra/search/{Name}', [ExtraController::class, 'search']);
Route::get('/food/search/{Name}', [FoodController::class, 'search']);
Route::get('/service/search/{nomservice}', [ServiceController::class, 'search']);
Route::get('/societe/search/{nomsociete}', [SocieteController::class, 'search']);

Route::get('/room/{RoomNumber}', [RoomController::class, 'show']);
Route::get('/room/search/{Description}', [RoomController::class, 'search']);





Route::get('/event', [EventController::class, 'index']);
Route::post('/event', [EventController::class, 'store']);
Route::put('/event/{id}', [EventController::class, 'update']);
Route::delete('/event/{id}', [EventController::class, 'destroy']);
Route::get('/event/search/{date}', [EventController::class, 'search']);
Route::post('/calendrier', [CalendrierController::class, 'store']);
Route::put('/calendrier/{id}', [CalendrierController::class, 'update']);
Route::delete('/calendrier/{id}', [CalendrierController::class, 'destroy']);
Route::get('/calendrier/search/{start}', [CalendrierController::class, 'search']);


Route::get('/foodorder', [FoodOrderController::class, 'index']);
Route::post('/foodorder', [FoodOrderController::class, 'store']);
Route::put('/foodorder/{id}', [FoodOrderController::class, 'update']);
Route::delete('/foodorder/{id}', [FoodOrderController::class, 'destroy']);


Route::get('/eventbooking', [EventBookingController::class, 'index']);
Route::post('/eventbooking', [EventBookingController::class, 'store']);
Route::put('/eventbooking/{id}', [EventBookingController::class, 'update']);
Route::delete('/eventbooking/{id}', [EventBookingController::class, 'destroy']);

Route::get('/saison', [SaisonController::class, 'index']);
Route::post('/saison', [SaisonController::class, 'store']);
Route::put('/saison/{nomsaison}', [SaisonController::class, 'update']);
Route::delete('/saison/{nomsaison}', [SaisonController::class, 'destroy']);
Route::get('/saison/search/{nomsaison}', [SaisonController::class, 'search']);


//protected routes
Route::group(['middleware' => ['auth:sanctum']], function () {
    Route::get('/user', [UserController::class, 'index']);
    Route::get('/user/{id}', [UserController::class, 'show']);
    Route::get('/user/search/{name}', [UserController::class, 'search']);
    Route::post('/logout', [UserController::class, 'logout']);
});


Route::post('/hotels', [HotelController::class, 'store']);
Route::post('/admin', [AdminController::class, 'store']);
Route::post('/cafe', [CafeController::class, 'store']);
Route::post('/client', [ClientController::class, 'store']);
Route::post('/extra', [ExtraController::class, 'store']);
Route::post('/facture', [FactureController::class, 'store']);
Route::post('/rapport', [RapportController::class, 'store']);
Route::post('/receptionniste', [ReceptionnisteController::class, 'store']);
Route::post('/food', [FoodController::class, 'store']);
Route::post('/service', [ServiceController::class, 'store']);
Route::post('/societe', [societeController::class, 'store']);
Route::put('/hotels/{id}', [HotelController::class, 'update']);
Route::delete('/hotels/{id}', [HotelController::class, 'destroy']);
Route::put('/admin/{id}', [AdminController::class, 'update']);
Route::delete('/admin/{id}', [AdminController::class, 'destroy']);
Route::put('/cafe/{idproduit}', [CafeController::class, 'update']);
Route::delete('/cafe/{idproduit}', [CafeController::class, 'destroy']);
Route::put('/client/{cin}', [ClientController::class, 'update']);
Route::delete('/client/{cin}', [ClientController::class, 'destroy']);
Route::put('/extra/{id}', [ExtraController::class, 'update']);
Route::delete('/extra/{id}', [ExtraController::class, 'destroy']);
Route::put('/facture/{id}', [FactureController::class, 'update']);
Route::delete('/facture/{id}', [FactureController::class, 'destroy']);
Route::put('/rapport/{daterapport}', [RapportController::class, 'update']);
Route::delete('/rapport/{daterapport}', [RapportController::class, 'destroy']);
Route::put('/receptionniste/{idroom}', [ReceptionnisteController::class, 'update']);
Route::delete('/receptionniste/{idroom}', [ReceptionnisteController::class, 'destroy']);
Route::put('/food/{id}', [FoodController::class, 'update']);
Route::delete('/food/{id}', [FoodController::class, 'destroy']);
Route::put('/service/{idservice}', [ServiceController::class, 'update']);
Route::delete('/service/{idservice}', [ServiceController::class, 'destroy']);
Route::put('/societe/{idsociete}', [SocieteController::class, 'update']);
Route::delete('/societe/{idsociete}', [SocieteController::class, 'destroy']);
Route::post('/room', [RoomController::class, 'store']);
Route::put('/room/{id}', [RoomController::class, 'update']);
Route::post('/roombooking', [RoomBookingController::class, 'store']);
Route::delete('/roombooking/{id}', [RoomBookingController::class, 'destroy']);
Route::put('/roombooking/{id}', [RoomBookingController::class, 'update']);
Route::get('/roombooking/{id}', [RoomBookingController::class, 'show']);
Route::put('/booking/{id}', [BookingController::class, 'update']);
Route::put('/category/{id}', [CategoryController::class, 'update']);
Route::delete('/room/{id}', [RoomController::class, 'destroy']);
Route::delete('/category/{typeroom}', [CategoryController::class, 'destroy']);
Route::delete('/booking/{id}', [BookingController::class, 'destroy']);
Route::post('/user', [UserController::class, 'store']);
Route::post('/booking', [BookingController::class, 'store']);
Route::post('/category', [CategoryController::class, 'store']);
Route::put('/user/{id}', [UserController::class, 'update']);
Route::delete('/user/{id}', [UserController::class, 'destroy']);
Route::get('/calendar', [CalendarController::class, 'index']);
Route::post('/calendar', [CalendarController::class, 'store']);
Route::put('/calendar/{id}', [CalendarController::class, 'update']);
Route::delete('/calendar/{id}', [CalendarController::class, 'destroy']);

// Route::get('/hotels/search/{nom}', [HotelController::class,'search']);


/*Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});*/
/* Route::apiResource('/calendar', 'CalendarController');  */