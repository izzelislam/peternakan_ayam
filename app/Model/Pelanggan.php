<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Pelanggan extends Model
{
    protected $table='pelanggan';

    protected $fillable=['nama','no_hp','alamat'];
}
