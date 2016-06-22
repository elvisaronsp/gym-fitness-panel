<?php

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class CustomerVoucherTest extends TestCase
{
    
    /**
     * 
     * @return \App\Entities\CustomerVoucher\CustomerVoucher
     */
    public function getCustomerVoucherInstance($instanceName = 'thirtyDaysLengthVoucher')
    {
        return factory(\App\Entities\CustomerVoucher\CustomerVoucher::class, $instanceName)->make();
    }
    
    public function testVoucherIsPayed()
    {
        $customerVoucher = $this->getCustomerVoucherInstance();
        $customerVoucher->customer_voucher_payed_at = \Carbon\Carbon::now()->subDay()->format('Y-m-d');
        $this->assertTrue($customerVoucher->isPayed());
    }
    
    public function testVoucherIsNotPayed()
    {
        $customerVoucher = $this->getCustomerVoucherInstance();
        $this->assertFalse($customerVoucher->isPayed());
    }
    
    public function testTimeVoucherExpiredDayBefore()
    {
        $customerVoucher = $this->getCustomerVoucherInstance();
        $customerVoucher->customer_voucher_expired_at = \Carbon\Carbon::now()->subDay()->format('Y-m-d');
        $this->assertTrue($customerVoucher->isExpired());
    }
    
    public function testTimeVoucherExpireToday()
    {
        $customerVoucher = $this->getCustomerVoucherInstance();
        $customerVoucher->customer_voucher_expired_at = \Carbon\Carbon::now()->format('Y-m-d');
        $this->assertTrue($customerVoucher->isExpired());
    }
    
    public function testTimeVoucherExpireTomorrow()
    {
        $customerVoucher = $this->getCustomerVoucherInstance();
        $customerVoucher->customer_voucher_expired_at = \Carbon\Carbon::now()->addDay()->format('Y-m-d');
        $this->assertFalse($customerVoucher->isExpired());
    }
    
    public function testVisitVoucherNotAvailable()
    {
        $customerVoucher = $this->getCustomerVoucherInstance('tenVisitVoucher');
        $customerVoucher->customer_voucher_visit_limit = 10;
        $customerVoucher->setCustomerVoucherVisitUsed(10);

        $this->assertTrue($customerVoucher->isNotAvailableForUse());
    }
    
    public function testVisitVoucherIsAvailable()
    {
        $customerVoucher = $this->getCustomerVoucherInstance('tenVisitVoucher');
        $customerVoucher->customer_voucher_visit_limit = 10;
        $customerVoucher->setCustomerVoucherVisitUsed(4);

        $this->assertFalse($customerVoucher->isNotAvailableForUse());
    }
    
    public function testSandbox()
    {
        $customerVoucher = $this->getCustomerVoucherInstance();
        $customerVoucher->customer_voucher_expired_at = '2016-07-11';

        $this->assertFalse($customerVoucher->isNotAvailableForUse());
    }
}

