<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AnggotaController;
use App\Http\Controllers\BeritaController;
use App\Http\Controllers\InventarisController;
use App\Http\Controllers\pengurusController;
use App\Http\Controllers\SliderController;
use App\Http\Controllers\GaleriController;
use App\Http\Controllers\PagesController;

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

// Route::get('/', function () {
//     return view('users.index');
// });
Route::get('/', [PagesController::class, 'index'])->name('beranda');
Route::get('/berita/{id}', [BeritaController::class, 'show'])->name('tampil-berita');
Route::get('/pengurus', [PengurusController::class, 'show'])->name('tampil-Pengurus');
// Route::get('/galeri', [BeritaController::class, 'galeri'])->name('galeri');
route::get('/galeri', [GaleriController::class, 'show'])->name('tampil-galeri');
Route::get('/cari', [BeritaController::class, 'cariartikel'])->name('cari-artikel');
Route::get('/bidang={id}', [PagesController::class, 'caribidang'])->name('caribidang');


Route::group(['middleware' => 'auth:sanctum', 'verified'], function () {
    Route::group(['prefix' => 'admin/'], function () {

        Route::get('dashboard', function () {
            return view('admin.dashboard');
        });

        Route::get('/anggota', [AnggotaController::class, 'index'])->name('anggota');
        Route::get('/anggota/tambah-anggota', [AnggotaController::class, 'create'])->name('tambah-anggota');
        Route::post('/anggota/kirim-anggota', [AnggotaController::class, 'store'])->name('kirim-anggota');
        Route::get('/anggota/edit-anggota/{id}', [AnggotaController::class, 'edit'])->name('edit-anggota');
        Route::post('/anggota/update-anggota/{id}', [AnggotaController::class, 'update'])->name('update-anggota');
        Route::get('/anggota/hapus-anggota/{id}', [AnggotaController::class, 'destroy'])->name('hapus-anggota');
        Route::post('/pengurus/carijurusan', [AnggotaController::class, 'carijurusan'])->name('carijurusan');

        Route::get('/inventaris', [InventarisController::class, 'index'])->name('inventaris');
        Route::post('/inventaris/kirim-inventaris', [InventarisController::class, 'store'])->name('kiriminventaris');
        Route::post('/inventaris/update-inventaris/{id}', [InventarisController::class, 'update'])->name('updateinventaris');
        Route::get('/inventaris/hapus-inventaris/{id}', [InventarisController::class, 'destroy'])->name('hapusinventaris');

        Route::get('/pengurus', [PengurusController::class, 'index'])->name('pengurus');
        Route::get('/pengurus/tambah-pengurus', [PengurusController::class, 'create'])->name('tambah-pengurus');
        Route::post('/pengurus/kirim-pengurus', [PengurusController::class, 'store'])->name('kirim-pengurus');
        Route::get('/pengurus/edit-pengurus/{id}', [PengurusController::class, 'edit'])->name('edit-pengurus');
        Route::post('/pengurus/update-pengurus/{id}', [PengurusController::class, 'update'])->name('update-pengurus');
        Route::get('/pengurus/hapus-pengurus/{id}', [PengurusController::class, 'destroy'])->name('hapus-pengurus');
        Route::post('/pengurus/carijabatan', [PengurusController::class, 'carijabatan'])->name('carijabatan');
        Route::post('/pengurus/carianggota', [PengurusController::class, 'carianggota'])->name('carianggota');

        Route::get('/berita', [BeritaController::class, 'index'])->name('berita');
        Route::get('/berita/tambah-berita', [BeritaController::class, 'create'])->name('tambah-berita');
        Route::post('/berita/kirim-berita', [BeritaController::class, 'store'])->name('kirim-berita');
        Route::get('/berita/edit-berita/{id}', [BeritaController::class, 'edit'])->name('edit-berita');
        Route::post('/berita/update-berita/{id}', [BeritaController::class, 'update'])->name('update-berita');
        Route::get('/berita/hapus-berita/{id}', [BeritaController::class, 'destroy'])->name('hapus-berita');

        Route::get('/slider', [SliderController::class, 'index'])->name('slider');
        Route::post('/slider/kirim-slider', [SliderController::class, 'store'])->name('kirim-slider');
        Route::post('/slider/update-slider/{id}', [SliderController::class, 'update'])->name('update-slider');
        Route::get('/slider/hapus-slider/{id}', [SliderController::class, 'destroy'])->name('hapus-slider');

        Route::get('/galeri', [GaleriController::class, 'index'])->name('galeri');
        Route::post('/galeri/kirim-galeri', [GaleriController::class, 'store'])->name('kirim-galeri');
        Route::post('/galeri/update-galeri/{id}', [GaleriController::class, 'update'])->name('update-galeri');
        Route::get('/galeri/hapus-galeri/{id}', [GaleriController::class, 'destroy'])->name('hapus-galeri');
    });
});
