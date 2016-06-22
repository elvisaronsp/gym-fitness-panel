<?php

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class VoucherTest extends TestCase
{
    
    /**
     * 
     * @param type $class
     * @return \App\Acme\Vouchers\Voucher $voucher
     */
    private function getVoucherInstance($class)
    {
        return app($class, ['voucherId' => 1]);
    }
    
    /**
     * A basic test example.
     *
     * @return void
     */
    public function testIsPayed()
    {
        $voucher = $this->getVoucherInstance('\App\Acme\Vouchers\VoucherTypes\TenVisitVoucher');
        $voucher->setPayedAt(\Carbon\Carbon::now()->format($voucher->getDateTimeFormat()));

        $this->assertTrue(!is_null($voucher->getPayedAt()));
    }
    
    public function testIsNotPayed()
    {
        $voucher = $this->getVoucherInstance('\App\Acme\Vouchers\VoucherTypes\TenVisitVoucher');

        $this->assertTrue(is_null($voucher->getPayedAt()));
    }
}
