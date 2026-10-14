<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\SkemaController;
use App\Http\Controllers\PesertaController;
use App\Http\Controllers\ProfilPesertaController;

/*
|--------------------------------------------------------------------------
| Halaman Utama
|--------------------------------------------------------------------------
*/

Route::get('/', function () {
    return view('welcome');
})->name('welcome');

/*
|--------------------------------------------------------------------------
| Login dan Register
|--------------------------------------------------------------------------
*/

Route::middleware('guest')->group(function () {
    Route::get('/login', [AuthController::class, 'showLogin'])
        ->name('login');

    Route::post('/login', [AuthController::class, 'login'])
        ->name('login.process');

    Route::get('/register', [AuthController::class, 'showRegister'])
        ->name('register');

    Route::post('/register', [AuthController::class, 'register'])
        ->name('register.process');
});

/*
|--------------------------------------------------------------------------
| Logout
|--------------------------------------------------------------------------
*/

Route::post('/logout', [AuthController::class, 'logout'])
    ->middleware('auth')
    ->name('logout');

/*
|--------------------------------------------------------------------------
| Halaman Khusus Administrator
|--------------------------------------------------------------------------
*/

Route::middleware(['auth', 'role:admin'])->group(function () {

    Route::get('/dashboard', [DashboardController::class, 'index'])
        ->name('dashboard');

    // CRUD Data Skema Sertifikasi
    Route::resource('skema', SkemaController::class);

    // CRUD Data Peserta
    Route::resource('peserta', PesertaController::class)
        ->parameters([
            'peserta' => 'peserta',
        ]);
});

// /*
// |--------------------------------------------------------------------------
// | Halaman Khusus Peserta
// |--------------------------------------------------------------------------
// */

// Route::middleware(['auth', 'role:peserta'])->group(function () {

//     // Dashboard Peserta
    
// Route::get('/peserta-dashboard', [
//     ProfilPesertaController::class,
//     'dashboard'
// ])->name('peserta.dashboard');


//     // Profil Peserta
//     Route::get('/peserta/profil', [
//         ProfilPesertaController::class,
//         'edit',
//     ])->name('peserta.profil.edit');

//     Route::post('/peserta/profil', [
//         ProfilPesertaController::class,
//         'update',
//     ])->name('peserta.profil.update');
// });

/*
|--------------------------------------------------------------------------
| Halaman Khusus Peserta
|--------------------------------------------------------------------------
*/

Route::middleware(['auth', 'role:peserta'])->group(function () {

    // Dashboard Peserta
    Route::get('/peserta-dashboard', [
        ProfilPesertaController::class,
        'dashboard'
    ])->name('peserta.dashboard');

    // Profil Peserta (Diubah URL-nya menjadi /peserta-profil/edit atau /profil-peserta)
    Route::get('/peserta-profil', [
        ProfilPesertaController::class,
        'edit',
    ])->name('peserta.profil.edit');

    Route::post('/peserta-profil', [
        ProfilPesertaController::class,
        'update',
    ])->name('peserta.profil.update');
});