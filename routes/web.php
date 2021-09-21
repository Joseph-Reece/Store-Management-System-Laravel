<?php

use Illuminate\Support\Facades\Route;


use App\Http\Controllers\RoleController;
use App\Http\Controllers\ClientController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\GearController;
use App\Http\Controllers\GearRequestController;

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
Route::get('/chat', function() {
    return view('backend.chat.index');
}
)->middleware(['auth'])->name('chat');

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
    Route::get('/index', [GearRequestController::class, 'index'])->name('request.index');
    Route::get('/request-Gear', [GearRequestController::class, 'gearListing'])->name('request.create');
    Route::post('/store', [GearRequestController::class, 'store'])->name('request.store');
    Route::get('/{slug}', [GearRequestController::class, 'show'])->name('request.show');
    Route::get('/edit/{id}', [GearRequestController::class, 'edit'])->name('request.edit');
    Route::delete('/{id}', [GearRequestController::class, 'destroy'])->name('request.destroy');

    Route::post('/search', [GearRequestController::class, 'search'])->name('request.search');

});

//...............................Clients Routes.....................//
Route::group(['prefix'=>'clients', 'middleware' => ['auth']], function() {
    Route::get('/index', [ClientController::class, 'index'])->name('clients.index');
    Route::get('/edit', [ClientController::class, 'edit'])->name('clients.edit');
    Route::put('/edit{id}', [ClientController::class, 'update'])->name('client.update');
    Route::put('/update{id}', [ClientController::class, 'updateUser'])->name('clientUser.update');
});

require __DIR__.'/auth.php';
