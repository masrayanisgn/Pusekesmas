<?php

use App\http\Controllers\DokterController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\PasienController;
use Illuminate\Support\Facades\Auth;
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

// route untuk role admin
Route::group(['middleware' => ['auth', 'role:admin']], function(){
// Route untuk menambahkan data pasien 
Route::get('/pasien/create', [PasienController::class, 'create']);

// Route untuk memproses form tambah pasien
Route::post('/pasien', [PasienController::class, 'store']);

// Route untuk menampilkan form edit pasien
Route::get('/pasien/edit/{id}', [PasienController::class, 'edit']);

// Route untuk memproses  form edit pasien 
Route::put('/pasien/{id}', [PasienController::class, 'update']);

// Route untuk hapus pasien
Route::delete('/pasien', [PasienController::class, 'destroy']);

// Route untuk menampilkan tambah dokter
Route::get('/dokter/create',[DokterController::class, 'create']);

// Route untuk memproses form tambah dokter
Route::post('/dokter', [DokterController::class, 'store']);

// Route untuk menampilkan form edit dokter
Route::get('/dokter/edit/{id}', [DokterController::class, 'edit']);

// Route untuk menghapus  dokter
Route::put('/dokter/{id}', [DokterController::class, 'update']);

// Route untuk hapus dokter
Route::delete('/dokter', [DokterController::class, 'destroy']);

});

// Route untuk role staff
Route::group(['middleware' => ['auth', ]], function () {
    // Route untuk menampilkan dashboard admin
    Route::get('/', [DashboardController::class, 'index']);

    // Route untuk menampilkan daftar pasien
Route::get('/pasien', [PasienController::class, 'index']);

});

Auth::routes();