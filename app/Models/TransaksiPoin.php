<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TransaksiPoin extends Model
{
    use HasFactory;
    protected $table = 'transaksi_poins';
    protected $fillable = ['id_user','id_file','id_reward','poin_reward','tgl_transaksi'];
}
