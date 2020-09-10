<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class KandangDetail extends Model
{
    protected $table='kandang_detail';
    protected $fillable=['suplier_id','kategori_id','kandang_id','jumlah_awal','jumlah_akhir','keterangan','status'];

    public function Suplier()
    {
    	return $this->belongsTo('App\Model\Suplier');
    }

    public function Kandang()
    {
    	return $this->belongsTo('App\Model\Kandang');
    }

    public function Kategori()
    {
    	return $this->belongsTo('App\Model\Kategori');
    }
}
