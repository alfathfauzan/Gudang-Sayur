<?php

namespace Tests;

use Illuminate\Foundation\Testing\TestCase as BaseTestCase;
use Illuminate\Support\Facades\DB;

abstract class TestCase extends BaseTestCase
{
    use CreatesApplication;

    protected function setUp(): void
    {
        parent::setUp();
        // DB::delete("delete from blogs ");
        // DB::delete("delete from products ");
        
        DB::delete("delete from keranjangs "); 
        DB::delete("delete from alamats ");
        DB::delete("delete from users ");
       
        // .\vendor\bin\phpunit .\tests\Feature\UserTest.php
        
    } 
}
