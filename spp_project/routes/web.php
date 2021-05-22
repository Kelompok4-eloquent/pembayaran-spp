<?php use App\Http\Controllers\AdminController;
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


Route::get('/', [HomeController::class, 'dashboard'])->name('redirectdashboard');
Route::post('/PostLogin',[LoginController::class,'PostLogin'])->name('postlogin');
Auth::routes();
/*Route Untuk Admin */

// Dashboard Route
Route::get('/pages/dashboard', [HomeController::class, 'dashboard'])->name('dashboard');

Route::get('login', [LoginController::class, 'showLoginForm'])->name('login');
// Route::get('/admin/dashboard',[AdminController::class,'dashboard'])->name('dashboard');

Route::group(['middleware'=>'admin'], function () {

        // History Route
        Route::get('/pages/history_pembayaran', [HomeController::class, 'history_pembayaran'])->name('history_pembayaran');

        // Petugas Route
        Route::get('/pages/data_petugas', [HomeController::class, 'show_petugas'])->name('show_petugas');
        Route::get('/pages/data_petugas/tambah_petugas', [HomeController::class, 'tambah_petugas'])->name('tambah_petugas');
        Route::post('/petugas_store',[HomeController::class, 'petugas_store'])->name('petugas_store');
        Route::delete('/pages/data_petugas/hapus/{id_petugas}', [HomeController::class, 'delete_petugas'])->name('delete_petugas');
        // Kelas Route
        Route::get('/pages/data_kelas/', [HomeController::class, 'show_kelas'])->name('show_kelas');
        Route::get('/pages/data_kelas/tambah_kelas', [HomeController::class, 'tambah_kelas'])->name('tambah_kelas');
        Route::post('/kelas_store',[HomeController::class, 'kelas_store'])->name('kelas_store');
        Route::delete('/pages/data_kelas/hapus/{id_kelas}', [HomeController::class, 'delete_kelas'])->name('delete_kelas');

        // Siswa Route
        Route::get('/pages/data_siswa/', [HomeController::class, 'show_siswa'])->name('show_siswa');
        Route::get('/pages/data_siswa/tambah_siswa', [HomeController::class, 'tambah_siswa'])->name('tambah_siswa');

         // SPP Route
         Route::get('/pages/spp_tahunan/', [HomeController::class, 'show_spp'])->name('show_spp');
         Route::get('/pages/spp_tahunan/tambah_spp_tahunan', [HomeController::class, 'tambah_spp'])->name('tambah_spp');
         Route::post('/spp_store',[HomeController::class, 'spp_store'])->name('spp_store');
         Route::delete('/pages/data_tahun_masuk/hapus/{id_spp}', [HomeController::class, 'delete_spp'])->name('delete_spp');
    }

);

Route::group(['middleware'=>'petugas'], function () {

        // History Route
        Route::get('/pages/history_pembayaran', [HomeController::class, 'history_pembayaran'])->name('history_pembayaran');

        // Entry_Pembayaran_Route
        Route::get('/pages/entry_pembayaran/', [HomeController::class, 'siswa_search'])->name('siswa_search');
    }

);
