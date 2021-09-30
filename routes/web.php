<?php

use App\Http\Controllers\ChatController;
use Illuminate\Support\Facades\Route;


use App\Http\Controllers\RoleController;
use App\Http\Controllers\ClientController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\GearController;
use App\Http\Controllers\GearRequestController;
use App\Http\Controllers\MessageController;

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

//...............................Admin Dashboard and Landing Page Routes.....................//

Route::get('/', [DashboardController::class, 'homePage'])->name('home');

Route::get('/dashboard', [DashboardController::class, 'index'])->middleware(['auth'])->name('dashboard');


//...............................Spatie Roles and Permissions Routes.....................//
Route::group(['middleware' => ['auth']], function() {
    Route::resource('roles', RoleController::class);
    Route::resource('users', UserController::class);
});

//...............................Gears Routes.....................//
Route::group(['prefix'=>'gear', 'middleware' => ['auth']], function() {
    Route::get('/index', [GearController::class, 'index'])->name('gear.index');
    Route::post('/store', [GearController::class, 'store'])->name('gear.store');
    Route::get('/{slug}', [GearController::class, 'show'])->name('gear.show');
    Route::get('/edit/{slug}', [GearController::class, 'edit'])->name('gear.edit');
    Route::delete('/{id}', [GearController::class, 'destroy'])->name('gear.destroy');

});

//...............................Gear Request Routes.....................//
Route::group(['prefix'=>'request', 'middleware' => ['auth']], function() {
    // Admin only routes
    Route::get('/manager', [GearRequestController::class, 'adminIndex'])->name('request.adminIndex');
    Route::post('/store', [GearRequestController::class, 'store'])->name('request.store');
    Route::get('/index', [GearRequestController::class, 'index'])->name('request.index');
    Route::get('/Gear', [GearRequestController::class, 'gearListing'])->name('request.create');
    Route::get('/{slug}', [GearRequestController::class, 'show'])->name('request.show');
    Route::get('/edit/{id}', [GearRequestController::class, 'edit'])->name('request.edit');
    Route::delete('/{id}', [GearRequestController::class, 'destroy'])->name('request.destroy');

    // Search
    Route::post('/search', [GearRequestController::class, 'search'])->name('request.search');



});

//...............................Clients Routes.....................//
Route::group(['prefix'=>'clients', 'middleware' => ['auth']], function() {
    Route::get('/index', [ClientController::class, 'index'])->name('clients.index');
    Route::get('/edit', [ClientController::class, 'edit'])->name('clients.edit');
    Route::put('/edit{id}', [ClientController::class, 'update'])->name('client.update');
    Route::put('/update{id}', [ClientController::class, 'updateUser'])->name('clientUser.update');
});

//...............................Chat Module Routes.....................//
Route::group(['prefix'=>'chat', 'middleware' => ['auth']], function() {
    Route::get('/index', [ChatController::class, 'index'])->name('chat');
    Route::get('/{id}', [MessageController::class, 'index'])->name('chat.messages');
    Route::post('/message', [MessageController::class, 'sendMessage'])->name('chat.send');

    Route::get('/edit', [MessageController::class, 'edit'])->name('chat.edit');
    Route::put('/edit{id}', [MessageController::class, 'update'])->name('chat.update');
    Route::put('/update{id}', [MessageController::class, 'updateUser'])->name('chatUser.update');
});

require __DIR__.'/auth.php';
