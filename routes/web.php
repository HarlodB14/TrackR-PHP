<?php

use App\Http\Controllers\AccountController;
use App\Http\Controllers\ProfileController;
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


Route::middleware('auth')->group(function () {
    Route::get('/', function () {
        return redirect()->route('dashboard');
    });

    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');

    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    Route::get('/trackrAccounts', [AccountController::class, 'showAccounts'])->name('show-accounts');
    Route::get('/trackrAccounts/create', [AccountController::class, 'createAccount'])->name('create-account');
    Route::post('/trackrAccounts', [AccountController::class, 'store'])->name('account.store');
    Route::get('/trackrAccounts/{user}/edit', [AccountController::class, 'editAccount'])->name('account.edit');
    Route::put('/trackrAccounts/{user}', [AccountController::class, 'updateAccount'])->name('account.update');
    Route::delete('/trackrAccounts/{user}', [AccountController::class, 'deleteAccount'])->name('account.delete');

});
    require __DIR__ . '/auth.php';
