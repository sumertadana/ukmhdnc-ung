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
    return view('index');
});

Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
    return view('admin/dashboard');
})->name('dashboard');

Route::get('/anggota', [AnggotaController::class, 'index'])->name('anggota');
Route::post('/anggota/tambahanggota', [AnggotaController::class, 'store'])->name('tambahanggota');
Route::post('/anggota/updateanggota/{id}', [AnggotaController::class, 'update'])->name('updateanggota');
Route::get('/anggota/hapusanggota/{id}', [AnggotaController::class, 'destroy'])->name('hapusanggota');

Route::get('/inventaris', [InventarisController::class, 'index'])->name('inventaris');
Route::post('/inventaris/tambahinventaris', [InventarisController::class, 'store'])->name('tambahinventaris');
Route::post('/inventaris/updateinventaris/{id}', [InventarisController::class, 'update'])->name('updateinventaris');
Route::get('/inventaris/hapusinventaris/{id}', [InventarisController::class, 'destroy'])->name('hapusinventaris');

Route::get('/pengurus', [PengurusController::class, 'index'])->name('pengurus');

