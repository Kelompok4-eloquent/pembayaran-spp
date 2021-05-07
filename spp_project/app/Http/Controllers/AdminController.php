<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use App\Models\Siswa;
use App\Models\Spp;
use App\Models\Kelas;
class AdminController extends Controller
{
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
}
