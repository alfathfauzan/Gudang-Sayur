<?php

namespace Database\Seeders;

use App\Models\Product;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;


class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $product = new Product();
        $product->id = "2";
        $product->product_name = "Tomat";
        $product->price = "5";
        $product->product_image = "https://blogger.googleusercontent.com/img/b/R29vZ2xl/AVvXsEjNBg3vAXGUvp-Sb2TU480GsahSfb5tZcpKRXwNR4yCFFJxWtlL8pXdroK_bb-K_0DPf75BJ-37kuUk3GAypYBOPYzZdePzEpAjdemNRqdMz4PCoXD_MekS5NhQuh-tceJlxul_MEUxgl0KijxXk92FjRQd2_-aFucbxZ53UTBHEOgjaf0DsCBkojqcK9Kp/s320/product-4.jpg";
        $product->save();
    }
}
