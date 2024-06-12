<?php

namespace Tests\Feature;

use App\Models\Alamat;
use App\Models\Keranjang;
use App\Models\User;
use Database\Seeders\AlamatSeeder;
use Database\Seeders\KeranjangSeeder;
use Database\Seeders\ProductSeeder;
use Database\Seeders\UserSeeder;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;



class UserTest extends TestCase
{
   public function testCreate(){

 
    $user = User::create([
        "name" => "Fauza",
        "email" => "fauzan2@gmail.com",
        "password" => "123"
    ]);

    self::assertNotNull($user->id);
   }

   public function testOneToOne()
   {
    $this->seed([UserSeeder::class, KeranjangSeeder::class]);
    $user = User::find("1"); 
    self::assertNotNull($user);

    $keranjang = $user->keranjang;
    self::assertNotNull($keranjang);

    self::assertEquals(20,$keranjang->jumlah);
   }

   public function testOnetoMany()
   {
    $this->seed([ UserSeeder::class ,AlamatSeeder::class]);

    $user = User::find("1");
    self::assertNotNull($user);

    $alamats = $user->alamats;
    


    self::assertNotNull($alamats);
    self::assertCount(1, $alamats);
    
   }

   public function testOneToOneQuery()
   {
    $user = new User();
    $user->id = "3";
    $user->name = "Fauzan";
    $user->email = "fauzaan@gmail.com";
    $user->password = "123";
    $user->save();

    $keranjang = new Keranjang();
    $keranjang->jumlah = 30;
    $keranjang->product_id = 5;

    $user->keranjang()->save($keranjang);
 

    self::assertNotNull($keranjang->user_id);
   }

   public function testOnetoManyQuery()
   {
    $user = new User();
    $user->id = "2";
    $user->name = "Alfath";
    $user ->email = "fauzn@gmail.com";
    $user->password = "123";
    $user->save();

    $alamat = new Alamat();
    $alamat->id = "1";
    $alamat->nama_alamat = "Manyar";
    $alamat->description = "DEkat Unair";

    $user->alamats()->save($alamat);

    self::assertNotNull($alamat->user_id);
   }

   public function testRelationshipQuery()
   {
    $this->seed([UserSeeder::class, AlamatSeeder::class]);

    $user = User::find("1");
    $alamats = $user->alamats;
    self::assertCount(1,$alamats);

    $carinama = $user->alamats()->where('nama_alamat','=','pepelegi')->get();
    self::assertCount(1,$carinama);
   }

   public function testManyToMany()
   {
    $this -> seed([UserSeeder::class, ProductSeeder::class]);

    $user = User::find("1");
    self::assertNotNull($user);

    $user->likeproducts()->attach("2");

    $products = $user->likeProducts;
    self::assertCount(1, $products);

    self::assertEquals("2",$products[0]->id);
   }

//    public function testManyToManyDetach()
//    {
//     $this->testManyToMany();
//     $user = User::find("1");
//     $user->likeproducts()->detach("1");

//     $products = $user->likeproducts;
//     self::assertCount(1, $products);
//    }
   
}
