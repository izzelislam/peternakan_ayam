<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class AyamCek extends Model
{
    protected $table= 'ayam_cek';
    protected $fillable=['user_id','kandang_id','ayam_mati','ayam_sakit'];
}
