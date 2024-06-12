<?php

namespace Tests\Feature;

use App\Models\Product;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

use function PHPUnit\Framework\assertNull;

class ProductTest extends TestCase
{
    public function testInsert()
    {
        $product = new Product();
        $product ->id = "6";
        $product->product_name = "Pisang";
        $product->price = "5";
        $product->product_image = "https://blogger.googleusercontent.com/img/b/R29vZ2xl/AVvXsEjNBg3vAXGUvp-Sb2TU480GsahSfb5tZcpKRXwNR4yCFFJxWtlL8pXdroK_bb-K_0DPf75BJ-37kuUk3GAypYBOPYzZdePzEpAjdemNRqdMz4PCoXD_MekS5NhQuh-tceJlxul_MEUxgl0KijxXk92FjRQd2_-aFucbxZ53UTBHEOgjaf0DsCBkojqcK9Kp/s320/product-4.jpg";
        $product->created_at = new \DateTime();
        $product->updated_at = new \DateTime();
        $result = $product->save();
        self::assertTrue($result);

    }

    public function testGlobalScope()
    {
        $product = new Product();
        $product ->id = "5";
        $product->product_name = "Jeruk";
        $product->price = "10";
        $product->product_image = "https://blogger.googleusercontent.com/img/b/R29vZ2xl/AVvXsEhb0yZYtbV1eTjBXK40IBkukruBi_Gp84a-42K_Ufdl2h9lrO5CCePMRiEG3JMT3l8OHLF5WgOMhFheWRANucZ6YEAgk61cbc_QsaUtsM8PBNw6WGw-jboLKNcUv3ERM0uesZElRDE6YNnAbSK8vDidES0AadjCtHMj5_qYozEs38JKEjrRvM-RciZ8K6Qw/s320/product-6.jpg";
        $product->created_at = new \DateTime();
        $product->updated_at = new \DateTime();
        $product->is_active = true;
        $product->save();

        $product = Product::find("Jeruk");
        self:assertNull($product);
    }
    
}
