<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AnggotaController;
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

Route::middleware(['auth:sanctum', 'verified'])->get('admin/dashboard', function () {
    return view('admin/dashboard');
})->name('dashboard');

Route::get('admin/anggota', [AnggotaController::class, 'index'])->name('anggota');
Route::post('admin/anggota/tambahanggota', [AnggotaController::class, 'store'])->name('kirimanggota');
Route::post('admin/anggota/updateanggota/{id}', [AnggotaController::class, 'update'])->name('updateanggota');
Route::get('admin/anggota/hapusanggota/{id}', [AnggotaController::class, 'destroy'])->name('hapusanggota');

Route::get('admin/inventaris', [InventarisController::class, 'index'])->name('inventaris');
Route::post('admin/inventaris/tambahinventaris', [InventarisController::class, 'store'])->name('kiriminventaris');
Route::post('admin/inventaris/updateinventaris/{id}', [InventarisController::class, 'update'])->name('updateinventaris');
Route::get('admin/inventaris/hapusinventaris/{id}', [InventarisController::class, 'destroy'])->name('hapusinventaris');

Route::get('admin/pengurus', [PengurusController::class, 'index'])->name('pengurus');
Route::post('admin/pengurus/tambahpengurus', [PengurusController::class, 'store'])->name('kirimpengurus');
Route::post('admin/pengurus/updatepengurus/{id}', [PengurusController::class, 'update'])->name('updatepengurus');
Route::get('admin/pengurus/hapuspengurus/{id}', [PengurusController::class, 'destroy'])->name('hapuspengurus');
Route::post('admin/pengurus/carijabatan', [PengurusController::class, 'carijabatan'])->name('carijabatan');
Route::post('admin/pengurus/carianggota', [PengurusController::class, 'carianggota'])->name('carianggota');
