<?php

use Illuminate\Database\Seeder;
use App\Model\Kategori;

class KategoriSeeder extends Seeder
{
    
    public function run()
    {
        Kategori::truncate();

        Kategori::create([
        	'nama'=>'ayam jabro',
        	'harga'=>30000,
        ]);
        Kategori::create([
        	'nama'=>'ayam broiler',
        	'harga'=>20000,
        ]);
    }
}
