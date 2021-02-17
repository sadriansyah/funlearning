<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Ujian extends Model
{
    use HasFactory;
    protected $table ='ujians';
    protected $fillable = ['id_kelas','id_author','judul_ujian','tipe_ujian','deskripsi_ujian','deadline_tanggal','deadline_jam','status'];
}
