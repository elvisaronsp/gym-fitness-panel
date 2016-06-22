<?php

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class CustomerTest extends TestCase
{
    /**
     * A basic test example.
     *
     * @return void
     */
    public function testDatabase()
    {
        $customer = factory(App\Entities\Customer\Customer::class)->make();

        $this->assertTrue(true);
    }
}
