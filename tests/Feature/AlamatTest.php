<?php

namespace Tests\Feature;

use App\Models\Alamat;
use Database\Seeders\AlamatSeeder;
use Database\Seeders\UserSeeder;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

use function PHPUnit\Framework\assertNotNull;

class AlamatTest extends TestCase
{
    public function testOnetoMany()
    {
        $this->seed([UserSeeder::class, AlamatSeeder::class]);

        $alamat = Alamat::find("1");
        self::assertNotNull($alamat);

        $user = $alamat->user;
        self::assertNotNull($user);
        self::assertEquals("1",$user->id);
    }
}
