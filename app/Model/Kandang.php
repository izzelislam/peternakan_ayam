<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Kandang extends Model
{
    protected $table= 'kandang';
    protected $fillable=['nama','kode'];

    public function KandangDetail()
    {
    	return $this->hasMany('App\Model\KandangDetail');
    }
}
