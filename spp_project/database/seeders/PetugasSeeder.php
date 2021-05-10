<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use App\Models\Petugas;
use Illuminate\Hashing\BcryptHasher;

class PetugasSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        $petugas = new Petugas();
        $petugas->username='Administrator';
        $petugas->password=bcrypt('admin');
        $petugas->nama_petugas = 'Fadli';
        $petugas->level='admin';
        $petugas->save();

        $petugas2 = new Petugas();
        $petugas2->username='Petugas1';
        $petugas2->password=bcrypt('petugas1');
        $petugas2->nama_petugas = 'Achmad';
        $petugas2->level='petugas';
        $petugas2->save();
    }
}
