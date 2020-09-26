<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Kategori extends Model
{
    protected $table='kategori';
    protected $fillable=['nama','harga','stok'];

    public function KandangDetail()
    {
    	return $this->hasMany('App\Model\KandangDetail');
    }

    public function OrderDetail()
    {
    	return $this->hasMany('App\Model\OrderDetail');
    }
}
