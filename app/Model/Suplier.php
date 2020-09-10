<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Suplier extends Model
{
    protected $table='suplier';
    protected $fillable=['nama','no_hp','alamat'];

    public function KandangDetail()
    {
    	return $this->hasMany('App\Model\KandangDetail');
    }
}
