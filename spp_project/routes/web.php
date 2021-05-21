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

Route::get('/', [HomeController::class, 'dashboard'])->name('dashboard');
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

        // Kelas Route
        Route::get('/pages/data_kelas/', [HomeController::class, 'show_kelas'])->name('show_kelas');
        Route::get('/pages/data_kelas/tambah_kelas', [HomeController::class, 'tambah_kelas'])->name('tambah_kelas');

        // Siswa Route
        Route::get('/pages/data_siswa/', [HomeController::class, 'show_siswa']);
        Route::get('/pages/data_siswa/tambah_siswa', [HomeController::class, 'tambah_siswa'])->name('tambah_siswa');
    }

);

// Route::group(['middleware'=>'petugas'], function () {

//         // History Route
//         Route::get('/pages/history_pembayaran', [HomeController::class, 'history_pembayaran'])->name('history_pembayaran');

//     }

// );
