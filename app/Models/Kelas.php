<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Kelas extends Model
{
    use HasFactory;
    protected $table = 'kelas';
    protected $fillable = ['cover_kelas','kode_mk','nama_mk','id_dosen','kode_kelas','komposisi_tugas','komposisi_quis','komposisi_ets','komposisi_eas'];
}
