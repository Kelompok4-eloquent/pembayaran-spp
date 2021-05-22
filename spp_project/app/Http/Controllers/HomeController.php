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
public function redirectdashboard()
{
    # code...
    return view('home');
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
public function tambah_kelas()
{
    # code...
    return view('pages.data_kelas.tambah_kelas');
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
    public function tambah_petugas()
    {
        # code...
        return view('pages.data_petugas.tambah_petugas');
    }
    public function petugas_store(Request $request){
        $this->validate($request,[
            'username'=>'required',
            'nama_petugas'=>'required',
            'password'=>'required',
            'level'=>'required',
        ]);
        
        Petugas::create([
            'username'=>$request->username,
            'nama_petugas'=>$request->nama_petugas,
            'password'=>bcrypt($request->password),
            'level'=>$request->level
        ]);
        $petugas = Petugas::all();
        return redirect()->action([HomeController::class, 'show_petugas'])
        ->withSuccess('Sukses! Data Berhasil Di Tambahkan');
    }
    public function delete_petugas(Request $id_petugas){
        $petugas = Petugas::find($id_petugas->id_petugas);
        $petugas->delete();
        return redirect()->action([HomeController::class, 'show_petugas'])
        ->withSuccess('Data Berhasil Di hapus');
    }

    // Show History_data (Search)
    public function history_pembayaran(Request $request)
    {
        # code...
        return view('pages.data_history_pembayaran.index');
    }
    

    // Crud Data SPP
    public function show_spp()
    {
        # code...
        $tahun_masuk = SPP::all();
        return view('pages.data_tahun_masuk.index',['SPP'=>$tahun_masuk]);
    }
    public function tambah_spp()
    {
        # code...
        // compact data spp,data tahun masuk
        return view('pages.data_tahun_masuk.tambah_spp_tahunan');
        // compact data kelas
        
    }

     // crud Entry Pembayaran
     public function siswa_search(Request $request)
     {
         # code...
         if($request->has('nama')){
         $siswas = Siswa::
         where('nama','LIKE','%' .$request->nama. '%')->get();
         }else if($request->has('nisn')){
            $siswas = Siswa::
            where('nisn','LIKE','%' .$request->nisn. '%')->get();
            }
        else{
            $siswas = [];
            //  $siswas = Siswa::where('nis','LIKE','%' .$request->nama. '%')->get();
         }
         // return $siswas;
             return view('pages.entry_pembayaran.index',['siswas'=>$siswas]);
     }
}
