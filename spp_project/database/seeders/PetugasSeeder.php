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
        $petugas->username='petugas';
        $petugas->passwords=bcrypt('petugas');
        $petugas->nama_petugas = 'Fadli';
        $petugas->level='petugas';
        $petugas->save();
    }
}
