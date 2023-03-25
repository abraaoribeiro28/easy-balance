<?php

use App\Http\Controllers\{
    BalanceController,
    DashboardController,
    ProfileController
};
use Illuminate\Support\Facades\Route;


Route::get('/', function () {
    return redirect()->route('dashboard');
});


Route::middleware(['auth', 'verified'])->group(function () {
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
    Route::get('/deposit', [BalanceController::class, 'deposit'])->name('deposit');
    Route::post('/deposit/store', [BalanceController::class, 'depositStore'])->name('deposit.store');
    Route::get('/withdraw', [BalanceController::class, 'withdraw'])->name('withdraw');
    Route::post('/withdraw/store', [BalanceController::class, 'withdrawStore'])->name('withdraw.store');
    Route::get('/transfer', [BalanceController::class, 'transfer'])->name('transfer');
    Route::post('/transfer/store', [BalanceController::class, 'confirmTransfer'])->name('transfer.store');
});


Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__ . '/auth.php';
