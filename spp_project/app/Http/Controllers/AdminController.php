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
class AdminController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    // public function login()
    // {
    //     # code...
    //     return view('admin.login.index');
    // }
    // crud kelas
    public function dashboard()
    {
       
        # code...
       $pembayaran = Pembayaran::orderBy('tanggal_bayar', 'DESC')->paginate(4);
       $murid = Siswa::all();
       $petugas = Petugas::all();
       $kelash = Kelas::all();
       $pembayaran_lunass = Pembayaran::orderBy('tanggal_bayar', 'ASC')->get();
    // $pembayaran_lunass = Pembayaran::idDescending()->get( );
        return view('admin.dashboard.index',['pembayaran_history'=>$pembayaran,'kelas_count'=>$kelash,'petugas_count'=>$petugas,'murid_count'=>$murid,'transaksi_lunas'=>$pembayaran_lunass]);
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
        return view('admin.data_kelas.index',['kelasan'=>$kelas]);
    }

    // crud siswa
    public function show_siswa(Request $request)
    {
        # code...
        // if($request->has('nisn')){
        // $siswas = DB::table('siswa')
        // ->leftJoin('kelas', 'siswa.id_kelas', '=', 'kelas.id_kelas')
        // ->leftJoin('spp', 'siswa.id_spp', '=', 'spp.id_spp')
        // ->where('nisn','LIKE','%' .$request->nisn. '%')
        //     ->get();
        // }else{
        //     $siswas = DB::table('siswa')
        // ->leftJoin('kelas', 'siswa.id_kelas', '=', 'kelas.id_kelas')
        // ->leftJoin('spp', 'siswa.id_spp', '=', 'spp.id_spp')
        //     ->get();
        // }
        if($request->has('nisn')){
        $siswas = Siswa::
        where('nisn','LIKE','%' .$request->nisn. '%')->get();
        }else{
            $siswas = Siswa::all();
        }
        // return $siswas;
            return view('admin.data_siswa.index',['siswas'=>$siswas]);
    }
    public function tambah_siswa()
    {
        # code...
        // compact data spp,data tahun masuk
        $spp = Spp::all();
        $kelass = Kelas::all();
        return view('admin.data_siswa.tambah_siswa',['espepe'=>$spp,'kelasan'=>$kelass]);
        // compact data kelas
        
    }

    // crud data petugas
    public function show_petugas()
    {
        # code...
        $petugas = Petugas::all();
        return view('admin.data_petugas.index',['petugas'=>$petugas]);
    }

    // Show History_data (Search)
    public function history_pembayaran(Request $request)
    {
        # code...
        return view('admin.data_history_pembayaran.index');
    }
}
