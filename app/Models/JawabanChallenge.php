<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class JawabanChallenge extends Model
{
    use HasFactory;
    protected $table = "jawaban_challenges";
    protected $fillable = ['id_challenge','id_user','jawaban_challenge','penilaian','hadiah_poin'];
}
