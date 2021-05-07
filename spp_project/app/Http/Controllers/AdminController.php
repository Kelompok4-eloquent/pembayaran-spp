<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use App\Models\Siswa;
use App\Models\Kelas;
class AdminController extends Controller
{
    //crud kelas
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

}
