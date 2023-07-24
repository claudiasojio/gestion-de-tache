<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\ClientsController;

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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::prefix('admin')->middleware(['auth','isAdmin'])->group(function() {

    Route::get('dashboard',[App\Http\Controllers\Admin\DashboardController::class, 'index'])->name('admin');

   
   
    // Clients Route
    Route::controller(ClientsController::class)->group(function () {
        Route::get('/clients', 'index')->name('clientss');
        Route::get('/clients/create', 'create');
        Route::post('/clients', 'store');
        Route::get('/clients/{clients}/edit', 'edit');
        Route::put('/clients/{clients}', 'update');
        Route::get('/clients/{clients}/view', 'view');
        // Route::get('/clients/terminer/{clients}','terminer');
    });
   
    // admin/clients/'.$clients->id.'/edit'

});
Route::get('/Terminer/{id}', [App\Http\Controllers\Admin\ClientsController::class, 'terminer'])->name('terminer');
Route::get('/En_cours/{id}', [App\Http\Controllers\Admin\ClientsController::class, 'encours'])->name('En_cours');
