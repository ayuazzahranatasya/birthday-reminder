<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\FriendController;

// Halaman Utama = Dashboard
Route::get('/', function () {
    $daftarTeman = \App\Models\Friend::latest()->get();
    $total = $daftarTeman->count();
    $bulanIni = 0;
    foreach ($daftarTeman as $t) {
        if ($t->tanggal_lahir) {
            $tgl = \Carbon\Carbon::parse($t->tanggal_lahir);
            if ($tgl->month == now()->month) {
                $bulanIni++;
            }
        }
    }
    return view('dashboard', compact('total', 'bulanIni'));
});

// Halaman Dashboard
Route::get('/dashboard', function () {
    $daftarTeman = \App\Models\Friend::latest()->get();
    $total = $daftarTeman->count();
    $bulanIni = 0;
    foreach ($daftarTeman as $t) {
        if ($t->tanggal_lahir) {
            $tgl = \Carbon\Carbon::parse($t->tanggal_lahir);
            if ($tgl->month == now()->month) {
                $bulanIni++;
            }
        }
    }
    return view('dashboard', compact('total', 'bulanIni'));
})->name('dashboard');

// Halaman Daftar Teman
Route::get('/friends', function () {
    $daftarTeman = \App\Models\Friend::latest()->get();
    return view('friends.index', compact('daftarTeman'));
})->name('friends.index');

// Modul Teman lengkap
Route::resource('friends', FriendController::class)->except(['index']);

// Halaman Lain
Route::get('/notification', function () {
    return view('notification');
})->name('notification');

Route::get('/calendar', function () {
    return view('calendar');
})->name('calendar');

Route::get('/profile', function () {
    return view('profile');
})->name('profile');