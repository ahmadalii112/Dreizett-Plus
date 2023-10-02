<?php

use App\Enums\RoleTypeEnum;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ResidentialCommunityController;
use App\Http\Controllers\RoomController;
use App\Http\Controllers\SharedApartmentController;
use App\Http\Controllers\TenantController;
use App\Http\Controllers\TicketController;
use App\Http\Controllers\UserController;
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

Route::view('/', 'start');
Route::view('ambulante-pflege', 'ambulante-pflege');
Route::view('tagespflege', 'tagespflege');
Route::view('team', 'team');
Route::view('presse', 'presse');
Route::view('impressum', 'impressum');
Route::view('datenschutz', 'datenschutz');
Route::view('karriere', 'karriere');
Route::view('event', 'event');
Route::view('bewerbung', 'karriere');
Route::view('danke', 'danke');

Route::view('/dashboard', 'dashboard')->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
    // Administration and Management Role can access it
    Route::middleware(['role:'.RoleTypeEnum::ADMINISTRATION->value.'|'.RoleTypeEnum::MANAGEMENT->value])->group(function () {
        Route::resource('users', UserController::class);
        Route::resource('residential-communities', ResidentialCommunityController::class);
        Route::resource('shared-apartments', SharedApartmentController::class);
        Route::resource('rooms', RoomController::class);
        Route::get('previous-tenants/{roomId}', [TenantController::class, 'index'])->name('previous-tenants');
        Route::resource('tenants', TenantController::class);
        Route::resource('tickets', TicketController::class);

    });
});

require __DIR__.'/auth.php';
