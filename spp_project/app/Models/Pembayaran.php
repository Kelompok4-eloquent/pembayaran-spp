<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pembayaran extends Model
{
    use HasFactory;
    protected $table='pembayaran';
    
    protected $primaryKey = 'id_pembayaran'; // or null
    public $incrementing = true;
    protected $fillable = ['id_petugas','nisn','tanggal_bayar','bulan_dibayar','tahun_dibayar','jumlah_bayar','jumlah_dibayar'];
    // public function pembayaran()
    // {
    //     # Pembayaran
    //     return $this->belongsTo(Pembayaran::class,'id_pembayaran','id_pembayaran');
    //     // return $this->hasOne(Spp::class,'id_spp','id_spp');
    // }
    protected $with = ['siswa','petugas'];
    // protected $appends = ['nama_kelas'];
    public function siswa(){
        # Siswa
        return $this->belongsTo(Siswa::class,'nisn','nisn');
    }
    // public function kelass()
    // {
    //     # Kelas
    //     return $this->hasManyThrough(Kelas::class,Siswa::class,'id_kelas','id_kelas');
    // }
    public function petugas()
    {
        # code...
        return $this->belongsTo(Petugas::class,'id_petugas','id_petugas');
    }
    public function spp_siswa()
    {
        # code...
        return $this->belongsTo(Spp::class,'id_spp','id_spp');
    }
    // public function getNamaKelasAttribute()
    // {
    //     # code...
    //     return $this->siswa->kelas->nama_kelas;
    // }
}
