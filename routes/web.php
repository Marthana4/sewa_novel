<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\NovelController;
use App\Http\Controllers\TransaksiController;
use App\Http\Controllers\LaporanController;

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

Route::get('/', function () {
    return view('login');
})->name('login');
Route::post('/', [UserController::class, 'login'])->name('postlogin');

Route::get('/register', function(){
    return view('register');
})->name('register');
Route::post('/register', [UserController::class, 'register'])->name('register');

Route::middleware(['auth'])->group(function() {
    Route::get('/profile/{id}', [UserController::class, 'edit'])->name('user-show');
    Route::put('/profile-edit/{id}', [UserController::class, 'update'])->name('user-edit');

    Route::get('/admin-dashboard', [UserController::class, 'dashboard'])->name('dashboard');

    Route::get('/admin-user', [UserController::class, 'index'])->name('user');
    Route::delete('/admin-user-delete', [UserController::class, 'destroy'])->name('user-delete');

    Route::get('/admin-novel', [NovelController::class, 'index'])->name('novel');
    Route::get('/admin-novel-create', [NovelController::class, 'create'])->name('novel-create');
    Route::post('/admin-novel-created', [NovelController::class, 'store'])->name('novel-created');
    Route::get('/admin-novel-show/{id}', [NovelController::class, 'edit'])->name('novel-show');
    Route::put('/admin-novel-edit/{id}', [NovelController::class, 'update'])->name('novel-edit');
    Route::delete('/admin-novel-delete/{id}', [NovelController::class, 'destroy'])->name('novel-delete');

    Route::get('/admin-transaksi', [TransaksiController::class, 'index'])->name('transaksi');
    Route::get('/admin-transaksi-show/{id}', [TransaksiController::class, 'edit'])->name('transaksi-show');
    Route::put('/admin-transaksi-edit/{id}', [TransaksiController::class, 'update'])->name('transaksi-edit');
    Route::delete('/admin-transaksi-delete/{id}', [TransaksiController::class, 'destroy'])->name('transaksi-delete');

    Route::get('/penyewa-dashboard', [UserController::class, 'dashboard'])->name('penyewa-dashboard');
    Route::get('/penyewa-novel-show/{id}', [NovelController::class, 'edit'])->name('penyewa-novel-show');

    Route::get('/penyewa-transaksi-create', [TransaksiController::class, 'create'])->name('transaksi-create');
    Route::post('/penyewa-transaksi-created', [TransaksiController::class, 'store'])->name('transaksi-created');

    Route::get('/laporan-peminjaman-aktif', [LaporanController::class, 'laporanPeminjamanAktif'])->name('laporan-peminjaman-aktif');
    Route::get('/laporan-transaksi-pinjam', [LaporanController::class, 'laporanTransaksiPeminjaman'])->name('laporan-transaksi-peminjaman');
    Route::get('/laporan-stok-tersedia', [LaporanController::class, 'laporanNovelTersedia'])->name('laporan-novel-tersedia');
    Route::get('/laporan-stok-tersewa', [LaporanController::class, 'laporanNovelTersewa'])->name('laporan-novel-tersewa');
    Route::get('/laporan-mutasi-stok', [LaporanController::class, 'laporanMutasiStok'])->name('laporan-mutasi-stok');

    Route::post('/logout', [UserController::class,'logout'])->name('logout');
});


