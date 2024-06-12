<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;


class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $user = new User();
        $user->id = "1";
        $user->name = "Fauzan";
        $user->email = "fauzan@gmail.com";
        $user->password = "123";
        $user->save();

    }
}
