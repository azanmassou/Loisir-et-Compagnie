<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\ArtisteController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\RepresentationController;
use App\Http\Controllers\ReservationController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\SalleController;
use App\Http\Controllers\SpectacleController;
use App\Http\Controllers\TicketController;
use App\Http\Controllers\UserController;
use App\Models\Reservation;
use App\Models\Salle;
use App\Models\Spectacle;
use Illuminate\Support\Facades\Auth;
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

// Generiques Routes

Route::get('/', function () {
    $auth = Auth::user();
    return view('welcome', compact('auth'));
});

// Route::get('/home', function () {
//     $salles = Salle::paginate(3);
//     $auth = Auth::user();
//     return view('index', compact('auth','salles'));
// });

// Admin routes

Route::middleware(['auth', 'activity'])->group(function () {

    Route::get('/dashbord', [AdminController::class, 'admin'])->name('admin.dashbord');
    // Route::get('/home', [AdminController::class, 'user'])->name('user.dashbord');

    Route::delete('/logout', [AuthController::class, 'logout'])->name('auth.logout');

    Route::middleware(['role:admin'])->group(function () {

        Route::resource('users', UserController::class)->except('store', 'create');

        Route::resource('roles', RoleController::class);
        Route::get('/roles-users{role}', [RoleController::class, 'usersListing'])->name('roles.users');

        Route::resource('salles', SalleController::class);
        Route::resource('spectacles', SpectacleController::class);
        Route::resource('representations', RepresentationController::class);
        Route::resource('artistes', ArtisteController::class);
        Route::resource('tickets', TicketController::class);
        Route::resource('reservations', ReservationController::class);
        Route::get('/reservations{salle}', [ReservationController::class, 'newReservation'])->name('new.reservation');
       
       
        // Route::get('/dashbord', [AdminController::class, 'index'])->name('admin.dashbord');

    });

    // Route::middleware(['role:user'])->group(function () {
       
    //     Route::get('/home', [AdminController::class, 'user'])->name('user.dashbord');

    // });

});


// Guest Route
Route::middleware(['guest'])->group(function () {

    Route::get('/inscription', [AuthController::class, 'register'])->name('auth.register');
    Route::post('/inscription', [AuthController::class, 'doRegister']);


    Route::get('/connexion', [AuthController::class, 'login'])->name('auth.login');
    Route::post('/connexion', [AuthController::class, 'doLogin']);
});



// Authenticated routes Guest

Route::get('/authentification', [AuthController::class, 'auth'])->name('auth.auth');
Route::post('/authentification', [AuthController::class, 'doAuth']);

Route::get('/changer-mon-mot-de-passe', [AuthController::class, 'reset'])->name('auth.reset');
Route::post('/changer-mon-mot-de-passe', [AuthController::class, 'doReset']);

// Route::get('/confirm/{token}', [EmailVerificationController::class, 'resetingEmailVerify'])->name('verify.confirm.email');

Route::get('/confirmation-mot-de-passe', [AuthController::class, 'confirm'])->name('auth.confirm');
Route::post('/confirmation-mot-de-passe', [AuthController::class, 'doConfirm']);
