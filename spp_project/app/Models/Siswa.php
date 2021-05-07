<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Siswa extends Model
{
    use HasFactory;
    protected $table = 'siswa';
    protected $fillable = ['nisn'];
    public function spp_tahun(){
        return $this->belongsTo(Spp::class,'id_spp','id_spp');
    }
    public function kelas(){
        return $this->belongsTo(Kelas::class,'id_kelas','id_kelas');
    }
}
