<?php

use App\Http\Controllers\DashboardController;
use App\Http\Controllers\DokterController;
use App\Http\Controllers\pasienController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use SebastianBergmann\CodeCoverage\Report\Html\Dashboard;

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
// Route untuk menampilkan dashboard admin
Route::get('/', [DashboardController::class, 'index'])->middleware('auth');

// Route untuk menampilkan  daftar pasien
Route::get('/pasien', [pasienController::class, 'index'])->middleware('auth');


// Route untuk menampilkan form tambah pasien
Route::get('/pasien/create', [pasienController::class, 'create'])->middleware('auth');

//Route untuk memproses form tambah pasien
Route::post('/pasien', [pasienController::class, 'store'])->middleware('auth');

// Route untuk menampilkan form edit pasien
Route::get('/pasien/edit/{id}', [pasienController::class, 'edit'])->middleware('auth');

// Route untuk memproses form edit pasien
Route::put('/pasien/{id}', [pasienController::class, 'update'])->middleware('auth');

// Route untuk hapus pasien
Route::delete('/pasien', [pasienController::class, 'destroy'])->middleware('auth');








//Route untuk menampilka form *S tambah dokter
Route::get('/dokter/create', [DokterController::class, 'create'])->middleware('auth');

// Route untuk memproses form * Dokter
Route::post('/dokter', [DokterController::class, 'store'])->middleware('auth');


// Route untuk menampilkan from edit dokter 
Route::get('/dokter/edit/{id}', [DokterController::class, 'edit'])->middleware('auth');

//Route untuk hapus dokter
Route::put('/dokter/{id}', [DokterController::class, 'update'])->middleware('auth');

// Route untuk menghapus dokter
Route::delete('/dokter', [DokterController::class, 'destroy'])->middleware('auth');




// Route untuk menampilkan list Dokter
Route::get('/dokter', [DokterController::class, 'index'])->middleware('auth');




Auth::routes();