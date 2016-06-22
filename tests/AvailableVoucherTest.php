<?php

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class AvailableVoucherTest extends TestCase
{
    /**
     * A basic test example.
     *
     * @return void
     */
    public function testDropdown()
    {
        $dropdownArray = (new \App\Acme\Vouchers\AvailableVoucherDropdown)->generate();
        
        $this->assertTrue((is_array($dropdownArray) && !empty($dropdownArray)));
    }
}
