<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AnggotaController;
use App\Http\Controllers\BeritaController;
use App\Http\Controllers\InventarisController;
use App\Http\Controllers\pengurusController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('users/index');
});


Route::group(['middleware' => 'auth:sanctum', 'verified'], function () {
    Route::group(['prefix' => 'admin/'], function () {

        Route::get('/dashboard', function () {
            return view('admin/dashboard');
        });

        Route::get('/anggota', [AnggotaController::class, 'index'])->name('anggota');
        Route::post('/anggota/kirimanggota', [AnggotaController::class, 'store'])->name('kirimanggota');
        Route::post('/anggota/updateanggota/{id}', [AnggotaController::class, 'update'])->name('updateanggota');
        Route::get('/anggota/hapusanggota/{id}', [AnggotaController::class, 'destroy'])->name('hapusanggota');

        Route::get('/inventaris', [InventarisController::class, 'index'])->name('inventaris');
        Route::post('/inventaris/kiriminventaris', [InventarisController::class, 'store'])->name('kiriminventaris');
        Route::post('/inventaris/updateinventaris/{id}', [InventarisController::class, 'update'])->name('updateinventaris');
        Route::get('/inventaris/hapusinventaris/{id}', [InventarisController::class, 'destroy'])->name('hapusinventaris');

        Route::get('/pengurus', [PengurusController::class, 'index'])->name('pengurus');
        Route::post('/pengurus/kirimpengurus', [PengurusController::class, 'store'])->name('kirimpengurus');
        Route::post('/pengurus/updatepengurus/{id}', [PengurusController::class, 'update'])->name('updatepengurus');
        Route::get('/pengurus/hapuspengurus/{id}', [PengurusController::class, 'destroy'])->name('hapuspengurus');
        Route::post('/pengurus/carijabatan', [PengurusController::class, 'carijabatan'])->name('carijabatan');
        Route::post('/pengurus/carianggota', [PengurusController::class, 'carianggota'])->name('carianggota');

        Route::get('/berita', [BeritaController::class, 'index'])->name('berita');
        Route::get('/berita/tambah-berita', [BeritaController::class, 'create'])->name('tambah-berita');
        Route::post('/berita/kirim-berita', [BeritaController::class, 'store'])->name('kirim-berita');
        Route::get('/berita/edit-berita/{id}', [BeritaController::class, 'edit'])->name('edit-berita');
        Route::post('/berita/update-berita/{id}', [BeritaController::class, 'update'])->name('update-berita');
        Route::get('/berita/hapus-berita/{id}', [BeritaController::class, 'destroy'])->name('hapus-berita');
    });
});
