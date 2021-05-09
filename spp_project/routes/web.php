<?php

use App\Http\Controllers\AdminController;
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
//     return view('welcome');
// });

// Admin
Route::get('/admin/dashboard', function () {
    return view('admin.dashboard.index');
});
Route::get('/admin/data_siswa/', function () {
    return view('admin.data_siswa.index');
});
Route::get('/admin/data_petugas/', function () {
    return view('admin.data_petugas.index');
});
// Route::get('/admin/data_kelas/', function () {
//     return view('admin.data_kelas.index');
// });

// Route::get('/admin/data_siswa/tambah_siswa', function () {
//     return view('admin.data_siswa.tambah_siswa');
// });
Route::get('/admin/data_petugas/tambah_petugas', function () {
    return view('admin.data_petugas.tambah_petugas');
});
Route::get('/admin/data_kelas/tambah_kelas', function () {
    return view('admin.data_kelas.tambah_kelas');
});

// Petugas
Route::get('/petugas/dashboard', function () {
    return view('petugas.dashboard.index');
});
Route::get('/petugas/entry_pembayaran', function () {
    return view('petugas.entry_pembayaran.index');
});
Route::get('/petugas/history_pembayaran', function () {
    return view('petugas.history_pembayaran.index');
});

/*Route Untuk Admin */
// Route::get('/',[AdminController::class,'dashboard'])->name('dashboard');
// Dashboard Route
Route::get('/admin/dashboard',[AdminController::class,'dashboard'])->name('dashboard');

// History Route
Route::get('/admin/history_pembayaran',[AdminController::class,'history_pembayaran'])->name('history_pembayaran');

// Petugas Route
Route::get('/admin/data_petugas',[AdminController::class,'show_petugas'])->name('show_petugas');

// Kelas Route
Route::get('/admin/data_kelas/', [AdminController::class,'show_kelas'])->name('show_kelas');

// Siswa Route
Route::get('/admin/data_siswa/', [AdminController::class,'show_siswa']);
Route::get('/admin/data_siswa/tambah_siswa', [AdminController::class,'tambah_siswa'])->name('tambah_siswa');
Auth::routes();

// Route::get('/admin/dashboard',[AdminController::class,'dashboard'])->name('dashboard');
