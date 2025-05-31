<?php

use App\Livewire\Settings\Appearance;
use App\Livewire\Settings\Password;
use App\Livewire\Settings\Profile;
use Illuminate\Support\Facades\Route;
use App\Livewire\ShowProfile;
use App\Http\Controllers\SiswaController;
use App\Http\Controllers\GuruController;
use App\Http\Controllers\IndustriController;
use App\Http\Controllers\PklController;

Route::get('/', function () {
    return view('welcome');
})->name('home');

//Akses dengan role
Route::middleware(['auth', 'verified', 'check_user_email', 'ensure_user_has_role'])
    ->group(function () {
        Route::get('/dashboard', fn () => view('dashboard'))->name('dashboard');
    });

//Akses untuk logged in user
Route::middleware(['auth'])->group(function () {
    Route::redirect('settings', 'settings/profile');

    Route::get('settings/profile', Profile::class)->name('settings.profile');
    Route::get('settings/password', Password::class)->name('settings.password');
    Route::get('settings/appearance', Appearance::class)->name('settings.appearance');
});

//rute ke masing masing halaman
Route::name('front.')->group(function () {
    Route::view('/siswa', 'livewire.front.siswa.index')->name('siswa.index');
    Route::view('/guru', 'livewire.front.guru.index')->name('guru.index');
    Route::view('/industri', 'livewire.front.industri.index')->name('industri.index');
    Route::view('/pkl', 'livewire.front.pkl.index')->name('pkl.index');
});

require __DIR__.'/auth.php';
