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
use Illuminate\Support\Facades\File;
use PDF;
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
        return view('pages.dashboard.index', ['pembayaran_history' => $pembayaran, 'kelas_count' => $kelash, 'petugas_count' => $petugas, 'murid_count' => $murid, 'transaksi_lunas' => $pembayaran_lunass]);
    }
    public function redirectdashboard()
    {
        # code...
        return view('home');
    }


    // Crud kelas
    public function show_kelas(Request $request)
    {
        # code...
        if ($request->has('kompetensi_keahlian')) {
            $kelas = Kelas::where('kompetensi_keahlian', 'LIKE', '%' . $request->kompetensi_keahlian . '%')->paginate(10);
        } else {
            $kelas = Kelas::paginate(10);
        }
        return view('pages.data_kelas.index', ['kelasan' => $kelas]);
    }
    public function tambah_kelas()
    {
        # code...
        return view('pages.data_kelas.tambah_kelas');
    }
    public function kelas_store(Request $request)
    {
        $this->validate($request, [
            'nama_kelas' => 'required',
            'kompetensi_keahlian' => 'required',
            'tingkat_kelas' => 'required'
        ]);

        Kelas::create([
            'nama_kelas' => $request->nama_kelas,
            'kompetensi_keahlian' => $request->kompetensi_keahlian,
            'tingkat_kelas' => $request->tingkat_kelas
        ]);
        $kelas = Kelas::all();
        return redirect()->action([HomeController::class, 'show_kelas'])
            ->withSuccess('Sukses! Data Berhasil Di Tambahkan');
    }
    public function delete_kelas(Request $id_kelas)
    {
        $kelas = Kelas::find($id_kelas->id_kelas);
        $kelas->delete();
        return redirect()->action([HomeController::class, 'show_kelas'])
            ->withSuccess('Data Berhasil Di hapus');
    }
    public function edit_kelas($id_kelas)
    {
        # code...
        $kelasan = Kelas::find($id_kelas);
        return view('pages.data_kelas.edit_kelas', ['kelas' => $kelasan]);
    }
    public function update_kelas($id_kelas, Request $request)
    {
        # code...
        $this->validate($request, [
            'nama_kelas' => 'required',
            'kompetensi_keahlian' => 'required',
            'tingkat_kelas' => 'required'
        ]);
        $kelas = Kelas::find($id_kelas);
        $kelas->nama_kelas = $request->nama_kelas;
        $kelas->kompetensi_keahlian = $request->kompetensi_keahlian;
        $kelas->tingkat_kelas = $request->tingkat_kelas;
        $kelas->save();
        return redirect()->action([HomeController::class, 'show_kelas'])
            ->withSuccess('Data Berhasil Di ubah');
    }


    // Crud siswa
    public function show_siswa(Request $request)
    {
        # code...
        if ($request->has('nisn')) {
            $siswas = Siswa::where('nisn', 'LIKE', '%' . $request->nisn . '%')->get();
        } else {
            $siswas = Siswa::all();
        }
        // return $siswas;
        return view('pages.data_siswa.index', ['siswas' => $siswas]);
    }
    public function tambah_siswa()
    {
        # code...

        $spp = Spp::all();
        $kelass = Kelas::all();
        return view(
            'pages.data_siswa.tambah_siswa',
            // compact data spp,data tahun masuk
            [
                'espepe' => $spp,
                // compact data kelas
                'kelasan' => $kelass
            ]
        );
    }
    public function siswa_store(Request $request)
    {
        # code...
        $this->validate($request, [
            'nisn' => 'required|unique:siswa',
            'nis' => 'required',
            'nama' => 'required',
            'id_kelas' => 'required',
            'alamat' => 'required',
            'no_telp' => 'required',
            'id_spp' => 'required',
            'foto' => 'required|file|image|mimes:jpeg,png,jpg|max:2048',
        ]);
        // menyimpan data file yang diupload ke variabel $file
        $foto = $request->file('foto');

        $nama_foto = time() . "_" . $foto->getClientOriginalName();

        // isi dengan nama folder tempat kemana file diupload
        $moved = 'user_picture';
        $foto->move($moved, $nama_foto);

        Siswa::create([
            'nisn' => $request->nisn,
            'nis' => $request->nis,
            'nama' => $request->nama,
            'id_kelas' => $request->id_kelas,
            'alamat' => $request->alamat,
            'no_telp' => $request->no_telp,
            'id_spp' => $request->id_spp,
            'no_telp' => $request->no_telp,
            'foto' => $nama_foto
        ]);
        return redirect()->action([HomeController::class, 'show_siswa'])
            ->withSuccess('Data Berhasil Di tambahkan');
    }
    public function delete_siswa(Request $request)
    {
        $siswa = Siswa::find($request->nisn);
        unlink("user_picture/".$siswa->foto);
        Siswa::where("nisn", $siswa->nisn)->delete();
        return redirect()->action([HomeController::class, 'show_siswa'])
            ->withSuccess('Data Berhasil Di hapus');
    }

    // Crud data petugas
    public function show_petugas()
    {
        # code...
        $petugas = Petugas::all();
        return view('pages.data_petugas.index', ['petugas' => $petugas]);
    }
    public function tambah_petugas()
    {
        # code...
        return view('pages.data_petugas.tambah_petugas');
    }
    public function petugas_store(Request $request)
    {
        $this->validate($request, [
            'username' => 'required',
            'nama_petugas' => 'required',
            'password' => 'required',
            'level' => 'required',
        ]);

        Petugas::create([
            'username' => $request->username,
            'nama_petugas' => $request->nama_petugas,
            'password' => bcrypt($request->password),
            'level' => $request->level
        ]);
        // $petugas = Petugas::all();
        return redirect()->action([HomeController::class, 'show_petugas'])
            ->withSuccess('Sukses! Data Berhasil Di Tambahkan');
    }
    public function delete_petugas(Request $id_petugas)
    {
        $petugas = Petugas::find($id_petugas->id_petugas);
        $petugas->delete();
        return redirect()->action([HomeController::class, 'show_petugas'])
            ->withSuccess('Data Berhasil Di hapus');
    }


    // Show History_data (Search)
    public function history_pembayaran()
    {
        # code...
        $pembayaran_lunass = Pembayaran::orderBy('tanggal_bayar', 'ASC')->get();
        return view('pages.data_history_pembayaran.index', ['lunash' => $pembayaran_lunass]);
    }


    // Crud Data SPP
    public function show_spp()
    {
        # code...
        $tahun_masuk = Spp::all();
        return view('pages.data_tahun_masuk.index', ['SPP' => $tahun_masuk]);
    }
    public function tambah_spp()
    {
        # code...
        // compact data spp,data tahun masuk
        return view('pages.data_tahun_masuk.tambah_spp_tahunan');
    }

    public function spp_store(Request $request)
    {
        $this->validate($request, [
            'tahun' => 'required',
            'nominal' => 'required',
        ]);

        Spp::create([
            'tahun' => $request->tahun,
            'nominal' => $request->nominal

        ]);
        $petugas = Spp::all();
        return redirect()->action([HomeController::class, 'show_spp'])
            ->withSuccess('Sukses! Data Berhasil Di Tambahkan');
    }
    public function delete_spp(Request $id_petugas)
    {
        $petugas = Spp::find($id_petugas->id_spp);
        $petugas->delete();
        return redirect()->action([HomeController::class, 'show_spp'])
            ->withSuccess('Data Berhasil Di hapus');
    }


    // Crud Entry Pembayaran
    public function siswa_search(Request $request)
    {
        # code...
        if ($request->has('nama')) {
            $siswas = Siswa::where('nama', 'LIKE', '%' . $request->nama . '%')->get();
        } else if ($request->has('nisn')) {
            $siswas = Siswa::where('nisn', 'LIKE', '%' . $request->nisn . '%')->get();
        } else {
            $siswas = [];
            //  $siswas = Siswa::where('nis','LIKE','%' .$request->nama. '%')->get();
        }
        // return $siswas;
        return view('pages.entry_pembayaran.index', ['siswas' => $siswas]);
    }
    public function detail_transaksi($nisn)
    {
        # code...
        $siswa = Siswa::where('nisn', '=', $nisn)->first();
        $pembayaran_lunass = Pembayaran::where('nisn', '=', $nisn)->get();
        return view('pages.entry_pembayaran.detail_transaksi', ['siswa' => $siswa, 'pembayaran_lunass' => $pembayaran_lunass]);
    }
    public function store_transaksi(Request $request)
    {
        # code...
        $this->validate($request, [
            'id_petugas' => 'required',
            'nisn' => 'required',
            'bulan_dibayar' => 'required',
            'tahun_dibayar' => 'required',
            'jumlah_bayar' => 'required',
            'jumlah_dibayar' => 'required',
        ]);
        Pembayaran::create([
            'id_petugas' => $request->id_petugas,
            'nisn' => $request->nisn,
            'tanggal_bayar' => now(),
            'bulan_dibayar' => $request->bulan_dibayar,
            'tahun_dibayar' => $request->tahun_dibayar,
            'jumlah_bayar' => $request->jumlah_bayar,
            'jumlah_dibayar' => $request->jumlah_dibayar,

        ]);

        return redirect()->back()
            ->withSuccess('Sukses! Data Berhasil Di Tambahkan');
    }
}
