<?php

namespace App\Models;

// use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
class Siswa extends Model
{
    use HasFactory;
    protected $table = 'siswa';
    protected $primaryKey = 'nisn';
    protected $fillable = ['nisn','nis','nama','id_kelas','alamat','no_telp','id_spp'];
    protected $hidden = ['nisn','nama','remember_token'];
    protected $with = ['kelas','spp_tahun'];
    public function spp_tahun(){
        return $this->belongsTo(Spp::class,'id_spp','id_spp');
    }
    public function kelas(){
        return $this->belongsTo(Kelas::class,'id_kelas','id_kelas');
    }
}
