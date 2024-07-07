<?php

use App\Http\Controllers\AccountController;
use App\Http\Controllers\AppController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\DashbordController;
use App\Http\Controllers\EmailVerificationController;
use App\Http\Controllers\HomeController;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PostsController;
use App\Http\Controllers\UsersController;
use App\Http\Controllers\RolesController;

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


// Route::get('add-post', [PostsController::class, 'myPost']);
// Route::post('submit-post', [PostsController::class, 'submitPost'])->name('postSubmit');

// Routes Generiques

Route::get('/', [HomeController::class, 'welcome'])->name('racine');

Route::prefix('dashbord')->middleware(['auth'])->group(function () {

    // Post
    Route::resource('posts', PostsController::class);
    Route::resource('users', UsersController::class);
    Route::get('/posts-me', [PostsController::class, 'me'])->name('posts.me');
    Route::get('/posts/fresh', [PostsController::class, 'fresh'])->name('posts.fresh');


    Route::get('/posts', [PostsController::class, 'index'])->name('posts.dashbord');

    // Like Post
    // Route::post('/posts/{post}/unlike', [PostsController::class, 'unlike'])->name('posts.unlike');
    // Route::post('/posts/{post}/like', [PostsController::class, 'like'])->name('posts.like');
    Route::post('/like/{post}', [PostsController::class, 'liking'])->name('posts.like');
    // Route::post('/unlike', [PostsController::class, 'unlike'])->name('posts.unlike');

    // Profile
    Route::get('/profile', [AppController::class, 'profile'])->name('app.profile');
   
    //  Account
     Route::get('/account-setting', [AccountController::class, 'account_setting'])->name('account-setting');
     Route::get('/privacy-setting', [AccountController::class, 'privacy_setting'])->name('privacy-setting');

    
})->name('home');

Route::prefix('admin')->middleware(['role:admin'])->group(function () {
    Route::resource('posts', PostsController::class)->only(['destroy', 'show']);
    Route::resource('users', UsersController::class)->only(['destroy', 'show','index']);
    Route::resource('roles', RolesController::class);
    Route::get('/dashbord-Postes', [DashbordController::class, 'posts'])->name('dashbord.posts');
    Route::get('/dashbord', [DashbordController::class, 'dashboard'])->name('dashbord');
    Route::post('/dashbord/{post}/block', [PostsController::class, 'block'])->name('posts.block');
    Route::post('/dashbord/{user}/block', [UsersController::class, 'block'])->name('users.block');
    Route::get('/dashbord/{role}/listing', [RolesController::class, 'listing'])->name('users.listing');
    // Route::get('/dashbord/{post}/show', [PostsController::class, 'details'])->name('posts.details');
    Route::post('/dashbord/{user}/admining', [UsersController::class, 'admining'])->name('users.admining');
    // Route::get('/dashbord/role', [UsersController::class, 'role'])->name('users.role');
});


// Routes d'Autentification

Route::delete('/logout', [AuthController::class, 'logout'])->name('auth.logout');

Route::get('/login', [AuthController::class, 'login'])->name('auth.login');
Route::post('/login', [AuthController::class, 'doLogin']);

Route::get('/reset-password', [AuthController::class, 'reset'])->name('auth.reset');
Route::post('/reset-password', [AuthController::class, 'doReset']);

Route::get('/register', [AuthController::class, 'register'])->name('auth.register');
Route::post('/register', [AuthController::class, 'doRegister']);

Route::get('/confirm/{token}', [EmailVerificationController::class, 'resetingEmailVerify'])->name('verify.confirm.email');

Route::get('/confirm', [AuthController::class, 'confirm'])->name('auth.confirm');
Route::post('/confirm', [AuthController::class, 'doConfirm']);

Route::get('/verify-email/{token}', [EmailVerificationController::class, 'registerEmailVerify'])->name('verify.email');


