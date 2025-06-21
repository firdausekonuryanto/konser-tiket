<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ConcertController;
use App\Http\Controllers\TicketOrderController;
use App\Http\Controllers\PemesananController;
use Illuminate\Support\Facades\Route;
use App\Models\Concert;

Route::get('/', function () {
    $concerts = Concert::latest()->get();
    return view('welcome', compact('concerts'));
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    // Route untuk pembelian tiket yang membutuhkan autentikasi
    Route::get('/beli-tiket', [TicketOrderController::class, 'index'])->name('beli.index');
    Route::get('/beli-tiket/create', [TicketOrderController::class, 'create'])->name('beli.create');
    Route::post('/beli-tiket/{concert}', [TicketOrderController::class, 'store'])->name('beli.store');

    // Route untuk melihat pemesanan
    Route::get('/pemesanan/{id}/detail', [TicketOrderController::class, 'showDetail'])->name('pemesanan.detail');
    Route::get('/pemesanan', [TicketOrderController::class, 'pemesanan'])->name('pemesanan.index');
    Route::get('/pemesanan_user', [TicketOrderController::class, 'pemesanan_user'])->name('pemesanan_user.index');
    Route::patch('/ticket/{id}/update-status', [TicketOrderController::class, 'updateStatus'])->name('ticket.update-status');
});

// Route untuk manajemen concert bisa dipisahkan untuk admin
Route::resource('concert', ConcertController::class)->middleware('auth');

require __DIR__.'/auth.php';