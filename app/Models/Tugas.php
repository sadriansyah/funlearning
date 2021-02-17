<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tugas extends Model
{
    use HasFactory;
    protected $table = 'tugas';
    protected $fillable = ['id_kelas','id_author','judul_tugas','deskripsi_tugas','deadline_tanggal','deadline_jam','status'];
}
