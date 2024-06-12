<?php

namespace Database\Seeders;

use App\Models\Keranjang;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;



class KeranjangSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $keranajang = new Keranjang();
        $keranajang -> jumlah = "20";
        $keranajang -> user_id = "1";
        $keranajang -> product_id = "5";
        $keranajang ->save();
    }
}
