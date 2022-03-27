<?php

use App\Http\Controllers\Admin\PegawaiController;
use App\Http\Controllers\Kasir\EntriTransaksiController;
use App\Http\Controllers\Kasir\RiwayatController;
use App\Http\Controllers\Manajer\LaporanPendapatan;
use App\Http\Controllers\Manajer\LaporanTransaksi;
use App\Http\Controllers\Manajer\MenuController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

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
    return redirect()->route('login');
});

Auth::routes([
    'register' => false, // Registration Routes...
    'reset' => false, // Password Reset Routes...
    'verify' => false, // Email Verification Routes...
]);

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::prefix('admin')->middleware(['auth', 'role:admin'])->group(function () {
    Route::delete('/pegawai/destroy/{id]', [PegawaiController::class, 'destroy'])->name('pegawai.destroy');
    Route::resource('pegawai', PegawaiController::class);
});

Route::prefix('manajer')->middleware('role:manajer')->group(function () {
    Route::resource('menu', MenuController::class);
    Route::resource('laporan-transaksi', LaporanTransaksi::class);
    Route::resource('laporan-pendapatan', LaporanPendapatan::class);
});

Route::prefix('kasir')->middleware('role:kasir')->group(function () {
    Route::post('entri-keranjang', [EntriTransaksiController::class, 'tambah_ke_keranjang'])->name('entri_keranjang');
    Route::get('delete-keranjang-item/{row_id}', [EntriTransaksiController::class, 'hapus_dari_keranjang'])->name('delete_keranjang');
    Route::get('kosongkan-keranjang', [EntriTransaksiController::class, 'kosongkan_keranjang'])->name('kosongkan_keranjang');

    Route::post('simpan-transaksi', [EntriTransaksiController::class, 'simpan_transaksi'])->name('simpan_transaksi');

    Route::resource('entri-transaksi', EntriTransaksiController::class);
    Route::resource('riwayat-transaksi', RiwayatController::class);
});
