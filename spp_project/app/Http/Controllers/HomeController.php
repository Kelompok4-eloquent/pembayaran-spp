<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use App\Models\Siswa;
use App\Models\Spp;
use App\Models\Kelas;
use App\Models\Pembayaran;
use App\Models\Petugas;
class HomeController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

   
    // dashboard
    
    public function dashboard()
    {
       
        # code...
       $pembayaran = Pembayaran::orderBy('tanggal_bayar', 'DESC')->paginate(4);
       $murid = Siswa::all();
       $petugas = Petugas::all();
       $kelash = Kelas::all();
       $pembayaran_lunass = Pembayaran::orderBy('tanggal_bayar', 'ASC')->get();
        return view('pages.dashboard.index',['pembayaran_history'=>$pembayaran,'kelas_count'=>$kelash,'petugas_count'=>$petugas,'murid_count'=>$murid,'transaksi_lunas'=>$pembayaran_lunass]);
    }



    // crud kelas
    public function show_kelas(Request $request)
    {
        # code...
        if($request->has('kompetensi_keahlian')){
            $kelas = Kelas::where('kompetensi_keahlian','LIKE','%' .$request->kompetensi_keahlian. '%')->paginate(10);
           
        }else{
        $kelas = Kelas::paginate(10);
    }
        return view('pages.data_kelas.index',['kelasan'=>$kelas]);
    }

    // crud siswa
    public function show_siswa(Request $request)
    {
        # code...
        if($request->has('nisn')){
        $siswas = Siswa::
        where('nisn','LIKE','%' .$request->nisn. '%')->get();
        }else{
            $siswas = Siswa::all();
        }
        // return $siswas;
            return view('pages.data_siswa.index',['siswas'=>$siswas]);
    }
    public function tambah_siswa()
    {
        # code...
        // compact data spp,data tahun masuk
        $spp = Spp::all();
        $kelass = Kelas::all();
        return view('pages.data_siswa.tambah_siswa',['espepe'=>$spp,'kelasan'=>$kelass]);
        // compact data kelas
        
    }

    // crud data petugas
    public function show_petugas()
    {
        # code...
        $petugas = Petugas::all();
        return view('pages.data_petugas.index',['petugas'=>$petugas]);
    }

    // Show History_data (Search)
    public function history_pembayaran(Request $request)
    {
        # code...
        return view('pages.data_history_pembayaran.index');
    }
}
