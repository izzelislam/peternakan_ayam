<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class OrderDetail extends Model
{
    protected $table='order_detail';
    protected $fillable=['order_id','kategori_id','harga','qty','sub_total'];

    public function Order()
    {
    	return $this->belogsTo('App\Model\Order');
    }

    public function Kategori()
    {
    	return $this->belongsTo('App\Model\Kategori');
    }
}
