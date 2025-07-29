<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\TalkshowController;
use App\Http\Controllers\JadwalController;
use App\Http\Controllers\ArtikelController;
use App\Http\Controllers\GaleriController;
use App\Http\Controllers\DokumenController;
//Public
use App\Http\Controllers\TentangKamiController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\TeamController;
use App\Http\Controllers\PublicTeamController;
use App\Http\Controllers\PublicGaleriController;
use App\Http\Controllers\PublicJadwalController;
use App\Http\Controllers\PublicArtikelController;
use App\Http\Controllers\PublicTalkshowController;
use App\Http\Controllers\InformasiController;

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

// Public Routes
Route::get('/', [HomeController::class, 'index'])->name('home');
Route::get('/public/about', [TentangKamiController::class, 'index'])->name('public.about');
Route::get('/public/team', [PublicTeamController::class, 'index'])->name('public.team');
Route::get('/public/galeri', [PublicGaleriController::class, 'index'])->name('public.galeri');
Route::get('/public/jadwal', [PublicJadwalController::class, 'index'])->name('public.jadwal');
Route::get('/public/artikel', [PublicArtikelController::class, 'index'])->name('public.artikel.index');
Route::get('/public/artikel/{slug}', [PublicArtikelController::class, 'show'])->name('public.artikel.show');
Route::get('/public/artikel/kategori/{kategori}', [PublicArtikelController::class, 'kategori'])->name('public.artikel.kategori');
Route::get('/public/talkshow', [PublicTalkshowController::class, 'index'])->name('public.talkshow');

// Auth
Route::get('/login', [AuthController::class, 'showLoginForm'])->name('login');
Route::post('/login', [AuthController::class, 'login']);
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

// Protected (Login Required)
Route::middleware(['auth', 'role:Super Admin,Admin Sistem'])->group(function () {
    Route::resource('/admin/pengguna', UserController::class)->names('users');
});

Route::middleware(['auth', 'role:Super Admin,Admin Sistem'])->group(function () {
    Route::resource('/admin/tim', TeamController::class)->names('team');
    Route::resource('/admin/dokumen', DokumenController::class)->names('dokumen');
    Route::post('/admin/dokumen/{id}/update-status', [DokumenController::class, 'updateStatus'])->name('dokumen.updateStatus');
});

Route::middleware(['auth', 'role:Super Admin,Redaktur'])->group(function () {
    Route::resource('/admin/artikel', ArtikelController::class)->names('artikels');
    Route::resource('/admin/galeri', GaleriController::class)->names('galeri');
    Route::get('/admin/informasi', [InformasiController::class, 'index'])->name('informasi.index');
    Route::post('/admin/informasi/update', [InformasiController::class, 'update'])->name('informasi.update');
});

Route::middleware(['auth', 'role:Super Admin,Admin Program'])->group(function () {
    Route::resource('/admin/talkshow', TalkshowController::class)->names('talkshows');
    Route::resource('/admin/jadwal', JadwalController::class)->names('jadwals');
});

//Route Halaman Pengguna
Route::middleware(['auth'])->group(function () {
    Route::get('/admin/dashboard', [DashboardController::class, 'index'])->name('dashboard');
});

Route::get('/favicon.ico', function () {
    return response()->file(public_path('favicon.ico'));
});