<?php

use App\Http\Livewire\Dashboard;
use Illuminate\Support\Facades\Route;
use App\Http\Livewire\User\AkunComponent;
use App\Http\Livewire\User\KontakComponent;
use App\Http\Livewire\User\ProdukComponent;
use App\Http\Livewire\User\BankingComponent;
use App\Http\Livewire\User\LaporanComponent;
use App\Http\Livewire\User\InventoryComponent;
use App\Http\Livewire\User\AssetTetapComponent;
use App\Http\Livewire\User\PengeluaranComponent;
use App\Http\Livewire\User\KontakDetailComponent;
use App\Http\Livewire\User\Pembelian\PembelianPesanan;
use App\Http\Livewire\User\Pembelian\PembelianTagihan;
use App\Http\Livewire\User\Penjualan\PenjualanPesanan;
use App\Http\Livewire\User\Penjualan\PenjualanTagihan;
use App\Http\Livewire\User\Pembelian\PembelianOverview;
use App\Http\Livewire\User\Penjualan\PenjualanOverview;
use App\Http\Livewire\User\Pembelian\PembelianPenawaran;
use App\Http\Livewire\User\Penjualan\PenjualanPenawaran;
use App\Http\Livewire\User\Pembelian\PembelianPengiriman;
use App\Http\Livewire\User\Penjualan\PenjualanPengiriman;
use App\Http\Livewire\User\Pembelian\PembelianTagihanDetail;
use App\Http\Livewire\User\Pembelian\PembelianTambahTagihan;
use App\Http\Livewire\User\Penjualan\PenjualanTagihanDetail;
use App\Http\Livewire\User\Penjualan\PenjualanTambahTagihan;
use App\Http\Livewire\User\Pembelian\PembelianPemesananDetail;
use App\Http\Livewire\User\Pembelian\PembelianPenawaranDetail;
use App\Http\Livewire\User\Pembelian\PembelianTambahPemesanan;
use App\Http\Livewire\User\Pembelian\PembelianTambahPenawaran;
use App\Http\Livewire\User\Penjualan\PenjualanPemesananDetail;
use App\Http\Livewire\User\Penjualan\PenjualanPenawaranDetail;
use App\Http\Livewire\User\Penjualan\PenjualanTambahPemesanan;
use App\Http\Livewire\User\Penjualan\PenjualanTambahPenawaran;
use App\Http\Livewire\User\Pembelian\PembelianPengirimanDetail;
use App\Http\Livewire\User\Pembelian\PembelianTambahPengiriman;
use App\Http\Livewire\User\Penjualan\PenjualanPengirimanDetail;
use App\Http\Livewire\User\Penjualan\PenjualanTambahPengiriman;
use App\Http\Livewire\User\Pembelian\PembelianTambahTagihanBuat;
use App\Http\Livewire\User\Penjualan\PenjualanTambahTagihanBuat;
use App\Http\Livewire\User\Pembelian\PembelianTambahPemesananBuat;
use App\Http\Livewire\User\Penjualan\PenjualanTambahPemesananBuat;


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
    return view('welcome');
});
Route::get('/dash', function () {
    return view('layouts.main');
});

