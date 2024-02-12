<?php

use App\Http\Controllers\Admin\BankController;
use App\Http\Controllers\Admin\BusController;
use App\Http\Controllers\Admin\DiscountController;
use App\Http\Controllers\Admin\JadwalController;
use App\Http\Controllers\Admin\TiketController;
use App\Http\Controllers\Admin\TiketSayaController;
use App\Http\Controllers\Admin\TransactionController;
use App\Http\Controllers\BookingController;
use App\Http\Controllers\BrowseController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\HomeController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

Route::get('/', HomeController::class)->name('home');

Route::middleware(['auth'])->group(function () {
    Route::get('/dashboard', DashboardController::class)->name('dashboard');

    Route::controller(BookingController::class)->group(function () {
        Route::get('/booking/{slug}', 'index')->name('booking.index');
        Route::post('/booking', 'store')->name('booking.store');
        Route::get('/booking-payment/{slug}', 'payment')->name('booking.payment');
        Route::post('/booking-payment/{slug}', 'paymentStore')->name('booking.payment.store');
    });

    Route::controller(BrowseController::class)->group(function () {
        Route::get('/browse', 'index')->name('browse.index');
    });



    Route::controller(TiketSayaController::class)->group(function () {
        Route::get('/tiket-saya', 'myTicket')->name('tiket-saya');
        Route::get('/transaksi-saya/{slug}', 'myTransaction')->name('transaksi-saya');
    });

    Route::middleware(['isAdmin'])->group(function () {
        Route::controller(TransactionController::class)->group(function () {
            Route::get('/transaksi/{slug}', 'index')->name('transaksi.index');
            Route::put('/transaksi/valid{slug}', 'valid')->name('transaksi.valid');
            Route::put('/transaksi/tidak-valid{slug}', 'tidakValid')->name('transaksi.tidak.valid');
        });
        Route::resources([
            'bank' => BankController::class,
            'bus' => BusController::class,
            'jadwal' => JadwalController::class,
            'tiket' => TiketController::class,
            'diskon' => DiscountController::class
        ]);
    });
});

Auth::routes();
