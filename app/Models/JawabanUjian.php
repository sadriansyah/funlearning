<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class JawabanUjian extends Model
{
    use HasFactory;
    protected $table = 'jawaban_ujians';
    protected $fillable = ['id_ujian','id_user','tglsubmit_ujian','id_file','nilai_ujian','status'];
}
