<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Challenge extends Model
{
    use HasFactory;
    protected $table = 'challenges';
    protected $fillable = ['id_author','id_kelas','judul_challenge','deskripsi_challenge','waktu_mulai','waktu_selesai','pilihan1','pilihan2','pilihan3','pilihan4','pilihanbenar','poin_challenge','status'];
}
