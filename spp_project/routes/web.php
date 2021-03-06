<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\Auth\LoginController;
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
// Route::get('/', function () {
//     //
//     return view('home');
// });

// Global Routes
Route::get('/', [HomeController::class, 'dashboard'])->name('redirectdashboard');
Route::post('/PostLogin', [LoginController::class, 'PostLogin'])->name('postlogin');
Auth::routes();
/*Route Untuk Admin */

// Dashboard Route
Route::get('/pages/dashboard', [HomeController::class, 'dashboard'])->name('dashboard');

Route::get('login', [LoginController::class, 'showLoginForm'])->name('login');
Route::get('/settings',[HomeController::class,'show_setting'])->name('show_setting');
Route::put('/settings/edit/{id_petugas}',[HomeController::class,'password_store'])->name('password_store');

// Local by access modifier
Route::group(
    ['middleware' => 'admin'],
    function () {


        // History Route
        Route::get('/pages/history_pembayaran', [HomeController::class, 'history_pembayaran'])->name('history_pembayaran');


        // Petugas Route
        Route::get('/pages/data_petugas', [HomeController::class, 'show_petugas'])->name('show_petugas');
        Route::get('/pages/data_petugas/tambah_petugas', [HomeController::class, 'tambah_petugas'])->name('tambah_petugas');
        Route::post('/petugas_store', [HomeController::class, 'petugas_store'])->name('petugas_store');
        Route::delete('/pages/data_petugas/hapus/{id_petugas}', [HomeController::class, 'delete_petugas'])->name('delete_petugas');
        Route::get('/pages/data_petugas/edit/{id_petugas}', [HomeController::class, 'edit_petugas'])->name('edit_petugas');
        Route::put('/petugas/update/{id_petugas}', [HomeController::class, 'update_petugas'])->name('update_petugas');

        // Kelas Route
        Route::get('/pages/data_kelas/', [HomeController::class, 'show_kelas'])->name('show_kelas');
        Route::get('/pages/data_kelas/tambah_kelas', [HomeController::class, 'tambah_kelas'])->name('tambah_kelas');
        Route::post('/kelas_store', [HomeController::class, 'kelas_store'])->name('kelas_store');
        Route::delete('/pages/data_kelas/hapus/{id_kelas}', [HomeController::class, 'delete_kelas'])->name('delete_kelas');
        Route::get('/pages/data_kelas/edit/{id_kelas}', [HomeController::class, 'edit_kelas'])->name('edit_kelas');
        Route::put('/kelas/update/{id_kelas}', [HomeController::class, 'update_kelas'])->name('update_kelas');


        // Siswa Route
        Route::get('/pages/data_siswa/', [HomeController::class, 'show_siswa'])->name('show_siswa');
        Route::get('/pages/data_siswa/tambah_siswa', [HomeController::class, 'tambah_siswa'])->name('tambah_siswa');
        Route::post('/siswa_store', [HomeController::class, 'siswa_store'])->name('siswa_store');
        Route::get('/pages/data_siswa/hapus/{nisn}', [HomeController::class, 'delete_siswa'])->name('delete_siswa');
        Route::get('/pages/data_siswa/edit/{nisn}', [HomeController::class, 'edit_siswa'])->name('edit_siswa');
        Route::put('/siswa/edit/{nisn}', [HomeController::class, 'update_siswa'])->name('update_siswa');

        // SPP Route
        Route::get('/pages/spp_tahunan/', [HomeController::class, 'show_spp'])->name('show_spp');
        Route::get('/pages/spp_tahunan/tambah_spp_tahunan', [HomeController::class, 'tambah_spp'])->name('tambah_spp');
        Route::post('/spp_store', [HomeController::class, 'spp_store'])->name('spp_store');
        Route::delete('/pages/data_tahun_masuk/hapus/{id_spp}', [HomeController::class, 'delete_spp'])->name('delete_spp');
        Route::get('/pages/data_tahun_masuk/edit/{id_spp}', [HomeController::class, 'edit_spp'])->name('edit_spp');
        Route::put('/spp/update/{id_spp}', [HomeController::class, 'update_spp'])->name('update_spp');
    }

);

Route::group(
    ['middleware' => 'petugas'],
    function () {

        // History Route
        Route::get('/pages/history_pembayaran', [HomeController::class, 'history_pembayaran'])->name('history_pembayaran');

        // Entry_Pembayaran_Route
        Route::get('/pages/entry_pembayaran/', [HomeController::class, 'siswa_search'])->name('siswa_search');
        Route::get('/pages/transaksi_detail/{nisn}', [HomeController::class, 'detail_transaksi'])->name('detail_transaksi');
        Route::post('/transaksi_store', [HomeController::class, 'store_transaksi'])->name('store_transaksi');
        Route::delete('/transaksi_detail/hapus/{id_pembayaran}', [HomeController::class, 'delete_transaksi'])->name('delete_transaksi');
        Route::get('/transaksi/edit/{id_pembayaran}', [HomeController::class, 'edit_transaksi'])->name('edit_transaksi');
        Route::put('/transaksi/edit/{id_pembayaran}', [HomeController::class, 'update_transaksi'])->name('update_transaksi');
        // Cetak PDF
        Route::get('/cetak_struk/{id_pembayaran}', [HomeController::class, 'cetak_struk'])->name('cetak_struk');
    }

);