Route::middleware(['auth:sanctum', config('jetstream.auth_session'), 'verified'])->group(function () {
    Route::get('/dashboard', Dashboard::class)->name('dashboard');
});
Route::middleware(['auth', 'checkrole', 'auth:sanctum', config('jetstream.auth_session'), 'verified'])->group(function () {

    Route::get('/user/penjualan/overview', PenjualanOverview::class)->name('user.penjualan.overview');
    Route::get('/user/penjualan/tagihan', PenjualanTagihan::class)->name('user.penjualan.tagihan');
    Route::get('/user/penjualan/tagihan/detail/{tagihan_id}', PenjualanTagihanDetail::class)->name('user.penjualan.tagihan.detail');
    Route::get('/user/penjualan/tagihan/tambah', PenjualanTambahTagihan::class)->name('user.penjualan.tagihan.tambah');
    Route::get('/user/penjualan/tagihan/tambah/{tipe}/{buat_id}', PenjualanTambahTagihanBuat::class)->name('user.penjualan.tagihan.tambah.buat');
    Route::get('/user/penjualan/pengiriman', PenjualanPengiriman::class)->name('user.penjualan.pengiriman');
    Route::get('/user/penjualan/pengiriman/detail/{pengiriman_id}', PenjualanPengirimanDetail::class)->name('user.penjualan.pengiriman.detail');
    Route::get('/user/penjualan/pengiriman/tambah/{pemesanan_id}', PenjualanTambahPengiriman::class)->name('user.penjualan.pengiriman.tambah');
    Route::get('/user/penjualan/pemesanan', PenjualanPesanan::class)->name('user.penjualan.pemesanan');
    Route::get('/user/penjualan/pemesanan/tambah', PenjualanTambahPemesanan::class)->name('user.penjualan.pemesanan.tambah');
    Route::get('/user/penjualan/pemesanan/tambah/{penawaran_id}', PenjualanTambahPemesananBuat::class)->name('user.penjualan.pemesanan.tambah.buat');
    Route::get('/user/penjualan/pemesanan/detail/{pemesanan_id}', PenjualanPemesananDetail::class)->name('user.penjualan.pemesanan.detail');
    Route::get('/user/penjualan/penawaran', PenjualanPenawaran::class)->name('user.penjualan.penawaran');
    Route::get('/user/penjualan/penawaran/tambah', PenjualanTambahPenawaran::class)->name('user.penjualan.penawaran.tambah');
    Route::get('/user/penjualan/penawaran/detail/{penawaran_id}', PenjualanPenawaranDetail::class)->name('user.penjualan.penawaran.detail');

    Route::get('/user/pembelian/overview', PembelianOverview::class)->name('user.pembelian.overview');
    Route::get('/user/pembelian/tagihan', PembelianTagihan::class)->name('user.pembelian.tagihan');
    Route::get('/user/pembelian/tagihan/detail/{tagihan_id}', PembelianTagihanDetail::class)->name('user.pembelian.tagihan.detail');
    Route::get('/user/pembelian/tagihan/tambah', PembelianTambahTagihan::class)->name('user.pembelian.tagihan.tambah');
    Route::get('/user/pembelian/tagihan/tambah/{tipe}/{buat_id}', PembelianTambahTagihanBuat::class)->name('user.pembelian.tagihan.tambah.buat');
    Route::get('/user/pembelian/pengiriman', PembelianPengiriman::class)->name('user.pembelian.pengiriman');
    Route::get('/user/pembelian/pengiriman/detail/{pengiriman_id}', PembelianPengirimanDetail::class)->name('user.pembelian.pengiriman.detail');
    Route::get('/user/pembelian/pengiriman/tambah/{pemesanan_id}', PembelianTambahPengiriman::class)->name('user.pembelian.pengiriman.tambah');
    Route::get('/user/pembelian/pemesanan', PembelianPesanan::class)->name('user.pembelian.pemesanan');
    Route::get('/user/pembelian/pemesanan/tambah', PembelianTambahPemesanan::class)->name('user.pembelian.pemesanan.tambah');
    Route::get('/user/pembelian/pemesanan/tambah/{penawaran_id}', PembelianTambahPemesananBuat::class)->name('user.pembelian.pemesanan.tambah.buat');
    Route::get('/user/pembelian/pemesanan/detail/{pemesanan_id}', PembelianPemesananDetail::class)->name('user.pembelian.pemesanan.detail');
    Route::get('/user/pembelian/penawaran', PembelianPenawaran::class)->name('user.pembelian.penawaran');
    Route::get('/user/pembelian/penawaran/tambah', PembelianTambahPenawaran::class)->name('user.pembelian.penawaran.tambah');
    Route::get('/user/pembelian/penawaran/detail/{penawaran_id}', PembelianPenawaranDetail::class)->name('user.pembelian.penawaran.detail');

    Route::get('/user/pengeluaran', PengeluaranComponent::class)->name('user.pengeluaran');
    Route::get('/user/produk', ProdukComponent::class)->name('user.produk');
    Route::get('/user/inventory', InventoryComponent::class)->name('user.inventory');
    Route::get('/user/banking', BankingComponent::class)->name('user.banking');
    Route::get('/user/asset-tetap', AssetTetapComponent::class)->name('user.asset-tetap');
    Route::get('/user/laporan', LaporanComponent::class)->name('user.laporan');
    Route::get('/user/kontak', KontakComponent::class)->name('user.kontak');
    Route::get('/user/akun', AkunComponent::class)->name('user.akun');

    Route::get('/user/kontak/{kontak_id}', KontakDetailComponent::class)->name('user.kontak.detail');
});
