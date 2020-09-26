<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    protected $table='order';
    protected $fillable=['user_id','pelanggan_id','status','total'];

    public function OrderDetail()
    {
    	return $this->hasMany('App\Model\OrderDetail');
    }

    public function Pelanggan()
    {
    	return $this->belongsTo(Pelanggan::class);
    }
}
