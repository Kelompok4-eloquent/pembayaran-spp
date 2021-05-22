<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Kelas extends Model
{
    use HasFactory;
    protected $table = 'kelas';
    protected $primaryKey = 'id_kelas'; // or null

    public $incrementing = true;
    protected $fillable = ['nama_kelas','kompetensi_keahlian','tingkat_kelas'];
    // public function kelas(){
    //     return $this->belongsTo(Kelas::class,'id_kelas','id_kelas');
    // }
}
