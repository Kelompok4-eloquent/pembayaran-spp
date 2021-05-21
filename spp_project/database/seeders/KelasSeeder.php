<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Kelas;
class KelasSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        // $kelas = new Kelas();
        // $kelas->nama_kelas = '11 Rpl 2';
        // $kelas->kompetensi_keahlian = 'Rekayasa Perangkat Lunak';
        // $kelas->tingkat_kelas = 'XI';
        $kelas = [[
            'nama_kelas'=>'11 Bc 1','kompetensi_keahlian'=>'Broadcast','tingkat_kelas'=>'XI','created_at'=>now(),'updated_at'=>now()
        ],[
            'nama_kelas'=>'11 TEI 1','kompetensi_keahlian'=>'Teknik Electronik Industri','tingkat_kelas'=>'XI','created_at'=>now(),'updated_at'=>now()
        ],[
            'nama_kelas'=>'11 Rpl 1','kompetensi_keahlian'=>'Rekayasa Perangkat Lunak','tingkat_kelas'=>'XI','created_at'=>now(),'updated_at'=>now()
        ],[
            'nama_kelas'=>'11 MM 1','kompetensi_keahlian'=>'Multimedia','tingkat_kelas'=>'XI','created_at'=>now(),'updated_at'=>now()
        ],[
            'nama_kelas'=>'11 TKJ 1','kompetensi_keahlian'=>'Teknik Komputer Jaringan','tingkat_kelas'=>'XI','created_at'=>now(),'updated_at'=>now()
        ]
    ];
    Kelas::insert($kelas);
    }
}
