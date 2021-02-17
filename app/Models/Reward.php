<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Reward extends Model
{
    use HasFactory;
    protected $table = 'rewards';
    protected $fillable = ['id_kelas','judul_reward','deskripsi_reward','hidden_reward','batasan_klaim','id_file','id_trigger','tipe','minimum_level','poin_reward'];
}
