<?php

use App\Enums\RoleTypeEnum;
use App\Http\Controllers\LocalizationController;
use App\Http\Controllers\PDFController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ResidentialCommunity\ResidentialCommunityController;
use App\Http\Controllers\Room\RoomController;
use App\Http\Controllers\TenantController;
use App\Http\Controllers\TicketController;
use App\Http\Controllers\TicketNoteController;
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
Route::get('/change-language', LocalizationController::class)->name('change.language');
Route::middleware('auth')->group(function () {
    Route::resource('profile', ProfileController::class)->only('edit', 'update', 'destroy');
    // Administration and Management Role can access it
    Route::middleware(['role:'.RoleTypeEnum::ADMINISTRATION->value.'|'.RoleTypeEnum::MANAGEMENT->value])->group(function () {
        Route::resource('users', UserController::class);
        Route::resource('residential-communities', ResidentialCommunityController::class);
        // Route::resource('shared-apartments', SharedApartmentController::class);
        Route::resource('rooms', RoomController::class);
        Route::get('previous-tenants/{roomId}', [TenantController::class, 'index'])->name('previous-tenants');
        Route::resource('tenants', TenantController::class);
    });
    // Ticket Management and Ticket Note
    Route::resource('tickets', TicketController::class);
    Route::post('tickets/{ticket}/add-note', TicketNoteController::class)->name('tickets.add-note');
    Route::get('tickets/{ticket}/export-pdf', [PDFController::class, 'exportPdf'])->name('tickets.export-pdf');
});

require __DIR__.'/auth.php';
