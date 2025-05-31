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
use App\Livewire\Front\Siswa\Index as SiswaIndex;
use App\Livewire\Front\Guru\Index as GuruIndex;
use App\Livewire\Front\Industri\Index as IndustriIndex;
use App\Livewire\Front\Pkl\Index as PklIndex;

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
    Route::get('/siswa', SiswaIndex::class)->name('siswa.index');
    Route::get('/guru', GuruIndex::class)->name('guru.index');
    Route::get('/industri', IndustriIndex::class)->name('industri.index');
    Route::get('/pkl', PklIndex::class)->name('pkl.index');
});

require __DIR__.'/auth.php';
