<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Jawaban extends Model
{
    use HasFactory;
    protected $table = 'jawabans';
    protected $fillable = ['id_tugas','id_user','tglsubmit_tugas','id_file','nilai_tugas','status'];
}
