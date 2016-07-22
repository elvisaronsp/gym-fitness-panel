<?php

namespace App\Acme\Vouchers;

abstract class AvailableVoucher
{
    /**
     * 
     * @return type
     * @throws \App\Acme\Vouchers\VoucherException
     */
    protected function getFactoryConfig()
    {
        $voucherLookup = config('voucherLookup');
        
        if ($this->isValidVoucherLookupArray($voucherLookup)) {
            throw new \App\Acme\Vouchers\VoucherException('Voucher lookup config must be array (voucherId => voucherClass)');
        }
        
        return $voucherLookup;
    }
    
    private function isValidVoucherLookupArray($voucherLookup)
    {
        return !is_array($voucherLookup) || empty($voucherLookup);
    }
    
    /**
     * 
     * @param type $class
     * @param type $id
     * @return \App\Acme\Vouchers\Voucher
     */
    protected function createVoucherInstance($class, $id)
    {
        return app($class, ['voucherId' => $id]);
    }
}