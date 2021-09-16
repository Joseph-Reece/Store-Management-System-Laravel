<?php

use App\Http\Controllers\ClientsController;
use Illuminate\Support\Facades\Route;


use App\Http\Controllers\RoleController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\GearsController;

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
    Route::get('/index', [GearsController::class, 'index'])->name('gear.index');
    Route::post('/store', [GearsController::class, 'store'])->name('gear.store');
    Route::get('/{slug}', [GearsController::class, 'show'])->name('gear.show');
    Route::get('/edit/{slug}', [GearsController::class, 'edit'])->name('gear.edit');
    Route::delete('/{id}', [GearsController::class, 'destroy'])->name('gear.destroy');
});

//...............................Clients Routes.....................//
Route::group(['prefix'=>'clients', 'middleware' => ['auth']], function() {
    Route::get('/index', [ClientsController::class, 'index'])->name('clients.index');
    Route::get('/edit', [ClientsController::class, 'edit'])->name('clients.edit');
    Route::put('/edit{id}', [ClientsController::class, 'update'])->name('client.update');
    Route::put('/update{id}', [ClientsController::class, 'updateUser'])->name('clientUser.update');
});

require __DIR__.'/auth.php';
