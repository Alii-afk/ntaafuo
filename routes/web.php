<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ListRoomController;
use App\Http\Controllers\DashController;
use App\Http\Controllers\SearchController;
use App\Http\Controllers\PaymentController;
use App\Models\ListRoom;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

// Route::get('/', [DashController::class, 'showWelcome'])->name('welcome');
// Route::get('/', [DashController::class, 'showWelcome'])
//     ->middleware(['auth', 'verified'])
//     ->name('welcome')
//     ->where('middleware', 'auth|verified');
    
    Route::get('/', function () {
    $user = auth()->user();
    if ($user) {
        return redirect()->route('welcome.authenticated'); // Add return statement
    } else {
        return app()->call([new DashController(), 'showWelcome'], []); // Add return statement
    }
})->name('welcome');

Route::get('/welcome', [DashController::class, 'showWelcome'])
    ->middleware(['auth', 'verified'])
    ->name('welcome.authenticated')
    ->where('middleware', 'auth|verified');

Route::get('/abort', function () {
    return view('abort');
})->name('abort');

Route::get('/home', [DashController::class, 'showDashboard'])->middleware(['auth','verified'])->name('home');
Route::get('/dashboard', [ProfileController::class, 'check'])->middleware(['auth','verified'])->name('dashboard');
Route::get('/getLogginedProfile', [DashController::class, 'getLogginedProfile'])->middleware(['auth','verified'])->name('getLogginedProfile');

Route::get('/detail/{email}', [DashController::class, 'showUserDetails'])->middleware(['auth','verified'])->name('user.detail');
Route::get('/reveal-no/{email}', [DashController::class, 'showTelephoneDetails'])->middleware(['auth','verified'])->name('telephone.detail');
Route::get('/updateNoOfReveals', [DashController::class, 'incrementRevealsDetails'])->middleware(['auth','verified'])->name('increment.detail');


Route::get('/create-profile', [ProfileController::class, 'create'])->middleware(['auth','verified'])->name('profile.create');
Route::post('/create-profile', [ProfileController::class, 'store'])->middleware(['auth','verified'])->name('profile.store');
Route::post('/profile', [ProfileController::class, 'update'])->middleware(['auth','verified'])->name('profile.update');
Route::get('/profile', [ProfileController::class, 'showProfile'])->middleware(['auth','verified'])->name('show-Profile');
Route::post('/list-profile', [ProfileController::class, 'listUpdate'])->middleware(['auth','verified'])->name('listing.update');
Route::post('/userType', [ProfileController::class, 'userTypeUpdate'])->middleware(['auth','verified'])->name('userType.update');
Route::post('/updateActiveUser', [ProfileController::class, 'updateActiveUser'])->middleware(['auth','verified'])->name('updateActiveUser.update');

Route::get('/show-result', [SearchController::class, 'showResult'])->middleware(['auth','verified'])->name('showResult.show');


// Room Registeration View
Route::get('/list-room', [ListRoomController::class, 'create'])->middleware(['auth','verified'])->name('ListRoom.create');

// Room Registeration from profile.blade.php with Payment
Route::post('/listprofile', [PaymentController::class, 'redirectToGateway1'])->middleware(['auth','verified'])->name('listing.create');

// Room Registeration from list-room.blade.php with Payment
Route::post('/pay', [PaymentController::class, 'redirectToGateway'])->name('pay');

// Call back If Payment Succeed
Route::get('/payment/callback', [PaymentController::class, 'handlePaymentCallback'])->name('pay.callback');

// Call back If Payment Declined
Route::get('/paymentAborted', function () { return view('list-room'); })->name('payment.form');


require __DIR__ . '/auth.php';
